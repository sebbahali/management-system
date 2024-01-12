<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OccasionsRequest;
use App\Models\Occasion;
use App\Services\OccasionsService;
use Illuminate\Support\Facades\DB;

class OccasionsController extends Controller
{
    protected $OccasionsService;

    public function __construct(OccasionsService $OccasionsService)
    {
        $this->OccasionsService = $OccasionsService;

    }

    public function index()
    {

        return view('admin.Occasions.index', ['data' => $this->OccasionsService->getAll()]);
    }

    public function create()
    {
        return view('admin.Occasions.create');
    }

    public function store(OccasionsRequest $request)
    {
        try {
            $checkExsists = get_cols_where_row(new Occasion(), ['id'], ['com_code' => auth()->user()->com_code, 'name' => $request->name]);
            if (! empty($checkExsists)) {
                return redirect()->back()->with(['error' => 'عفوا  هذا الاسم مسجل من قبل '])->withInput();
            }
            DB::beginTransaction();
            $this->OccasionsService->store($request);
            DB::commit();

            return redirect()->route('occasions.index')->with(['success' => 'تم ادخال البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ ما '.$ex->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {

        $data = $this->OccasionsService->edit($id);

        return view('admin.Occasions.edit', ['data' => $data]);
    }

    public function update($id, OccasionsRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $data = get_cols_where_row(new Occasion(), ['*'], ['com_code' => $com_code, 'id' => $id]);
            if (empty($data)) {
                return redirect()->route('occasions.index')->with(['error' => 'عفوا هذه البيانات غير موجوده']);
            }
            $checkExsists = Occasion::select('id')->where('com_code', '=', $com_code)->where('name', '=', $request->name)->where('id', '!=', $id)->first();
            if (! empty($checkExsists)) {
                return redirect()->back()->with(['error' => 'عفوا هذا الاسم مسجل من قبل '])->withInput();
            }
            DB::beginTransaction();
            $this->OccasionsService->update($request, $id);
            DB::commit();

            return redirect()->route('occasions.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطأ ما '.$ex->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        try {

            $data = get_cols_where_row(new Occasion(), ['*'], ['com_code' => auth()->user()->com_code, 'id' => $id]);
            if (empty($data)) {
                return redirect()->route('occasions.index')->with(['error' => 'عفوا هذه البيانات غير موجوده']);
            }
            DB::beginTransaction();

            $this->OccasionsService->Delete($id);
            DB::commit();

            return redirect()->route('occasions.index')->with(['success' => 'تم حذف البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->route('occasions.index')->with(['error' => 'عفوا حدث خطأ ما '.$ex->getMessage()]);
        }
    }
}
