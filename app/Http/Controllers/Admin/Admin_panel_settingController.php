<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin_panel_settingRequest;
use App\Models\Admin_panel_setting;

class Admin_panel_settingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Admin_panel_setting::select('*')->where('com_code', auth()->user()->com_code)->first();

        return view('admin.Admin_panel_setting.index', ['data' => $data]);
    }

    public function edit()
    {

        $data = Admin_panel_setting::select('*')->where('com_code', auth()->user()->com_code)->first();

        return view('admin.Admin_panel_setting.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Admin_panel_settingRequest $request)
    {
        try {

            $request['updated_by'] = auth()->user()->id;

            Admin_panel_setting::where(['com_code' => auth()->user()->com_code])
            ->update($request);

            return redirect()->route('admin_panel_settings.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'عفوا حدث خطأ ما'])->withInput();
        }
    }
}
