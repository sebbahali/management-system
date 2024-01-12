<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResignationsRequest;
use App\Models\Resignation;
use App\Services\ResignationsService;
use Illuminate\Support\Facades\DB;

class ResignationsController extends Controller
{
    protected $ResignationsService;

    public function __construct(ResignationsService $ResignationsService)
    {
        $this->ResignationsService = $ResignationsService;

    }

    public function index()
    {

        return view('admin.Resignations.index', ['data' => $this->ResignationsService->getAll()]);
    }

    public function create()
    {
        return view('admin.Resignations.create');
    }

    public function store(ResignationsRequest $request)
    {
        try {

            $CheckExsists = get_cols_where_row(new Resignation(), ['id'], ['com_code' => auth()->user()->com_code, 'name' => $request->name]);
            if (! empty($CheckExsists)) {
                return redirect()->back()->with(['error' => 'عفوا الاسم مسجل من قبل '])->withInput();
            }
            DB::beginTransaction();
            $this->ResignationsService->store($request);
            DB::commit();

            return redirect()->route('Resignations.index')->with(['success' => 'تم ادخل البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ '.$ex->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $this->ResignationsService->Delete($id);

            $com_code = auth()->user()->com_code;
            $data = get_cols_where_row(new Resignation(), ['*'], ['com_code' => $com_code, 'id' => $id]);
            if (empty($data)) {
                return redirect()->route('Resignations.index')->with(['error' => 'عفوا غير قادر للوصول للبيانات المطلوبة !']);
            }

            return view('admin.Resignations.edit', ['data' => $data]);
        } catch (\Exception $ex) {
            return redirect()->route('Resignations.index')->with(['error' => 'عفوا حدث خطأ '.$ex->getMessage()]);
        }
    }

    public function update($id, ResignationsRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $data = get_cols_where_row(new Resignation(), ['*'], ['com_code' => $com_code, 'id' => $id]);
            if (empty($data)) {
                return redirect()->route('Resignations.index')->with(['error' => 'عفوا غير قادر للوصول للبيانات المطلوبة !']);
            }
            $CheckExsists = Resignation::select('id')->where('com_code', '=', $com_code)->where('name', '=', $request->name)->where('id', '!=', $id)->first();
            if (! empty($CheckExsists)) {
                return redirect()->back()->with(['error' => 'عفوا هذا الاسم مسجل من قبل !'])->withInput();
            }
            DB::beginTransaction();
            $this->ResignationsService->update($request, $id);

            DB::commit();

            return redirect()->route('Resignations.index')->with(['success' => '  تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->route('Resignations.index')->with(['error' => 'عفوا حدث خطأ '.$ex->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {

            $data = get_cols_where_row(new Resignation(), ['*'], ['com_code' => auth()->user()->com_code, 'id' => $id]);
            if (empty($data)) {
                return redirect()->route('Resignations.index')->with(['error' => 'عفوا غير قادر للوصول للبيانات المطلوبة !']);
            }
            DB::beginTransaction();
            $this->ResignationsService->Delete($id);
            DB::commit();

            return redirect()->route('Resignations.index')->with(['success' => '  تم حذف البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->route('Resignations.index')->with(['error' => 'عفوا حدث خطأ '.$ex->getMessage()]);
        }
    }
}
