<?php

namespace App\Services;

use App\Models\Branche;
use Illuminate\Support\Facades\DB;

class BranchesService
{
    public function getAll()
    {

        return get_cols_where_p(new Branche(), ['*'],
            ['com_code' => auth()->user()->com_code],
            'id', 'DESC', PC);

    }

    public function Store($request)
    {
        $checkExsists = get_cols_where_row(new Branche(), ['id'], ['com_code' => auth()->user()->com_code, 'name' => $request->name]);
        if (! empty($checkExsists)) {
            return redirect()->back()->with(['error' => 'عفوا اسم الفرع مسجل من قبل !'])->withInput();
        }
        DB::beginTransaction();
        $dataToInsert = $request->validated();
        $dataToInsert['added_by'] = auth()->user()->id;
        $dataToInsert['com_code'] = auth()->user()->com_code;
        insert(new Branche(), $dataToInsert);
        DB::commit();

    }

    public function edit($id)
    {
        return get_cols_where_row(new Branche(), ['*'],
            ['id' => $id, 'com_code' => auth()->user()->com_code]);

    }

    public function Update($id, $request)
    {

        $data = get_cols_where_row(new Branche(), ['*'], ['id' => $id, 'com_code' => auth()->user()->com_code]);
        if (empty($data)) {
            return redirect()->route('branches.index')->with(['error' => 'عفوا غير قادر علي الوصول الي البيانات المطلوبة']);
        }
        DB::beginTransaction();
        $dataToUpdate = $request->validated();
        $dataToUpdate['updated_by'] = auth()->user()->id;
        update(new Branche(), $dataToUpdate, ['id' => $id, 'com_code' => auth()->user()->com_code]);
        DB::commit();
    }

    public function Delete($id)
    {
        destroy(new Branche(),
            ['id' => $id,
                'com_code' => auth()->user()->com_code]);
    }
}
