
@extends('layouts.app')

@section('content')
<div class='w-100'>
    <div class='border m-auto mx-2 mt-2 px-5 pt-5 pb-4 box-shadow' style='width: 500px; background: #fffff9'>
        <img src='/icons/form-submitted.png' width='50px' />
        <span class='ml-2' style='font-size: 1.2rem;'> Your response has been recorded</span>
        <div class='mt-3 text-center'>
            <a href='{{$form_url}}' class='btn btn-primary' style='color: #f7fafa'> refill the form </a> 
            <a href='{{$site_url}}' class='btn btn-warning' style='color: #f7fafa'> home page </a>
        </div>
    </div>    
</div>
@endsection