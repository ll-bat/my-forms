@extends('layouts/zim')








@section('content')
    <form method="post" action="./create" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="container">
                <div class="form-group">
                    <h5 form="title">Title</h5>
                    <input type="text" class="form-control"
                           style="font-size: 1em;"
                           placeholder="Add title"
                           name="title"
                           value="{{old('title')}}"
                    />
                    @error("title")
                    <p class="text text-danger text-sm">
                        {{$message}}
                    </p>
                    @enderror
                </div>

                <div class="form-group">
                    <h5 form="excerpt">Excerpt</h5>
                    <input type="text"
                           class="form-control" style="font-size:1em;"
                           placeholder="Enter excerpt"
                           name="excerpt"
                           value="{{old('excerpt')}}"
                    />
                    @error("excerpt")
                    <p class="text text-danger text-sm">
                        {{$message}}
                    </p>
                    @enderror
                </div>

                <div class="form-group">
                    <h5 for="excerpt">Body</h5>
                    <textarea
                        class="form-control"
                        style=""
                        placeholder="Here goes body..."
                        rows="6"
                        name="body"
                    >{{old('body')}}</textarea>

                    @error("body")
                    <p class="text text-danger text-sm">
                        {{$message}}
                    </p>
                    @enderror
                </div>

                <input type="file" value="Upload"
                       name="image"
                /><br/>

                @error("image")
                <p class="text text-danger text-sm">
                    {{$message}}
                </p>
                @enderror

                <button class="btn btn-info mt-5" style="border-radius: 20px;">Create</button>

            </div>
        </div>
    </form>
@endsection
