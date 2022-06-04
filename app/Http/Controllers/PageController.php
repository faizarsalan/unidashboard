<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\AgendaDetail;
use App\Models\chat;
use App\Models\forum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function Welcome(){
        return view('welcome');
    }

    // PROFILE
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

    // AGENDA

    public function Agenda(Request $request){
        $details = AgendaDetail::where('agenda_id', $request->id)->orderBy('time')->get();
        $list = [
            'agenda_details' => $details
        ];
        return view('agenda', $list);
    }

    public function AddAgenda(Request $request){

        $agenda_details = new AgendaDetail();
        $agenda_details->time = $request->time;
        $agenda_details->agenda = $request->agenda;
        $agenda_details->agenda_id = $request->id;

        $agenda_details->save();

        return redirect()->back();
    }

    public function EditAgendaForm(Request $request){

        $data = AgendaDetail::where('id', $request->id)->first();

        $list = [
            'detail' => $data
        ];
        return view('editAgenda', $list);
    }

    public function EditAgenda(Request $request){
        
        $validating = $request->validate([
            'time' =>'required',
            'agenda' => 'required',
        ]);

        AgendaDetail::where('id', $request->id)->update($validating);

        $agenda_id = Auth::user()->id;

        return redirect()->route('agenda_view', ['id' => $agenda_id] );
    }

    public function CompleteAgenda(Request $request){

        AgendaDetail::where('id', $request->id)->delete();

        return redirect()->back();
    }

    public function forum_index(Request $request){
        $selectedForum = forum::select('forums.*')
               ->where('forums.id', '=', $request->id)
               ->first();

        $all_chat = DB::table('chats')
            ->join('users', 'users.id', '=', 'chats.userid_chat')
            ->where('forum_id',$request->id)
            ->select('chats.*', 'users.name')
            ->get();
        //dd($all_chat);
        $list = [
            'all_chat' => $all_chat,
            'selectedForum'=>$selectedForum
        ];
        return view('forum', $list);
    }

    public function forum_post(Request $request){
        //dd($request);
        $obj = new chat; //create new category based on the newly submitted variables
        $obj->chattext = $request->textchat;
        $obj->forum_id = $request->forum_id;
        $obj->userid_chat = $request->user_id;
        $obj->save();

        return redirect()->back();
    }

    public function add_forum_index(){
        return view('add_forum');
    }

    public function add_forum_post(Request $request){
        //dd($request);
        $obj = new forum; //create new category based on the newly submitted variables
        $obj->forumname = $request->forum_name;
        //$obj->category_id = "2";
        $obj->save();

        return redirect()->back();
    }

    public function edit_chat_index(Request $request){
        $selectedForum = forum::select('forums.*')
               ->where('forums.id', '=', $request->forum_id)
               ->first();

        $all_chat = DB::table('chats')
            ->join('users', 'users.id', '=', 'chats.userid_chat')
            ->where('forum_id',$request->forum_id)
            ->select('chats.*', 'users.name')
            ->get();

        $list = [
            'selectedForum' => $selectedForum,
            'user_id'=> $request->user_id,
            'chat_id'=>$request->chat_id,
            'all_chat'=> $all_chat,
            'chattext'=> $request->chattext
        ];
        return view('edit_chat', $list);
    }

    public function edit_chat_post(Request $request){
        //dd($request);
        chat::where('chats.id', '=', $request->chat_id)
        ->first()->update([
        'chattext' => $request->textchat
        ]);

        return redirect()->back();
    }

    public function delete_chat(Request $request){
        $selectChat = chat::where('chats.id', '=', $request->chat_id)
               ->first();
        $selectChat->delete();

        return redirect()->back();
    }
    
    

}
