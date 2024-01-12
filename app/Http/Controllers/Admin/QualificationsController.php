<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QualificationsRequest;
use App\Models\Qualification;
use App\Services\QualificationsService;
use Illuminate\Support\Facades\DB;

class QualificationsController extends Controller
{
    protected $QualificationsService;

    public function __construct(QualificationsService $QualificationsService)
    {
        $this->QualificationsService = $QualificationsService;

    }

    public function index()
    {

        return view('admin.Qualifications.index', ['data' => $this->QualificationsService->getAll()]);
    }

    public function create()
    {
        return view('admin.Qualifications.create');
    }

    public function store(QualificationsRequest $request)
    {
        try {

            $checkExsists = get_cols_where_row(new Qualification(), ['id'], ['name' => $request->name, 'com_code' => auth()->user()->com_code]);
            if (! empty($checkExsists)) {
                return redirect()->back()->with(['error' => 'عفوا هذا الاسم مسجل من قبل !!'])->withInput();
            }
            DB::beginTransaction();
            $this->QualificationsService->store($request);

            DB::commit();

            return redirect()->route('Qualifications.index')->with(['success' => 'تم ادخال البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ '.$ex->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {
        $data = $this->QualificationsService->edit($id);

        return view('admin.Qualifications.edit', ['data' => $data]);
    }

    public function update($id, QualificationsRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $data = get_cols_where_row(new Qualification(), ['*'], ['com_code' => $com_code, 'id' => $id]);
            if (empty($data)) {
                return redirect()->route('Qualifications.index')->with(['error' => 'عفوا غير قادر للوصول الي البيانات المطلوبة !']);
            }
            $checkExsists = Qualification::select('id')->where('com_code', '=', $com_code)->where('name', '=', $request->name)->where('id', '!=', $id)->first();
            if (! empty($checkExsists)) {
                return redirect()->back()->with(['error' => 'عفوا هذه الاسم مسجل من قبل '])->withInput();
            }
            DB::beginTransaction();
            $this->QualificationsService->update($request, $id);
            DB::commit();

            return redirect()->route('Qualifications.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ '.$ex->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        try {

            $data = get_cols_where_row(new Qualification(), ['*'], ['com_code' => auth()->user()->com_code, 'id' => $id]);
            if (empty($data)) {
                return redirect()->route('Qualifications.index')->with(['error' => 'عفوا غير قادر للوصول الي البيانات المطلوبة !']);
            }
            DB::beginTransaction();
            $this->QualificationsService->Delete($id);
            DB::commit();

            return redirect()->route('Qualifications.index')->with(['success' => 'تم حذف البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ '.$ex->getMessage()]);
        }
    }
}
