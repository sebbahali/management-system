<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NationalitiesRequest;
use App\Models\Nationalitie;
use App\Services\NationalitiesService;
use Illuminate\Support\Facades\DB;

class NationalitiesController extends Controller
{
    protected $NationalitiesService;

    public function __construct(NationalitiesService $NationalitiesService)
    {
        $this->NationalitiesService = $NationalitiesService;

    }

    public function index()
    {

        return view('admin.Nationalities.index', ['data' => $this->NationalitiesService->getAll()]);
    }

    public function create()
    {
        return view('admin.Nationalities.create');
    }

    public function store(NationalitiesRequest $request)
    {
        try {

            $CheckExsists = get_cols_where_row(new Nationalitie(), ['id'], ['com_code' => auth()->user()->com_code, 'name' => $request->name]);
            if (! empty($CheckExsists)) {
                return redirect()->back()->with(['error' => 'عفوا هذا الاسم مسجل من قبل '])->withInput();
            }
            DB::beginTransaction();
            $this->NationalitiesService->store($request);
            DB::commit();

            return redirect()->route('Nationalities.index')->with(['success' => 'تم تسجيل البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا  حدث خطأ  '.$ex->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {

        $data = $this->NationalitiesService->edit($id);

        return view('admin.Nationalities.edit', ['data' => $data]);
    }

    public function update($id, NationalitiesRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $data = get_cols_where_row(new Nationalitie(), ['*'], ['com_code' => $com_code, 'id' => $id]);
            if (empty($data)) {
                return redirect()->route('Nationalities.index')->with(['error' => 'عفوا غير قادر للوصول الي البيانات المطلوبة']);
            }
            $CheckExsists = Nationalitie::select('id')->where('com_code', '=', $com_code)->where('name', '=', $request->name)->where('id', '!=', $id)->first();
            if (! empty($CheckExsists)) {
                return redirect()->back()->with(['error' => 'عفوا هذا الاسم مسجل من قبل '])->withInput();
            }
            DB::beginTransaction();
            $data = $this->NationalitiesService->update($request, $id);

            DB::commit();

            return redirect()->route('Nationalities.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ  '.$ex->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        try {

            $data = get_cols_where_row(new Nationalitie(), ['*'], ['com_code' => auth()->user()->com_code, 'id' => $id]);
            if (empty($data)) {
                return redirect()->route('Nationalities.index')->with(['error' => 'عفوا غير قادر للوصول الي البيانات المطلوبة']);
            }
            DB::beginTransaction();

            $data = $this->NationalitiesService->Delete($id);

            DB::commit();

            return redirect()->route('Nationalities.index')->with(['success' => 'تم الحذف  البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ  '.$ex->getMessage()])->withInput();
        }
    }
}
