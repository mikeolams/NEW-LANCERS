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

    // public $project;

    public function createproject(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        

        if ($validator->fails()) 
        {
            return back()->withErrors($validator)->withInput();
        } 
        else 
        {

            $data = ["title"=> $request->title,
            "description"=> $request->description,
            'tracking_code' => Project::generateTrackingCode()
        ];

        //  $datas = session(['project' =>  $data]);
        // return redirect('guest/create/estimate/');>with( [ 'id' => $id ] );
        $project = Session::get('project');
        return redirect('guest/create/estimate/')->with(['project' => $project]);
                // dd(session('project'));
            
        }

    }

    public function estimatecreate(Request $request)
    {
        $data = session('project');

        if ($data) {
           
            return view('guests/set_estimate')->with('project', Session::get('project'));
           
        }

        return redirect('guest/create/project/')->with("error", "You need to create a project first");

     
    }



    public function estimatesave(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            // 'project_id' => 'required|numeric',
            'time' => 'required|numeric',
            'price_per_hour' => 'required|numeric',
            'equipment_cost' => 'nullable|numeric',
            'sub_contractors' => 'nullable|string',
            'sub_contractors_cost' => 'nullable|numeric',
            'similar_projects' => 'required|numeric',
            'rating' => 'required|numeric',
            'currency_id' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $data = [
                'time' => $request->time,
                'price_per_hour' => $request->cost_per_hour,
                'equipment_cost' => $request->equipment_cost,
                'sub_contractors' => $request->sub_contractors,
                'sub_contractors_cost' => $request->sub_contractors_cost,
                'similar_projects' => $request->similar_projects,
                'rating' => $request->rating,
                'currency_id' => $request->currency,
                'start' => $request->start,
                'end' => $request->end
        ];

        }

    }
}
