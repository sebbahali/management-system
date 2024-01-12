<?php

namespace App\Services;

use App\Models\Departement;

class DepartementsService
{
    public function getAll()
    {
        return get_cols_where_p(new Departement(), ['*'], [
            'com_code' => auth()->user()->com_code,
        ], 'id', 'DESC', PC);
    }

    public function Store($request)
    {
        $CheckExsists = get_cols_where_row(new Departement(), ['id'], ['com_code' => auth()->user()->com_code, 'name' => $request->name]);
        if (! empty($CheckExsists)) {
            return redirect()->back()->with(['error' => 'عفوا اسم الادارة مسجل من قبل !'])->withInput();
        }

        $dataToinsert = $request->validated();
        $dataToinsert['added_by'] = auth()->user()->id;
        $dataToinsert['com_code'] = auth()->user()->com_code;
        insert(new Departement(), $dataToinsert);

    }

    public function edit($id)
    {
        return get_cols_where_row(new Departement(),
            ['*'], ['com_code' => auth()->user()->com_code,
                'id' => $id]);
    }

    public function Update($id, $request)
    {
        $dataToUpdate = $request->validated();
        $dataToUpdate['updated_by'] = auth()->user()->id;
        update(new Departement(), $dataToUpdate, ['com_code' => auth()->user()->com_code, 'id' => $id]);

        return $dataToUpdate;
    }

    public function Delete($id)
    {
        return destroy(new Departement(), ['com_code' => auth()->user()->com_code, 'id' => $id]);

    }
}
