@extends('layouts.sidebar')
@section('content')


        <div class="leftContainer" style="width:40vw;
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
                <h2 style="margin-left: 2vw">All Forums</h2>
                <a href="/add_forum" style="color:blue; margin-top:1vw;margin-left:1vw;">Add new Forum</a>
            </div>


            @php
                $count = 0;
            @endphp
            <div>

                <div class="agenda_container">
                    <table class="styled-table2" style="font-size:0.9em ">
                        <thead>
                            <tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($forums as $i)
                                    <tr>
                                        <td>{{ $i->forumname }}</td>
                                        <td><a href="/forum/{{ $i->id }}">Go to Forum</a></td>
                                    </tr>
                                @endforeach
                        </tbody>
                        @if ($forums->isEmpty())
                        <div class="empty" style="margin-left: -19vw; margin-top: 1vw">
                            No active forums.
                        </div>
                        @endif
                    </table>
                </div>
            </div>
        </div>

            <div class="rightContainer" style="width:40vw;
                                        height:20vw;
                                        border: 1vw solid #FFFFFF;
                                        border-radius:0.7vw;
                                        color:black;
                                        margin-top: -20vw;
                                        margin-left: 45.6vw;
                                        font-family: 'Montserrat';
                                        color:#708090;
                                        box-shadow: 0.5vw 0.5vw 1vw 0.8vw #C0C0C0;">

                <div class="header" style="display: flex;align-items:center;">
                    <h2 style="margin-left: 2vw">Recent Files Uploaded</h2>
                    <a href="/file" style="color:blue; margin-top:1vw;margin-left:1vw;">See all</a>
                </div>
                @if (!$file->isEmpty())
                    <div>
                        <table class="styled-table2">
                            <thead>
                                <tr>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($file as $i => $item)
                                    @php
                                        $url = false;
                                        if ($item->public) {
                                            $url = true;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td><a href="/view/{{ $item->id }}"
                                                style="text-decoration: none">{{ $item->name }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty" style="margin-left: -19vw; margin-top: 1vw">
                        You don't have any files.
                    </div>
                @endif
            </div>

            <div>
                <img src="/storage/dashBottom.png" style="margin-top: 1.3vw;margin-left: 29vw ;width: 30vw; height: 18vw" alt="">
            </div>


    @endsection
