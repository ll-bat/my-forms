@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
{{--       <div style="height:100%">--}}
        <div class="col-md-4 mt-115">
{{--            <div class="card">--}}
{{--                <div class="card-header">Dashboard</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    You are logged in!--}}
{{--                </div>--}}
{{--            </div>--}}
            <a href="/login" class="btn btn-outline-danger p-2 radius-40" style="width:100%; font-size:1.2em;font-family: 'Yu Gothic'" > Login </a>
            <a href="/register" class="btn btn-outline-primary mt-3 p-2 radius-40" style="width:100%; font-size: 1.2em;font-family: 'Yu Gothic'"> Register</a>

        </div>
    </div>
{{--    </div>--}}
</div>
@endsection
