<?php

namespace App\Services;

use App\Models\blood_groups;
use App\Models\Branche;
use App\Models\centers;
use App\Models\Countries;
use App\Models\Departement;
use App\Models\driving_license_type;
use App\Models\Employee;
use App\Models\governorates;
use App\Models\jobs_categorie;
use App\Models\Language;
use App\Models\Military_status;
use App\Models\Nationalitie;
use App\Models\Qualification;
use App\Models\Religion;
use App\Models\Shifts_type;

class EmployeesService
{
    public function getAll()
    {

        return get_cols_where_p(new Employee(),
            ['*'],
            ['com_code' => auth()->user()->com_code],
            'id', 'DESC', PC);
    }

    public function create()
    {
        $com_code = auth()->user()->com_code;

        $other['branches'] =
         get_cols_where(new Branche(), ['id', 'name'], ['com_code' => $com_code, 'active' => 1]);

        $other['departements'] =
         get_cols_where(new Departement(),
             ['id', 'name'],
             ['com_code' => $com_code, 'active' => 1]);

        $other['jobs'] =
         get_cols_where(new jobs_categorie(),
             ['id', 'name'],
             ['com_code' => $com_code, 'active' => 1]);

        $other['qualifications'] =
        get_cols_where(new Qualification(),
            ['id', 'name'],
            ['com_code' => $com_code, 'active' => 1]);

        $other['religions'] =
        get_cols_where(new Religion(),
            ['id', 'name'],
            ['com_code' => $com_code, 'active' => 1]);

        $other['nationalities'] =
        get_cols_where(new Nationalitie(),
            ['id', 'name'],
            ['com_code' => $com_code, 'active' => 1]);

        $other['countires'] =
        get_cols_where(new Countries(),
            ['id', 'name'],
            ['com_code' => $com_code, 'active' => 1]);

        $other['blood_groups'] =
        get_cols_where(new blood_groups(),
            ['id', 'name'],
            ['com_code' => $com_code, 'active' => 1]);

        $other['military_status'] =
        get_cols_where(new Military_status(),
            ['id', 'name'], ['active' => 1],
            'id', 'ASC');

        $other['driving_license_types'] =
        get_cols_where(new driving_license_type(),
            ['id', 'name'],
            ['active' => 1, 'com_code' => $com_code],
            'id', 'ASC');

        $other['shifts_types'] =
         get_cols_where(new Shifts_type(),
             ['id', 'type', 'from_time', 'to_time', 'total_hour'],
             ['active' => 1, 'com_code' => $com_code], 'id', 'ASC');

        $other['languages'] = get_cols_where(new Language(),
            ['id', 'name'],
            ['active' => 1, 'com_code' => $com_code],
            'id', 'ASC');

        return $other;
    }

    public function Store()
    {
    }

    public function getByid()
    {
    }

    public function edit()
    {
    }

    public function Update()
    {
    }

    public function Delete()
    {
    }

    public function get_governorates($request)
    {
        $country_id = $request->country_id;

        $other['governorates'] = get_cols_where(new governorates(),
            ['id', 'name'], ['com_code' => auth()->user()->com_code,
                'countires_id' => $country_id]);

        return $other;

    }

    public function get_centers($request)
    {
        $governorates_id = $request->governorates_id;

        $other['centers'] =
         get_cols_where(new centers(), ['id', 'name'],
             ['com_code' => auth()->user()->com_code, 'governorates_id' => $governorates_id]);

        return $other;
    }
}
