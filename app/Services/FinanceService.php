<?php

namespace App\Services;

use App\Models\Finance_calender;
use App\Models\Finance_cln_periods;
use App\Models\Monthes;
use DateInterval;
use DatePeriod;
use DateTime;

class FinanceService
{
    public function getAll()
    {
        return get_cols_where_p(new Finance_calender(),
            ['*'], ['com_code' => auth()->user()->com_code],
            'id', 'DESC', PC);
    }

    public function Store($request)
    {
        $dataToInsert = $request->validated();

        $dataToInsert['added_by'] = auth()->user()->id;
        $dataToInsert['com_code'] = auth()->user()->com_code;

        $falg = Finance_calender::insert($dataToInsert);

        if ($falg) {

            $dataParent = Finance_calender::select('id')->where($dataToInsert)->first();

            $startDate = new DateTime($request->start_date);
            $endDate = new DateTime($request->end_date);

            $dareInterval = new DateInterval('P1M');

            $datePerioud = new DatePeriod($startDate, $dareInterval, $endDate);

            foreach ($datePerioud as $date) {

                $dataMonth['finance_calenders_id'] = $dataParent['id'];

                $Montname_en = $date->format('F');

                $dataParentMonth = Monthes::select('id')->where(['name_en' => $Montname_en])->first();

                $dataMonth['MONTH_ID'] = $dataParentMonth['id'];

                $dataMonth['FINANCE_YR'] = $dataToInsert['FINANCE_YR'];

                $dataMonth['START_DATE_M'] = date('Y-m-01',
                    strtotime($date->format('Y-m-d')));

                $dataMonth['END_DATE_M'] = date('Y-m-t',
                    strtotime($date->format('Y-m-d')));

                $dataMonth['year_and_month'] = date('Y-m',
                    strtotime($date->format('Y-m-d')));

                $datediff = strtotime($dataMonth['END_DATE_M']) - strtotime($dataMonth['START_DATE_M']);

                $dataMonth['number_of_days'] = round($datediff / (60 * 60 * 24)) + 1;

                $dataMonth['com_code'] = auth()->user()->com_code;

                $dataMonth['updated_at'] = date('Y-m-d H:i:s');

                $dataMonth['created_at'] = date('Y-m-d H:i:s');

                $dataMonth['added_by'] = auth()->user()->id;

                $dataMonth['updated_by'] = auth()->user()->id;

                $dataMonth['start_date_for_pasma'] =
                 date('Y-m-01',
                     strtotime($date->format('Y-m-d')));

                $dataMonth['end_date_for_pasma'] =
                date('Y-m-t',
                    strtotime($date->format('Y-m-d')));

                Finance_cln_periods::insert($dataMonth);
            }
        }

    }

    public function edit()
    {
    }

    public function Update($id, $request, $data)
    {

        $dataToUpdate = $request->validated();

        $dataToUpdate['updated_by'] = auth()->user()->id;
        $falg = Finance_calender::where(['id' => $id])->update($dataToUpdate);
        if ($falg) {
            if ($data['start_date'] != $request->start_date or $data['end_date'] != $request->end_date) {
                $flagDelete = Finance_cln_periods::where(['finance_calenders_id' => $id])->delete();
                if ($flagDelete) {
                    $startDate = new DateTime($request->start_date);
                    $endDate = new DateTime($request->end_date);
                    $dareInterval = new DateInterval('P1M');
                    $datePerioud = new DatePeriod($startDate, $dareInterval, $endDate);
                    foreach ($datePerioud as $date) {
                        $dataMonth['finance_calenders_id'] = $id;
                        $Montname_en = $date->format('F');
                        $dataParentMonth = Monthes::select('id')->where(['name_en' => $Montname_en])->first();
                        $dataMonth['MONTH_ID'] = $dataParentMonth['id'];
                        $dataMonth['FINANCE_YR'] = $dataToUpdate['FINANCE_YR'];
                        $dataMonth['START_DATE_M'] = date('Y-m-01', strtotime($date->format('Y-m-d')));
                        $dataMonth['END_DATE_M'] = date('Y-m-t', strtotime($date->format('Y-m-d')));
                        $dataMonth['year_and_month'] = date('Y-m', strtotime($date->format('Y-m-d')));
                        $datediff = strtotime($dataMonth['END_DATE_M']) - strtotime($dataMonth['START_DATE_M']);
                        $dataMonth['number_of_days'] = round($datediff / (60 * 60 * 24)) + 1;
                        $dataMonth['com_code'] = auth()->user()->com_code;
                        $dataMonth['updated_at'] = date('Y-m-d H:i:s');
                        $dataMonth['created_at'] = date('Y-m-d H:i:s');
                        $dataMonth['added_by'] = auth()->user()->id;
                        $dataMonth['updated_by'] = auth()->user()->id;
                        $dataMonth['start_date_for_pasma'] = date('Y-m-01', strtotime($date->format('Y-m-d')));
                        $dataMonth['end_date_for_pasma'] = date('Y-m-t', strtotime($date->format('Y-m-d')));
                        Finance_cln_periods::insert($dataMonth);
                    }
                }
            }
        }

    }

    public function Delete($id)
    {
        $data = Finance_calender::select('*')->where(['id' => $id])->first();
        if (empty($data)) {
            return redirect()->back()->with(['error' => ' عفوا حدث خطأ ']);
        }
        if ($data['is_open'] != 0) {
            return redirect()->back()->with(['error' => ' عفوا لايمكن حذف السنة المالية في هذه الحالة']);
        }
        $flag = Finance_calender::where(['id' => $id])->delete();
        if ($flag) {
            //this is optional in case there is no relationship
            Finance_cln_periods::where(['finance_calenders_id' => $id])->delete();
        }
    }

    public function do_open($id)
    {
        $data = Finance_calender::select('*')->where(['id' => $id])->first();
        if (empty($data)) {
            return redirect()->back()->with(['error' => ' عفوا حدث خطأ ']);
        }
        if ($data['is_open'] != 0) {
            return redirect()->back()->with(['error' => ' عفوا لايمكن فتح السنة المالية في هذه الحالة']);
        }
        $CheckDataOpenCounter = Finance_calender::where(['is_open' => 1])->count();
        if ($CheckDataOpenCounter > 0) {
            return redirect()->back()->with(['error' => '   عفوا هناك بالفعل سنة مالية مازالت مفتوحة ']);
        }
        $dataToUpdate['is_open'] = 1;
        $dataToUpdate['updated_by'] = auth()->user()->id;
        $flag = Finance_calender::where(['id' => $id])->update($dataToUpdate);

    }

    public function show_year_monthes($request)
    {
        return Finance_cln_periods::select('*')->where(['finance_calenders_id' => $request->id])->get();
    }
}
