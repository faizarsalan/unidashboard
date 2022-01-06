<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function Welcome(){
        return view('welcome');
    }

    public function EditProfileForm(Request $request){

        $images = NULL;
        if (Auth::user()->images == NULL){
            $images= 'default_pp.png';
        }else {
            $images= Auth::user()->images;
        }

        $data = User::where('id', $request->id)->first();
        
        $list = [
            'image' => $images,
            'user' => $data
        ];

        return view('editFORM', $list);
    }

    public function EditProfile(Request $request){
        $validating = $request->validate([
            'name' =>'required|min:5',
            'email' => 'required',
            'password' => 'required|min:8',
            'images' => 'image|nullable'
        ]);
        
        $images = $validating['images'];

        if($images != NULL){
            $file = $request->file('images');
            $fileName = $request->name . "." . $file->getClientOriginalExtension();
            Storage::putFileAs("public", $file, $fileName);
            $validating['images'] = $fileName;
        }

        User::where('id', $request->id)->update($validating);

        return redirect('home');
    }

}
