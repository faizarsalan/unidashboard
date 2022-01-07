@extends('layouts.sidebar')

@section('content')
<style>

    .box{
        background-color: rgba(200,160,160,255);
        font-family: 'Montserrat';
        width: 30vw;
        height: 20vw;
        display: flex;
        justify-content: center;
        border-radius: 1vw;
    }
    
    .form-group{
        margin: 2vw 0 2vw 0;
    }
    
    input{
        font-size:1.5vw;
        border-radius:1.5vw;
        border: solid #9ca3af;
        color:#4b5563"
    }
    
    a{
        margin-right: 2vw;
    }
    
    button{
        cursor: pointer;
    }
    .cancel{
        width: 5vw;
        background-color:#4b5563;
        height:3vw;
        border-radius:1vw;
        border:none;
        color:white
    }
    .update{
        width: 8.5vw;
        background-color:#0ea5e9;
        height:3vw;
        border-radius:1vw;
        border:none;
        color:white;
    }
    </style>
    
    <div class="box">
    
        <form action="/editAgenda/{{$detail->id}}" method="POST">
            @csrf
            <h1>Update Agenda</h1>
        
            <div class="form-group">
                <input type="text" class="form-control" name="time" value="{{ old('time') ?? $detail->time}}">
            </div>
    
            <div class="form-group">
                <input type="text" class="form-control" name="agenda" value="{{ old('agenda') ?? $detail->agenda}}">
            </div>
            <a href="/agenda/{{Auth::user()->id}}"><button type="button" class="cancel">Cancel</button></a>
            <button class="update" type="submit">Update</button></a>
        </form>
    
    </div>
@endsection

