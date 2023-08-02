<?php

namespace App\Http\Controllers;

use App\Http\Requests\AffilatesRequest;
use App\Models\stores_affiliate;
use Illuminate\Http\Request;

class StoresAffilatesController extends Controller
{
    public function affilate()
    {

        return view('affilate');
    }


    public function store_affilate(AffilatesRequest $request)
    {
        if ($request->hasFile('image')) {

            $logo_path = $request->file('image')->store('admin/images/', 'public');
        }

        $alldata = $request->validated();
        $affilates = stores_affiliate::create(
            array_merge($alldata, [

                'logo_path' => $logo_path,
            ])

        );
        return redirect('dashboard');
    }
}
