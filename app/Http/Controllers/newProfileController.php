<?php

/**
 * @author McDonald Aladi
 *
 * @description ProfileController  Controller that handles user Profile
 * @slack @moneya
 * @copyright 2019
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\State;
use App\Profile;
use App\Currency;
use App\Country;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;
use App\Rules\LettersOnly;

class newProfileController extends Controller
{
    

    public function edit()
    {

        
        //get country id
        //get state id
        //get currency id
        $countries = Country::all()->toArray();
        $currencies = Currency::all()->toArray();
        $states = State::all()->toArray();

        //Get user profile details
        $user = User::where('id',auth()->user()->id)->with('profile')->first();
        return view('edits_profile',['user' => $user, 'countries' => $countries,
          'currencies' =>  $currencies] );

        // dd($user);
        
    }



    public function update(Request $request)
    {

        // let's get the current user form the database
        $user = User::where('id',auth()->user()->id)->first();
        $userProfile = Profile::where('user_id',auth()->user()->id)->first();
        

         //check email
        $emailCheck = ($request->input('email') != '') && ($request->input('email') != $user->email);
         //check email
        $passCheck = $request->password != '' || $request->password != NULL;

        $rules = [];

        //check and update first name
        if ($user->profile->first_name != $request->input('first_name')) {
            $firstnameRules = [
                'first_name' => ['required', new LettersOnly],
            ];
        } else {
            $firstnameRules = [
                'first_name' => 'required|max:255',
            ];
        }
         //check and update last name
        if ($user->profile->last_name != $request->input('last_name')) {
            $lastnameRules = [
                'last_name' => ['required', new LettersOnly],
            ];
        } else {
            $lastnameRules = [
                'last_name' => 'required|max:255',
            ];
        }
         //check and update email
        if ($emailCheck) {
            $emailRules = [
                'email' => 'email|max:255|unique:users',
            ];
        } else {
            $emailRules = [
                'email' => 'email|max:255',
            ];
        }

         //check and update password
        if($passCheck)
        {
        $passwordRules = [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ];

       
       }
       
        $additionalRules = [
            'title' => 'nullable|string|max:255',
        ];

         //check and apply neccessary rules
        if($passCheck)
            {
        $rules = array_merge($firstnameRules, $lastnameRules, $emailRules,$additionalRules, $passwordRules);
        }
        else {
            $rules = array_merge($firstnameRules, $lastnameRules, $additionalRules, $emailRules);
        }

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'email' => $request->email,
        ];

        if($request->password !== '' || $request->password !== NULL)
        {
        $validator = Validator::make($request->all(), $rules);

        }
        else
        {
            $validator = Validator::make($data, $rules);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
            
        }
       

            
            if($request->password !== '' || $request->password !== NULL)
            {
            $user->password = Hash::make($request->new_password);
            }

            
            $user->name = $request->input('first_name').' '.$request->input('last_name');
            $user->email = $request->email;
            $user->save();

            $userProfile->first_name = $request->first_name;
            $userProfile->last_name = $request->input('last_name');
            $userProfile->title = $request->input('title');
            $userProfile->save();

            return back()->with('success', 'Account has been updated!');
                    
                  

                 


    }

    public function updatecompany(Request $request)
    {
        // $additionalRules = [
        //     'title' => 'nullable|string|max:255',
        // ];
      $rules =  [
            'company_name' => 'nullable|string|max:255',
            'company_email' => 'nullable|email|string|max:255',
            'company_address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'street_number' => 'nullable|string|max:255',
            'street_number' => 'nullable|string|max:255',
            'country_id' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zipcode' => 'nullable|string|max:255',
            'state_id' => 'nullable|string|max:255',
            'contacts' => 'nullable|string|max:255',
            'currency_id' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
            
        }




        $userProfile = Profile::where('user_id',auth()->user()->id)->first();
        $userProfile->company_name = ucfirst($request->input('company_name'));
        $userProfile->company_email = strtolower($request->input('company_email'));
        $userProfile->company_address = ucfirst($request->input('company_address'));
        $userProfile->phone = $request->input('phone');
        $userProfile->street = $request->input('street');
        $userProfile->street_number = $request->input('street_number');
        $userProfile->country_id = $request->input('country_id');
        $userProfile->city  = $request->input('city');
        $userProfile->zipcode = $request->input('zipcode');
        $userProfile->state_id = $request->input('state_id');
        $userProfile->timezone = $request->input('timezone');
        $userProfile->contacts = ucfirst($request->input('contacts'));
        $userProfile->currency_id = $request->input('currency_id');
        $userProfile->save();
        
        return back()->with('success', 'Account has been updated!');
    }

}
