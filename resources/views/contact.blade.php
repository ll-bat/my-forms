@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="css/style.css" />
@endsection

@section('content')
<main>
    <div class="slider-area2">
        <div class="slider-height2 hero-overly2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">


                        <div class="hero-cap hero-cap2 text-center">
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <h4> Get in touch</h4>
        <div class="row">
            <div class="col-xl-8">
                  <form method="POST">
                       <div class="form-group">
                           <label for="body"></label>
                           <textarea class="form-control"
                                     rows="7"
                                     placeholder="Enter message"
                                     style="font-size:.9em;"
                           ></textarea>
                       </div>

                      <div class="row">
                          <div class="col mt-10">
                              <input type="text"
                                     class="form-control"
                                     id="name" style="font-size: .9em"
                                     placeholder="Enter name" name="name">
                          </div>
                          <div class="col mt-10">
                              <input type="email"
                                     class="form-control" style="font-size: .9em"
                                     placeholder="Email" name="email">
                          </div>
                      </div>

                      <div class="form-group mt-10">
                          <label for="subject"></label>
                          <input type="text"
                                 class="form-control"
                                 placeholder="Subject"
                                 style="font-size:.9em">
                      </div>

                      <input type="submit" class="boxed-btn text-dark mt-10" />
                  </form>
            </div>
            <div class="col-xl-1"></div>
            <div class="col-xl-3 mt-5">
                <div class="container">
                    <div class="text-left">
                     <div class="">
                        <div class="mt-10">
                            <i class="fas fa-home" style="font-size:1.5em;"> </i>
                            <span class="pl-2"> Tbilisi, Georgia </span> <br/>
                        </div>
                        <div class="mt-sm-5 mt-35">
                            <i class="fas fa-phone" style="font-size:1.5em;"> </i>
                            <span class="pl-2"> +1(234) 995 12 </span> <br/>
                        </div>
                        <div class="mt-sm-5 mt-35 mb-5">
                            <i class="fas fa-envelope" style="font-size:1.5em;"> </i>
                            <span class="pl-2"> my@example.com </span> <br/>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />
    <br />
</main>
@endsection
