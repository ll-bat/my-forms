@extends('layouts/zim')






@section('header')
    <style>
        .light-grey {
            transition: all .4s ease;
        }
        .light-grey:hover {
             background-color: rgba(220, 240, 132, .21);
             opacity: .7;
        }
    </style>
@endsection



@section('content')


     <div class='container-fluid'>
        <div class='row justify-content-center'>
             <div class='col-lg-8 col-md-10 col-sm-12 col-12'>
                 <div class='row'>
                       @include('user._form', ['url' => 'new', 'icon' => '/icons/plus.png'])
                       @foreach ($forms as $form)
                          @include('user._form', ['url' => $form->id, 'icon' => '/icons/docs.png'])
                       @endforeach
                  </div>
             </div>
        </div>
     </div>

     

     <script type='application/javascript'>
          function optionsClick(ev){
               ev.preventDefault()
          }

          function showToast(){  
               $("#toast").removeClass('d-none')
               tout(() => {
                   st($1('toast'), 'o:0')
                   tout(() => {
                        $('#toast').addClass('d-none')
                        st($1('toast'), 'o:1')
                   }, 500)
               },2000)
          }
          
          @if (Session()->has('message')) 
             tout(() => {  
                 showToast()
             },100)
          @endif
     </script>
    
@endsection

