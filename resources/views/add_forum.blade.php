@extends('layouts.sidebar')
@section('content')


        <div class="leftContainer" style="width:90%;
                                height:40vw;
                                border: 1vw solid #FFFFFF;
                                border-radius:0.7vw;
                                color:black;
                                margin-top: 2vw;
                                margin-left: 2.8vw;
                                font-family: 'Montserrat';
                                color:#708090;
                                box-shadow: 0.5vw 0.5vw 1vw 0.8vw #C0C0C0;">

            <div class="header" style="display: flex;align-items:center">
                <h2 style="margin-left: 2vw">Add New Forum</h2>
            </div>


            
            <div>

                <div class="agenda_container">
                    <table class="styled-table2" style="font-size:0.9em; width: 100%">
                        <thead>
                            <tr>
                            </tr>
                        </thead>
                        <tbody>
                            <form method="POST" action="/add_forum" enctype="multipart/form-data">
                                @csrf
                            <tr>
                                <td>Forum Name=</td>
                                <td>
                                <input id="forum_name" type="text" class="form-control @error('forum_name') is-invalid @enderror" name="forum_name" 
                                value=""  autocomplete="forum_name" style="width: 100%;">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-primary" style="float:right;">
                                        {{ __('Add New Forum') }}
                                    </button>
                                </td>
                            </tr>
                            </form>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
            



        </div>
        </div>

<img src="/storage/dashBottom.png" style="margin-top: 1.3vw;margin-left: 29vw ;width: 30vw; height: 18vw" alt="">


    @endsection
