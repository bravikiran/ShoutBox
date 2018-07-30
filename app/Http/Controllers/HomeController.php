<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $notapproved = DB::table('shoutboxideas')->where('confirmed', '=', false)->orderByDesc('id')->get();

        $rejected = DB::table('shoutboxideas')->where('confirmed', '=', 2)->orderByDesc('id')->get();

        return view('home', ['notapproved' => $notapproved, 'rejected' => $rejected]);
    }

    public function approveorcancel(Request $request)
    {
     
        $this->validate($request, [
            'id' => 'required'
        ]);
 

        if( $request->approved ) {
            DB::table('shoutboxideas')
                    ->where('id', $request->id)
                    ->update(['confirmed' => true]);
        } else {
            DB::table('shoutboxideas')
                    ->where('id', $request->id)
                    ->update(['confirmed' => 2 ]);

        }

        return Redirect::to('home');
        
    }
}
