<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Jobs_categoriesRequest;
use App\Models\jobs_categorie;
use App\Services\JobsService;
use Illuminate\Support\Facades\DB;

class Jobs_categoriesController extends Controller
{
    protected $JobsService;

    public function __construct(JobsService $JobsService)
    {
        $this->JobsService = $JobsService;

    }

    public function index()
    {

        return view('admin.Jobs_categories.index', ['data' => $this->JobsService->getAll()]);
    }

    public function create()
    {
        return view('admin.Jobs_categories.create');
    }

    public function store(Jobs_categoriesRequest $request)
    {
        try {

            $CheckExsists = get_cols_where_row(new jobs_categorie(), ['id'], ['name' => $request->name, 'com_code' => auth()->user()->com_code]);
            if (! empty($CheckExsists)) {
                return redirect()->back()->with(['error' => 'عفوا  اسم الوظيفة مسجل من قبل ! '])->withInput();
            }
            DB::beginTransaction();

            $this->JobsService->store($request);

            DB::commit();

            return redirect()->route('jobs_categories.index')->with(['success' => 'تم اضافة البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ ما '.$ex->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {

        $data = $this->JobsService->edit($id);

        return view('admin.Jobs_categories.edit', ['data' => $data]);
    }

    public function update($id, Jobs_categoriesRequest $request)
    {
        try {
            $CheckExsists = jobs_categorie::select('id')->where('com_code', '=', auth()->user()->com_code)
            ->where('name', '=', $request->name)->where('id', '!=', $id)->first();

            if (! empty($CheckExsists)) {
                return redirect()->back()->with(['error' => 'عفوا  اسم الوظيفة مسجل من قبل ! '])->withInput();
            }
            DB::beginTransaction();

            $this->JobsService->update($id, $request);

            DB::commit();

            return redirect()->route('jobs_categories.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطا '.$ex->getMessage()])->withInput();
        }
        $data = get_cols_where_row(new jobs_categorie(), ['*'],
         ['com_code' => auth()->user()->com_code, 'id' => $id]);

        if (empty($data)) {
            return redirect()->route('jobs_categories.index')->with(['error' => 'عفوا غير قادر الي الوصول الي البيانات المطلوبة']);
        }

    }

    public function destroy($id)
    {
        try {
            $data = get_cols_where_row(new jobs_categorie(), ['*'],
             ['com_code' => auth()->user()->com_code, 'id' => $id]);

             if (empty($data)) {
                return redirect()->route('jobs_categories.index')->with(['error' => 'عفوا غير قادر الي الوصول الي البيانات المطلوبة']);
            }

            DB::beginTransaction();

            $this->JobsService->Delete($id);

            DB::commit();

            return redirect()->route('jobs_categories.index')->with(['success' => 'تم الحذف بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->route('jobs_categories.index')->with(['error' => 'عفوا حدث خطا '.$ex->getMessage()]);
        }

    }
}
