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
use App\ContactMessage;

class GuestController extends Controller
{
    public function createproject()
    {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
          $data = $request->session()->put('session_project',
             ["title"=> $request->title,
            "description"=> $request->description,
            'tracking_code' => Project::generateTrackingCode()
            ]);
            // return view('view_name');

            dd($data);
        }

    }

    public function process_contact_form(Request $request)
    {

       $message = new ContactMessage;

      $request->validate(["contents"=>"required","subject"=>"required"],["contents.required" => "Content Field is Required","subject.required"=> "Subject Field is required"]);


       $message->user_id = Auth::User()->id;
       $message->message =  $request->contents;
       $message->subject = $request->subject;
       $message->save();

       //$data["success"] =;
       return redirect('/guest/contact')->with(["success" => "<span style='color:green;'>Message Set Successfully</span>"]);

    }
}
