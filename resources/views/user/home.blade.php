@extends('layouts/zim')

@section('content')





    <form method="post" action="/logout">
        @csrf
        <p class="pl-2">You are signed in as <span class="text-info">{{Auth::user()->username}}</span></p>
        <button class="btn btn-primary m-4">Sign out</button>
    </form>
    <example-component title="Here is something you don't know"></example-component>
@endsection
