<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrachesRequest;
use App\Models\Branche;
use App\Services\BranchesService;
use Illuminate\Support\Facades\DB;

class BranchesController extends Controller
{
    protected $BranchesService;

    public function __construct(BranchesService $BranchesService)
    {
        $this->BranchesService = $BranchesService;

    }

    public function index()
    {

        return view('admin.Branches.index', ['data' => $this->BranchesService->getAll()]);
    }

    public function create()
    {
        return view('admin.Branches.create');
    }

    public function store(BrachesRequest $request)
    {
        try {

            $this->BranchesService->store($request->validated());

            return redirect()->route('branches.index')->with(['success' => 'تم ادخال البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ ما '.$ex->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {
        $data = $this->BranchesService->edit($id);

        if (empty($data)) {
            return redirect()->route('branches.index')->with(['error' => 'عفوا غير قادر علي الوصول الي البيانات المطلوبة']);
        }

        return view('admin.Branches.edit', ['data' => $data]);
    }

    public function update($id, BrachesRequest $request)
    {
        try {

            $this->BranchesService->update($id, $request->validated());

            return redirect()->route('branches.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطا  '.$ex->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        try {

            $data = get_cols_where_row(new Branche(), ['*'], ['id' => $id, 'com_code' => auth()->user()->com_code]);

            if (empty($data)) {

                return redirect()->route('branches.index')->with(['error' => 'عفوا غير قادر علي الوصول الي البيانات المطلوبة']);
            }
            DB::beginTransaction();

            $this->BranchesService->Delete($id);

            DB::commit();

            return redirect()->route('branches.index')->with(['success' => 'تم حذف البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->route('branches.index')->with(['error' => 'عفوا حدث خطا  '.$ex->getMessage()]);
        }
    }
}
