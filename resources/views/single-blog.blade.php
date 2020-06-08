@extends('layouts/app')





<?php

    $route = back()->getTargetUrl();

?>

@section('content')
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item offset-1">
                            <a href="{{  $route }}" class="mt-2">
                                Back
                            </a>
                            <div class="blog_area">
                                <h1>{{$blog->title}}</h1>
                                <p class="pt-2 text-muted" style="font-size:1.1em;">
                                    <i class="fas fa-user lightgrey pr-1"></i>
                                    By <span class="text-info">Mister {{$blog->user->username}}</span>
                                </p>
                                <hr />
                                <p class="text-dark" style="font-size:1.1em;">
                                    Posted on {{$blog->postDate()}}
                                </p>
                                <hr />
                            </div>
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{$blog->path()}}" alt="" />
                            </div>
                            <hr />
                            <div class="blog_details">
                                <?php
                                   $ps = explode('<br>', $blog->body);
                                ?>
                                @foreach($ps as $p)
                                    <p>&nbsp;&nbsp;{{$p}}</p>
                                @endforeach

                                <div class="blog-info-link">
                                    <div class="mt-5" style="margin-left:-17px;">
                                        <div class="" style="margin-left:0;">
                                            <div class="main mt-3 all-comments pl-0">
                                                @foreach($blog->comments as $comment)
                                                    @include('_comment')
                                                @endforeach

                                            </div>

                                            @auth
                                                @include('_write-comment', ['index' => 0])
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
                </div>
            </div>
        </div>
    </section>
    <div class="pb-5">

    </div>
@endsection
