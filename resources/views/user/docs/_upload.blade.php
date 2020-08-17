





<div class='card-body ml-0'>
       <div class='text-muted' style='margin-bottom:-8px;'>
             <button class='btn btn-primary bg-white text-primary border' onclick='uploadImage(event,{{$ind}})'>
                  <i class='fa fa-upload'></i> Image upload
             </button>
             <input type='file'
                    id='imageupload{{$ind}}'
                    name="{{$q->name}}"
                    style='display:none'
                    onchange="imageLoad(event,'docimage{{$ind}}')"
                     />

             <div class='uploaded_image'>
                <img src='' class='mt-2 d-block' id='docimage{{$ind}}' style='max-width:400px;max-height:400px;'  />
                <a class='btn btn-secondary bg-lightgrey text-white rounded-50'
                   onclick = 'clearUploadedImage({{$ind}})'
                > clear </a>
             </div>
       </div>
</div>
