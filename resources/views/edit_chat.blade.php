@extends('layouts.sidebar')
@section('content')


        <div class="leftContainer" style="width:90%;
                                height:20vw;
                                border: 1vw solid #FFFFFF;
                                border-radius:0.7vw;
                                color:black;
                                margin-top: 2vw;
                                margin-left: 2.8vw;
                                font-family: 'Montserrat';
                                color:#708090;
                                box-shadow: 0.5vw 0.5vw 1vw 0.8vw #C0C0C0;">

            <div class="header" style="display: flex;align-items:center">
                <h2><strong>Currently in Editing Mode</strong></h2>
                <h2 style="margin-left: 2vw">Forum Name: {{ $selectedForum->forumname }}</h2>
                
                    <a style="margin-left: 20vw" href="/forum/{{ $selectedForum->id }}">Go Back to Previous Forum</a>
                
            </div>
            
            


            @php
                $count = 0;
            @endphp
            <div>

                <div class="agenda_container">
                    <table class="styled-table2" style="font-size:0.9em; width: 100%">
                        <thead>
                            <tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_chat as $i)
                                    <tr>
                                        <td>{{ $i->chattext }}</td>
                                        <td>Replied by: {{ $i->name }}</td>
                                    </tr>
                                @endforeach
                        </tbody>
                        @if ($all_chat->isEmpty())
                        <div class="empty" style="margin-top: 1vw">
                            No active Chat in this Forum.
                        </div>
                        @endif
                    </table>
                </div>

            </div>
        </div>
            


    
            <div class="leftContainer" style="width:90%;
                        margin-top:30px;
                        border: 1vw solid #FFFFFF;
                        border-radius:0.7vw;
                        color:black;
                        margin-left: 2.8vw;
                        font-family: 'Montserrat';
                        color:#708090;
                        box-shadow: 0.5vw 0.5vw 1vw 0.8vw #C0C0C0;">

            <div class="header" style="display: flex;align-items:center">
            <h2 style="margin-left: 2vw">Reply</h2>
            </div>

            <div>

            <div class="agenda_container">
            <table class="styled-table2" style="font-size:0.9em; width: 100%">
                <thead>
                    <tr>
                    </tr>
                </thead>
                <tbody>
                    <form method="POST" action="/edit_chat" enctype="multipart/form-data">
                        @csrf
                    <tr>
                        <input id="chat_id" type="hidden" class="form-control @error('chat_id') is-invalid @enderror" name="chat_id" 
                        value="{{ $chat_id }}"  autocomplete="chat_id" >
                        <input id="user_id" type="hidden" class="form-control @error('user_id') is-invalid @enderror" name="user_id" 
                        value="{{ Auth::user()->id }}"  autocomplete="user_id" >
                        <td><textarea style="width:100%;" name="textchat" id="textchat" cols="30" rows="10">
                        {{ $chattext }}
                        </textarea></td>
                    </tr>
                    <tr>
                        

                        <td>
                            <button type="submit" class="btn btn-primary" style="float:right;">
                                {{ __('Update Reply') }}
                            </button>
                        </td>
                    </tr>
                    </form>
                </tbody>
            </table>
            </div>

            </div>
            </div>

<img src="/storage/dashBottom.png" style="margin-top: 1.3vw;margin-left: 29vw ;width: 30vw; height: 18vw" alt="">


    @endsection
