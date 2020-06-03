@extends('layouts/zim')

@section('content')

<?php // dd($blogs->links())  ?>


<div class="container">
 <div class="row">
     @foreach($blogs as $blog)
   <div class="col-sm-5 col-md-4">
    <div class="card card-user" style="border-radius: 15px;">
        <div class="image" style="min-height:200px; background-color: rgba(244, 243, 239,1);">
            <img src="{{$blog->path()}}" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;" />
        </div>
        <div class="card-body" style="">
            <div class="">
                <a href="{{route('show', $blog->id)}}">
                    <h5 class="title">{{$blog->title}}</h5>
                </a>
            </div>
            <div class="description" style="font-size:.9em;overflow:hidden;max-height:100px;">
               <p class="text-left text-muted" style="font-size:1em">
                   {{$blog->body}}...
                </p>

            </div>
        </div>
        <div class="card-footer" style="margin-top:-80px;">
            <hr>
            <div class="button-container">
                <div class="row" >
                    <div class="col-lg-6  col-md-6 col-6 ml-auto ">
                       <form method="get" action="blog/{{$blog->id}}/edit">
                           <button class="btn btn-outline-primary" style="border-radius: 30px;width:80px;"> Edit </button>
                       </form>
                    </div>
                    <div class="col-lg-6  col-md-6 col-6 mr-auto">
                      <form method="get" action="blog/{{$blog->id}}/delete">
                          @csrf
                          <button class="btn btn-outline-danger" style="border-radius:30px;width:80px;"> Delete </button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
     </div>
   </div>
  @endforeach
      </div>
    <div style="margin-left:40%;">
        {{$blogs->links()}}
    </div>
</div>
@endsection
