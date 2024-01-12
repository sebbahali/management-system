<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartementsRequest;
use App\Models\Departement;
use App\Services\DepartementsService;
use Illuminate\Support\Facades\DB;

class DepartementsController extends Controller
{
    protected $DepartementsService;

    public function __construct(DepartementsService $DepartementsService)
    {
        $this->DepartementsService = $DepartementsService;

    }

    public function index()
    {

        return view('admin.Departements.index', ['data' => $this->DepartementsService->getAll()]);
    }

    public function create()
    {
        return view('admin.Departements.create');
    }

    public function store(DepartementsRequest $request)
    {
        try {

            DB::beginTransaction();

            $this->DepartementsService->store($request);

            DB::commit();

            return redirect()->route('departements.index')->with(['success' => 'تم ادخال البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ ما '.$ex->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {
        $data = $this->DepartementsService->edit($id);

        if (empty($data)) {
            return redirect()->route('departements.index')->with(['error' => 'عفوا غير قادر الي الوصول البي البيانات المطلوبة !']);
        }

        return view('admin.Departements.edit', ['data' => $data]);
    }

    public function update($id, DepartementsRequest $request)
    {
        try {

            $data = get_cols_where_row(new Departement(), ['*'], ['com_code' => auth()->user()->com_code, 'id' => $id]);
            if (empty($data)) {
                return redirect()->route('departements.index')->with(['error' => 'عفوا غير قادر الي الوصول البي البيانات المطلوبة !']);
            }
            $CheckExsists = Departement::select('id')->where('com_code', '=', auth()->user()->com_code)->where('name', '=', $request->name)->where('id', '!=', $id)->first();
            if (! empty($CheckExsists)) {
                return redirect()->back()->with(['error' => 'عفوا اسم الادارة مسجل من قبل !'])->withInput();
            }
            DB::beginTransaction();

            $this->DepartementsService->update($id, $request);

            DB::commit();

            return redirect()->route('departements.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ ما '.$ex->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $data = get_cols_where_row(new Departement(), ['*'], ['com_code' => auth()->user()->com_code, 'id' => $id]);

            if (empty($data)) {
                return redirect()->route('departements.index')->with(['error' => 'عفوا غير قادر الي الوصول البي البيانات المطلوبة !']);
            }

            DB::beginTransaction();

            $this->DepartementsService->delete($id);

            DB::commit();

            return redirect()->route('departements.index')->with(['success' => 'تم حذف البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ ما '.$ex->getMessage()])->withInput();
        }
    }
}
