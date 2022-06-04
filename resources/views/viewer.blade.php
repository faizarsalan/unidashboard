@extends('layouts.sidebar')
@section('content')
<div class="container">
    {{URL::asset('/storage/files/'.$file->name )}}
    <embed src="{{URL::asset('/storage/files/'.$file->name )}}" type="application/pdf" width="1000px" height="1000px" style="margin: auto;">
</div>

@endsection