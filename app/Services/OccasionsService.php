<?php

namespace App\Services;

use App\Models\Occasion;

class OccasionsService
{
    public function getAll()
    {
        return get_cols_where_p(new Occasion(), ['*'], ['com_code' => auth()->user()->com_code], 'id', 'DESC', PC);

    }

    public function Store($request)
    {
        $dataToInsert = $request->validated();
        $dataToInsert['added_by'] = auth()->user()->id;
        $dataToInsert['com_code'] = auth()->user()->com_code;
        insert(new Occasion(), $dataToInsert);
    }

    public function edit($id)
    {
        $data = get_cols_where_row(new Occasion(), ['*'], ['com_code' => auth()->user()->com_code, 'id' => $id]);
        if (empty($data)) {
            return redirect()->route('occasions.index')->with(['error' => 'عفوا هذه البيانات غير موجوده']);
        }

        return $data;
    }

    public function Update($request, $id)
    {

        $dataToUpdate = $request->validated();
        $dataToUpdate['updated_by'] = auth()->user()->id;
        update(new Occasion(), $dataToUpdate, ['com_code' => auth()->user()->com_code, 'id' => $id]);
    }

    public function Delete($id)
    {
        destroy(new Occasion(), ['com_code' => auth()->user()->com_code, 'id' => $id]);

    }
}
