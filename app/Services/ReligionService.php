<?php

namespace App\Services;

use App\Models\Religion;

class ReligionService
{
    public function getAll()
    {
        return get_cols_where_p(new Religion(), ['*'], ['com_code' => auth()->user()->com_code], 'id', 'DESC', PC);
    }

    public function Store($request)
    {
        $DataTonInsert = $request->validated();
        $DataTonInsert['added_by'] = auth()->user()->id;
        $DataTonInsert['com_code'] = auth()->user()->com_code;
        insert(new Religion(), $DataTonInsert);
    }

    public function edit($id)
    {
        $data = get_cols_where_row(new Religion(), ['*'], ['com_code' => auth()->user()->com_code, 'id' => $id]);
        if (empty($data)) {
            return redirect()->route('Religions.index')->with(['error' => 'عفوا غير قادر للوصول الي البيانات المطلوبة !']);
        }

        return $data;
    }

    public function Update($request, $id)
    {
        $DataToUpdate = $request->validated();
        $DataToUpdate['updated_by'] = auth()->user()->id;
        update(new Religion(), $DataToUpdate, ['com_code' => auth()->user()->com_code, 'id' => $id]);
    }

    public function Delete($id)
    {
        destroy(new Religion(), ['com_code' => auth()->user()->com_code, 'id' => $id]);

    }
}
