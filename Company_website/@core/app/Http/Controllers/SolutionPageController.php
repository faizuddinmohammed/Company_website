<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

class SolutionPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function solution_page_settings(){
        return view('backend.pages.solution.service-page-settings');
    }
    public function update_solution_page_settings(Request $request){
        $this->validate($request,[
            'service_page_service_items' => 'required|string|max:191',
        ]);
        update_static_option('service_page_service_items', $request->service_page_service_items);

        return redirect()->back()->with(['msg' => __('Settings Update Success'),'type' => 'success']);
    }
}
