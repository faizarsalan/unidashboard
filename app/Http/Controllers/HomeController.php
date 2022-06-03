<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\forum;
use Forums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $file = File::where('user_id', Auth::user()->id)->latest('created_at')->limit(4)->get();
        $forums = forum::all();
        //dd($forums);
        $list = [
            'file' =>$file,
            'forums'=>$forums
        ];
        return view('dashboard', $list);
    }
}
