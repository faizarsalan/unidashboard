@extends('layouts.sidebar')
@section('content')
    <style>
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .act-btn{
      background:green;
      display: block;
      width: 50px;
      height: 50px;
      line-height: 50px;
      text-align: center;
      color: white;
      font-size: 30px;
      font-weight: bold;
      border-radius: 50%;
      -webkit-border-radius: 50%;
      text-decoration: none;
      transition: ease all 0.3s;
      position: fixed;
      right: 30px;
      bottom:30px;
    }
.act-btn:hover{background: blue}

        table {
            margin-top:2vw;
            height:45vw;
            display: flex;
            justify-content:center;
            width: 100vw;
        }
        
        a {
            text-decoration: none;
        }
    </style>
    <table>
        <tbody>
            <th>
                <tr>
                    <th>#</th>
                    <th>File Name</th>
                    <th>Shared</th>
                    <th>Action</th>
                </tr>
            </th>
            @foreach ($file as $i => $item)
            @php
                $url = false;
                if($item -> public) $url = true;
            @endphp
                <tr>
                    <td>{{$i+1}}</td>
                    <td><a href="/view/{{$item->id}}">{{$item->name}}</a></td>
                    <td>
                        @if ($url)
                        <a href="/share/{{$item->id}}">Yes</a>
                        @else
                            No
                        @endif
                    </td>
                    <td>
                        <form action="/destroy/{{ $item->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div >
                                <button type="submit"
                                    style="width: 5.5vw;background-color:#dc2626;height:2vw;border-radius:1vw;border:none;color:white">Delete</button>
                            </div>
                        </form>
    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('file-form').submit();"+</a>
          <form id="file-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
@endsection