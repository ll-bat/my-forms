









<div class='col-lg-4 col-md-6 col-sm-6 col-10'>
    <a href='docs/{{$url}}'>
      <div class='card card-user border-0 partial-shadow w-100 pointer light-grey' style='border-radius: 15px;box-shadow:2px 2px 4px lightgrey;'>
            @if ($url != 'new')
                <div class='position-absolute' style='right:10px;top:10px;'>
                     <button type="button" 
                             class="mybtn border-0 bg-transparent text-right"
                             onclick='optionsClick(event)' 
                             data-toggle="collapse" 
                             data-target="#actions{{$url}}">
                      <i class='fa fa-circle' style='font-size: .5rem;color:grey'></i>
                      <i class='fa fa-circle' style='font-size: .5rem;color:grey'></i>
                      <i class='fa fa-circle' style='font-size: .5rem;color:grey'></i>
                      </button>
                     <div id="actions{{$url}}" class="hoverable collapse thin-border full-shadow position-absolute" style='right: 0px;'>
                         <form method='post' action='docs/{{$url}}/delete'>
                              @csrf 
                              @method('delete')
                              <button class='btn btn-default delete-button px-5 my-0'
                              > Delete </button>
                          </form>
                     </div>
               </div>
           @endif
           <div class='card-body text-center'>
               <img class='my-5' src='{{$icon}}' width='50%' />
           </div>
      </div>
     </a>
</div>