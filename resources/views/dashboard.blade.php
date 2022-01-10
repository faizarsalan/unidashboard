@extends('layouts.sidebar')
@section('content')

<div class="rightContainer" style=
                            "width:45vw;
                            height:20vw;
                            border: 1vw solid #FFFFFF; 
                            border-radius:0.7vw;
                            color:black;
                            box-shadow: 0.5vw 0.5vw 1vw 0.8vw #C0C0C0;">

<div class="header" style="display: flex;align-items:center">
    <h2 style="margin-left: 2vw">Today's Agenda</h2>
    <a href="/agenda/{{Auth::user()->id}}" style="color:blue; margin-top:1vw;margin-left:1vw;">See all</a>
</div>


@php
    $count = 0;
@endphp
 <div class="agenda_container" style="margin-left: 4vw;margin-top:1vw">
     <table style="font-size:1.3vw ">
         @forelse ($agenda_details as $item)
         @php
            $count++;
         @endphp
            @if ($count <= 5)
            <tr>
                <td>                            
                    @php
                        $time = $item->time;
                        echo number_format((float)$time, 2, '.', '');
                    @endphp
                </td>
                <td style="padding-left: 3vw">{{ $item->agenda }}</td>
            @endif
         @empty
             
             No Agendas For Today.
             <img src="/storage/calendar.png" alt="" width="88%">

         @endforelse
     </table>
 </div>
@endsection