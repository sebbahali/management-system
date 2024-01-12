<?php

namespace App\Services;

use App\Models\Nationalitie;

class NationalitiesService
{
    public function getAll()
    {
        return get_cols_where_p(new Nationalitie(), ['*'], ['com_code' => auth()->user()->com_code], 'id', 'DESC', PC);
    }

    public function Store($request)
    {
        $DataToInsert = $request->validated();
        $DataToInsert['added_by'] = auth()->user()->id;
        $DataToInsert['com_code'] = auth()->user()->com_code;
        insert(new Nationalitie(), $DataToInsert);
    }

    public function edit($id)
    {
        $com_code = auth()->user()->com_code;
        $data = get_cols_where_row(new Nationalitie(), ['*'], ['com_code' => $com_code, 'id' => $id]);
        if (empty($data)) {
            return redirect()->route('Nationalities.index')->with(['error' => 'عفوا غير قادر للوصول الي البيانات المطلوبة']);
        }

        return $data;
    }

    public function Update($request, $id)
    {
        $DataToUpdate = $request->validated();
        $DataToUpdate['updated_by'] = auth()->user()->id;
        update(new Nationalitie(), $DataToUpdate, ['com_code' => auth()->user()->com_code, 'id' => $id]);
    }

    public function Delete($id)
    {
        destroy(new Nationalitie(), ['com_code' => auth()->user()->com_code, 'id' => $id]);

    }
}
