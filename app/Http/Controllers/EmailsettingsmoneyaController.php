<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\EmailSetting;
use Auth;
use Illuminate\Support\Facades\Validator;

class EmailsettingsmoneyaController extends Controller
{
     /**
     * @description : GET THE AUTH SINGLE USER EMAILS SETTINGS DETAILS
     *
     */
    public function index()
    {
        //get user emails using relationships between user model and email settings model
        $emailsetting =  EmailSetting::where('user_id',auth()->user()->toArray()['id'])->first();
     
        //if null , let's create default values
        if($emailsetting == null)
        {
            
                $auto_invoice_message ='It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.';
                $auto_approval_message ='It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.';
                $auto_agreement_message ='It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.';
            

                $emailsetting = EmailSetting::create([
                'user_id' => auth()->user()->id,
                'auto_invoice_message' => $auto_invoice_message,
                'auto_approval_message' =>$auto_approval_message,
                'auto_agreement_message' => $auto_agreement_message
                    ]);

            return view('emailsettingsmoneya')->with(['status'=> 'success','emailsetting'=>$emailsetting]);
        }
        else{
            
            $emailsetting =  EmailSetting::where('user_id',auth()->user()->toArray()['id'])->first();

            return view('emailsettingsmoneya')->with(['status'=> 'success','emailsetting'=>$emailsetting]);
        }
    }


    public function update(Request $request)
    {
        $rules = array_merge([
            'invoice' => ['required','string', 'max:2000'],
            'proposal' => ['required','string', 'max:2000'],
            'agreement' => ['required','string', 'max:2000'],
        ]);

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
            
        }

        $emailsetting =  EmailSetting::where('user_id',auth()->user()->toArray()['id'])->first();
         $emailsetting->auto_invoice_message = $request->input('invoice');
        $emailsetting->auto_approval_message = $request->input('proposal');
        $emailsetting->auto_agreement_message = $request->input('agreement');
        $emailsetting->save();

        return redirect()->back()->with('success', 'Settings has been updated!');

        // return back()->with('success', 'Settings has been updated!');
    }
}
