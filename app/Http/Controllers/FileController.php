<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(){
        $file = File::where('user_id', Auth::user()->id)->get();
        return view('file',compact('file'));
    }

    public function viewer(Request $request){
        $file = File::where('id', $request->id)->where('user_id', Auth::user()->id)->first();
        return view('viewer',compact('file'));
    }

    public function share(Request $request){
        $file = File::where('id', 1)->first();
        return view('viewer',compact('file'));
    }
    
    public function delete(Request $request) {
        File::where('id', $request->id)->delete();
        return redirect()->back();
    }

    public function upload(Request $request) {
        $file = new File();
        $validating = $request->validate([
            'file' =>'required|mimes:pdf'
        ]);
        Storage::putFileAs('/public/files', $request->file('file'), $request->file('file')->getClientOriginalName());
        $file->user_id = Auth::user()->id;
        $file->name = $request->file('file')->getClientOriginalName();
        $file->public = false;
        $file->save();
        
        return redirect()->back();
    }
}
