<?php

namespace App\Services;

use App\Models\Resignation;

class ResignationsService
{
    public function getAll()
    {
        return get_cols_where_p(new Resignation(), ['*'], ['com_code' => auth()->user()->com_code], 'id', 'DESC', PC);
    }

    public function Store($request)
    {
        $DataToInsert = $request->validated();
        $DataToInsert['added_by'] = auth()->user()->id;
        $DataToInsert['com_code'] = auth()->user()->com_code;
        insert(new Resignation(), $DataToInsert);

    }

    public function edit($id)
    {
    }

    public function Update($request, $id)
    {

        $dataToUpdate = $request->validated();
        $dataToUpdate['updated_by'] = auth()->user()->id;
        update(new Resignation(), $dataToUpdate, ['com_code' => auth()->user()->com_code, 'id' => $id]);
    }

    public function Delete($id)
    {
        destroy(new Resignation(), ['com_code' => auth()->user()->com_code, 'id' => $id]);

    }
}
