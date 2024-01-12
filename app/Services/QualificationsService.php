<?php

namespace App\Services;

use App\Models\Qualification;

class QualificationsService
{
    public function getAll()
    {
        return get_cols_where_p(new Qualification(), ['*'], ['com_code' => auth()->user()->com_code,
        ], 'id', 'DESC', PC);

    }

    public function Store($request)
    {
        $DataToInsert = $request->validated();
        $DataToInsert['added_by'] = auth()->user()->com_code;
        $DataToInsert['com_code'] = auth()->user()->com_code;
        insert(new Qualification(), $DataToInsert);
    }

    public function edit($id)
    {
        $data = get_cols_where_row(new Qualification(), ['*'], ['com_code' => auth()->user()->com_code, 'id' => $id]);
        if (empty($data)) {
            return redirect()->route('Qualifications.index')->with(['error' => 'عفوا غير قادر للوصول الي البيانات المطلوبة !']);
        }

        return $data;
    }

    public function Update($request, $id)
    {
        $dataToUpdate = $request->validated();
        $dataToUpdate['updated_by'] = auth()->user()->id;
        update(new Qualification(), $dataToUpdate, ['com_code' => auth()->user()->com_code, 'id' => $id]);
    }

    public function Delete($id)
    {
        destroy(new Qualification(), ['com_code' => auth()->user()->com_code, 'id' => $id]);

    }
}
