<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Project;
use App\Estimate;
use App\Invoice;
use Response;
use Hash;
Use Validator;
use Session;
use Redirect;


class GuestController extends Controller
{
    public function createproject(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
           $request->session()->put('project',
             ["title"=> $request->title,
            "description"=> $request->description,
            'tracking_code' => Project::generateTrackingCode()
            ]);
            // return view('view_name');
                $data = $request->session()->get('project');
            dd($data);
        }

    }
}
