<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finance_calenders_Request;
use App\Http\Requests\Finance_calendersUpdate;
use App\Models\Finance_calender;
use App\Services\FinanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Finance_calendersController extends Controller
{
    protected $FinanceService;

    public function __construct(FinanceService $FinanceService)
    {
        $this->FinanceService = $FinanceService;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $CheckDataOpenCounter = Finance_calender::where(['is_open' => 1])->count();

        return view('admin.Finance_calender.index',
            ['data' => $this->FinanceService->getAll(),
                'CheckDataOpenCounter' => $CheckDataOpenCounter]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Finance_calender.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Finance_calenders_Request $request)
    {
        try {
            DB::beginTransaction();

            $this->FinanceService->store($request);

            DB::commit();

            return redirect()->route('finance_calender.index')->with(['success' => 'تم ادخال البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفوا حدث خطا '.$ex->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Finance_calender $finance_calender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Finance_calender::where(['id' => $id])->first();
        if (empty($data)) {
            return redirect()->back()->with(['error' => ' عفوا حدث خطأ ']);
        }
        if ($data['is_open'] != 0) {
            return redirect()->back()->with(['error' => ' عفوا لايمكن تعديل السنة المالية في هذه الحالة']);
        }

        return view('admin.Finance_calender.update', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Finance_calendersUpdate $request)
    {
        try {
            $data = Finance_calender::where(['id' => $id])->first();

            if (empty($data)) {
                return redirect()->back()->with(['error' => ' عفوا حدث خطأ ']);
            }

            if ($data['is_open'] != 0) {
                return redirect()->back()->with(['error' => ' عفوا لايمكن تعديل السنة المالية في هذه الحالة'])->withInput();
            }

            $validator = Validator::make($request->all(), [
                'FINANCE_YR' => ['required', Rule::unique('finance_calenders')->ignore($id)],
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with(['error' => ' عفوا اسم السنة المالية مسجل من قبل'])->withInput();
            }
            DB::beginTransaction();

            $this->FinanceService->update($id, $request, $data);

            DB::commit();

            return redirect()->route('finance_calender.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'عفو حدث خطأ ما '.$ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $this->FinanceService->delete($id);

            return redirect()->route('finance_calender.index')->with(['success' => 'تم حذف البيانات بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => ' عفوا حدث خطأ '].$ex->getMessage());
        }
    }

    public function do_open($id)
    {
        try {

            $this->FinanceService->store($id);

            return redirect()->route('finance_calender.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => ' عفوا حدث خطأ '].$ex->getMessage());
        }
    }

    public function show_year_monthes(Request $request)
    {
        if ($request->ajax()) {

            return view('admin.Finance_calender.show_year_monthes',
                ['finance_cln_periods' => $this->FinanceService->show_year_monthes($request)]);
        }
    }
}
