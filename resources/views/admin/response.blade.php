@extends('layouts/zim')






@section('header')
    
@endsection

@section('toolbar')
   <div class='position-absolute ml-lg-0 ml-5' style='top:-30px;'>
       <a class='btn back-button mt-5 py-1 px-3' style='border-width: 1px !important;'
          href='' @click='getLink($event)'> Back 
       </a>  
   </div>
@endsection

@section('content')
    <div class='container mb-5'>
          <router-view questions="{{ $questions }}"></router-view>
    </div>
@endsection 