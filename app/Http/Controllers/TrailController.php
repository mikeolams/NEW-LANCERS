<?php

namespace App\Http\Controllers;

use App\Trail;

use Illuminate\Http\Request;

class TrailController extends Controller
{
    public function index()
    {
        // get user notification
        
    	$user = Auth::user();
    	$trail = Trail::where('user_id', auth()->user()->id)->paginate(25);
        return view('trail')->withTrail($trail);
    }
 
}
