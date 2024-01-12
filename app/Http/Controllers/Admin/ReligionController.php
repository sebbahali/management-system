<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReligionsRequest;
use App\Models\Religion;
use App\Services\ReligionService;
use Illuminate\Support\Facades\DB;

class ReligionController extends Controller
{
    protected $ReligionService;

    public function __construct(ReligionService $ReligionService)
    {
        $this->ReligionService = $ReligionService;

    }

    public function index()
    {

        return view('admin.Religions.index', ['data' => $this->ReligionService->getAll()]);
    }

    public function create()
    {
        return view('admin.Religions.create');
    }

    public function store(ReligionsRequest $request)
    {

        try {
            $checkExsists = get_cols_where_row(new Religion(), ['id'], ['com_code' => auth()->user()->com_code, 'name' => $request->name]);

            if (! empty($checkExsists)) {
                return redirect()->back()->with(['error' => 'عفوا  هذا الاسم مسجل من قبل '])->withInput();
            }
            DB::beginTransaction();
            $this->ReligionService->store($request);

            DB::commit();

            return redirect()->route('Religions.index')->with(['success' => 'تم ادخال البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ '.$ex->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {

        $data = $this->ReligionService->edit($id);

        return view('admin.Religions.edit', ['data' => $data]);
    }

    public function update($id, ReligionsRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $data = get_cols_where_row(new Religion(), ['*'], ['com_code' => $com_code, 'id' => $id]);
            if (empty($data)) {
                return redirect()->route('Religions.index')->with(['error' => 'عفوا غير قادر للوصول الي البيانات المطلوبة !']);
            }

            $checkExsists = Religion::select('id')->where('com_code', '=', $com_code)->where('name', '=', $request->name)->where('id', '!=', $id)->first();
            if (! empty($checkExsists)) {
                return redirect()->back()->with(['error' => 'عفوا هذا الاسم مسجل من قبل'])->withInput();
            }
            DB::beginTransaction();
            $this->ReligionService->update($request, $id);
            DB::commit();

            return redirect()->route('Religions.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ '.$ex->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        try {

            $data = get_cols_where_row(new Religion(), ['*'], ['com_code' => auth()->user()->com_code, 'id' => $id]);
            if (empty($data)) {
                return redirect()->route('Religions.index')->with(['error' => 'عفوا غير قادر للوصول الي البيانات المطلوبة !']);
            }
            DB::beginTransaction();
            $this->ReligionService->Delete($id);
            DB::commit();

            return redirect()->route('Religions.index')->with(['success' => 'تم الحذف البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ '.$ex->getMessage()])->withInput();
        }
    }
}
