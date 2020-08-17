@extends('layouts/app')

@section('css')



 <style>

    .ns-border-grey{
        border: 1px solid rgba(0,0,0,.15);
     }

    .ns-input-font {
        font-family: 'Google Sans',Roboto,Arial,sans-serif;
        font-size: 14px;
        font-weight:300;
        letter-spacing: .1px;
        text-transform: capitalize;
    }

    .ns-thin-font {
        color: rgba(20, 67, 92 , 1) !important;
    }

    .ns-submit-button {
      background-color:rgb(102, 102, 255);
    }

     .ns-border-top {
         border-top:8px inset rgb(102, 102, 255);
         /*border-top: 8px solid rgba(0, 191, 255, 1);*/
     }
     .ns-dark-color {
         color: rgba(20, 67, 92 , 1);
     }

     .ns-thin-weight {
         font-weight: 300 !important;
     }

     .ns-middle-weight {
         font-weight: 400;
     }

     .ns-dark-weight {
         font-weight: 500;
     }

 </style>

@endsection

@section('content')


  <div class='container mb-5 mt-1'>
      <div class='text-left'>
         <form method='post' action='docs/submit' enctype="multipart/form-data">
            @csrf
            <div class='row justify-content-center'>
                <div class='col-xl-7 col-lg-8 col-md-9 col-sm-12 col-xs-12  col-12'>
                    @if (count($errors) > 0)
                       <p class="alert alert-warning">
                           <b> Please, fill up all necessary fields </b>
                       </p>
                    @endif
                    @foreach($ques as $ind => $q)
                       <div class='card my-3 p-2 ns-border-grey ns-font-family ns-dark-color @if ($ind == 0) ns-border-top @endif shadow-none' style='border-radius:7px;'>
                          <div class="card-title pl-3 pt-3">
                                <p class="d-inline"> {{$q->title}}  </p>
                                @if ($q->required) <span class="text-danger text-lg pl-2"> * </span> @endif
                          </div>
                          @if ($q->hasImage())
                            <div class='card-image p-2'>
                                 <img src="{{$q->getImage()}}"/>
                             </div>
                          @endif
                             <div @if ($q->required && $q->type == 'checkbox') class='' @endif
                                   @if (!$q->hasImage()) style='margin-top:-20px;' @endif>
                                <div class="mt-1">
                                   @include("user/docs/_$q->type", compact('q', 'ind'))
                                </div>
                             </div>
                             @error($q->name)
                               <p class='ml-2 text-danger text-sm'>
                                   @if ($q->type == 'upload') * Please upload an image
                                   @else * This field is required
                                   @endif
                               </p>
                             @enderror

                             @if ($q->required)
                                <span class="ns-color ns-middle-weight text-right text-sm pr-2">
                                    required
                                </span>
                             @endif
                       </div>
                    @endforeach

                    <input type='submit'
                           class='btn btn-primary ns-submit-button border-0 rounded ns-input-font'
                           onclick='validateForm()'
                     />

               </div>
            </div>
         </form>
      </div>
  </div>
  <br /> <br /> <br />
  <script type='application/javascript'>
        dom.body.style.backgroundColor = 'rgba(0, 255, 128, .036)'

        function uploadImage(ev, ind){
             ev.preventDefault()
             $(`#imageupload${ind}`).click()
        }

        function clearUploadedImage(ind){
             $1(`docimage${ind}`).src = ''
             $1(`imageupload${ind}`).value = ''
        }

        function validateForm(){
            let all = $$('checkbox_required')
            console.log(all)
        }

        $(function(){
            $('body').on('focus', 'textarea', function(){
                $(this).next().addClass('active');
            });

            $('body').on('focusout', 'textarea', function(){
                $(this).next().removeClass('active');
            });
        });

  </script>
@endsection

