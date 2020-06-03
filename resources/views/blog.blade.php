@extends('layouts/app')






@section('css')
    <link rel="stylesheet" href="css/style.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('content')


    @include('_header', ['name' => 'blog'])

    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                   @foreach($blogs as $index => $blog)
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{$blog->path()}}" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3>{{$blog->getDay()}}</h3>
                                    <p>{{$blog->getMonth()}}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="blog/{{$blog->id}}">
                                    <h2>{{$blog->excerpt}}</h2>
                                </a>
                                <p style="max-height: 300px;overflow: hidden;">{{$blog->body}}....</p>
                                <div class="blog-info-link">
                                    <p class="cursor grey" onclick="showComments({{$index}})"><i class="fa fa-comments" style="font-size:.9em;"></i>
                                            {{count($blog->comments)}} comments
                                    </p>
                                    <div class="comm" style="margin-top:-10px;">
                                      <div class="comments" style="display:none;">
                                          <div class="main mt-3 all-comments">
                                              @foreach($blog->comments as $comment)
                                                  @include('_comment')
                                              @endforeach
                                          </div>

                                          @auth
                                              @include('_write-comment')
                                          @endauth
                                          @guest()
                                              @if (count($blog->comments) == 0)

                                                  <div class="p-3">

                                                      <p class="text-center font-weight-bolder text-secondary">No comments to show here</p>

                                                  </div>

                                              @endif
                                          @endguest
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                   @endforeach
                    <div class="" style="margin-left:50%">
                        {{$blogs->links()}}
                    </div>
                      @section('script')

                      @endsection
                </div>
            </div>
        </div>
    </section>
@endsection
