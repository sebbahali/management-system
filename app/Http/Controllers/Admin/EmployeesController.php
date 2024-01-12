<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\EmployeesService;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    protected $EmployeesService;

    public function __construct(EmployeesService $EmployeesService)
    {
        $this->EmployeesService = $EmployeesService;

    }

    public function index()
    {

        return view('admin.Employees.index',
            ['data' => $this->EmployeesService->getAll()]);
    }

    public function create()
    {

        return view('admin.Employees.create',
            ['other' => $this->EmployeesService->create()]);
    }

    public function get_governorates(Request $request)
    {
        if ($request->ajax()) {

            return view('admin.Employees.get_governorates',
                ['other' => $this->EmployeesService->get_governorates($request)]);
        }
    }

    public function get_centers(Request $request)
    {
        if ($request->ajax()) {

            return view('admin.Employees.get_centers',
                ['other' => $this->EmployeesService->get_centers($request)]);
        }
    }
}
