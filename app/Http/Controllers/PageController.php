<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\AgendaDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        if($request->images == NULL){

        }
        
        // $images = $validating['images'];

        if($request->images != NULL){
            $file = $request->file('images');
            $fileName = $request->name . "." . $file->getClientOriginalExtension();
            Storage::putFileAs("public", $file, $fileName);
            $validating['images'] = $fileName;
        }

        $validating['password'] = Hash::make($validating['password']);

        User::where('id', $request->id)->update($validating);

        return redirect('home');
    }

    public function Agenda(Request $request){
        $agenda = Agenda::where('user_id', $request->id)->first();
        $details = AgendaDetail::where('agenda_id', $agenda->id)->get();

        return view('agenda', compact($details));
    }

}
