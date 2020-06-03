@extends('layouts/zim')


@section('content')
<div class="container">
    <div class="card no-border shadow" style="border-radius: 15px;">
        <div class="card-body" style="min-height: 300px;">
            <div clsas="p-5" style="padding:20px;">
                <div class="row">
                    @foreach (range(1,40) as $key)
                    <a  href="/album/{{$key}}/photos"
                        class="col-md-2 col-sm-3">
                        <div class="card no-border"
                             style="border:0; border-radius:10px;cursor:pointer;">
                            <img  class="no-border"
                                  src = '{{getTestFolder()}}' />
                            <div class="card-footer p-0 text-center"
                                 style="font-family: 'Comic Sans MS'">
                                <p>My photos</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
