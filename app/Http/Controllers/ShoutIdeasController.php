<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

use DB;

use App\shoutboxideas;
use Redirect;

class ShoutIdeasController extends Controller
{
    
    public function index() 
    {
        $manyideas = DB::table('shoutboxideas')->where('confirmed', '=', true)->orderByDesc('id')->get();

        return view('index', ['manyideas' => $manyideas]);
    }
    
    public function store(Request $request) 
    {
        $this->validate($request, [
            'shoutidea' => 'required|min:15'
        ]);
        
        //$ideas = new shoutboxideas;

        if( empty( $request->username )) {            
            //$ideas->username = uniqid(rand(1, 100));

            DB::table('shoutboxideas')->insert(
                ['user_name' => uniqid(rand(1, 100)), 'shout_idea' => $request->shoutidea, 'created_at' =>  \Carbon\Carbon::now(), 'confirmed' => false]
            );

        } else {
            DB::table('shoutboxideas')->insert(
                ['user_name' => $request->username, 'shout_idea' => $request->shoutidea, 'created_at' =>  \Carbon\Carbon::now(), 'confirmed' => false]
            );
            // $ideas->user_name = $request->username;
            // $idea->shout_idea = $request->shoutidea;

        }

        // $ideas->user_name = $request->username;       
        // $idea->shout_idea = $request->shoutidea;
               
        // $ideas->save();

        return Redirect::to('/')->with('success', 'Thanks for your input. Your idea will be published once it is approved');
    }
}
