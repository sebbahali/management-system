<?php

namespace App\Services;

use App\Models\Shifts_type;

class ShiftsTypesService
{
    public function getAll()
    {
        return get_cols_where_p(new Shifts_type(), ['*'], ['com_code' => auth()->user()->com_code], 'id', 'DESC', PC);
    }

    public function edit($id)
    {
        $data = get_cols_where_row(new Shifts_type(), ['*'], ['com_code' => auth()->user()->com_code, 'id' => $id]);
        if (empty($data)) {
            return redirect()->route('ShiftsTypes.index')->with(['error' => 'عفوا غير قادر الي الوصول للبيانات المطلوبة']);
        }

        return $data;
    }

    public function Update($request, $id)
    {
        $dataToUpdate = $request->validated();

        $dataToUpdate['updated_by'] = auth()->user()->id;
        update(new Shifts_type(), $dataToUpdate, ['com_code' => auth()->user()->com_code, 'id' => $id]);
    }

    public function Delete($id)
    {
        destroy(new Shifts_type(), ['com_code' => auth()->user()->com_code, 'id' => $id]);

    }
}
