<?php

namespace App\Services;

use App\Models\jobs_categorie;

class JobsService
{
    public function getAll()
    {
        $data = get_cols_where_p(new jobs_categorie(), ['*'], ['com_code' => auth()->user()->com_code], 'id', 'DESC', PC);

        return $data;
    }

    public function Store($request)
    {
        $dataToInsert = $request->validated();
        $dataToInsert['added_by'] = auth()->user()->id;
        $dataToInsert['com_code'] = auth()->user()->com_code;
        insert(new jobs_categorie(), $dataToInsert);
    }

    public function edit($id)
    {
        $data = get_cols_where_row(new jobs_categorie(), ['*'], ['com_code' => auth()->user()->com_code, 'id' => $id]);
        if (empty($data)) {
            return redirect()->route('jobs_categories.index')->with(['error' => 'عفوا غير قادر الي الوصول الي البيانات المطلوبة']);
        }

        return $data;
    }

    public function Update($id, $request)
    {
        $dataToUpdate = $request->validated();
        $dataToUpdate['updated_by'] = auth()->user()->id;
        update(new jobs_categorie(), $dataToUpdate, ['com_code' => auth()->user()->com_code, 'id' => $id]);
    }

    public function Delete($id)
    {
        destroy(new jobs_categorie(), ['com_code' => auth()->user()->com_code, 'id' => $id]);

    }
}
