@extends('layouts.mail')

@section('content')

<div class="container-fluid">
    hello
    <span class="alert alert-info text-start">
        <h3>{{$subject}}</h3> <br/>

        <p> {{$name}} with email address- {{$email}} sent a message saying - <br/></p>
        
        <br/>
        <p style="color:black;"> {{ucwords($user_message)}} </p> 
    </span>
</div>

@endsection