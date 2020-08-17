@extends('layouts.zim')



@section('header')

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <style>
      .rounded-10{
          border-radius:9px;
      }
      .rounded-5{
          border-radius:5px;
      }
      .rounded-7{
          border-radius:7px;
      }
      .p60{
          width:60%;
      }
      .p80{
          width:80%;
      }
      .p90{
          width:90%;
      }
      .p100{
          width:100%;
      }
      .autoresize {
          display: block;
          overflow: hidden;
          resize: none;
      }
      .text-sm{
          font-size:.8em;
      }
      #actions-panel{
          transitions: all 20s ease-in-out;
      }
      .ns-icon{
          width:17x;
          height:17px;
      }
      .colorLeftBorder{
        border-left:5px solid blueviolet;
      }
      .leftBorder{
        border-left-color: rgba(218, 216, 216, .5);
      }
      .ns-border-bottom{
        border-bottom: 2px inset rgb(163, 164, 223);
      }
      .h-hover-grey{
        padding:7px;
        transition: all .5s ease-in;
      }
      .h-hover-grey:hover{
         background-color: rgba(0,0,0,.1);
         border-radius:40%;
         opacity: .8;
      }
      .ns-hover-b{
          color:black;
      }
      .ns-hover-b:hover{
          color:grey;
      }
      .ns-image-remove-icon {
        cursor:pointer;
        background-color:rgb(243, 243, 243);
        box-shadow: 0 1px 0px #b5b8b6;
        color: #5c5959;
        font-size:1.1em;
        border-radius:50%;
        padding:12px;
        transition: all .4s ease;
    }
    .ns-image-remove-icon:hover {
        background-color: #e1e1e4;
        color:rgb(78, 76, 76);
    }
    </style>

@endsection


@section('content')
  <div class="container text-center position-absolute">
      <div class="row">
          <div class="col-lg-7 col-md-10 col-sm-10 col-9 offset-lg-2 offset-sm-0 offset-0">
             <div v-for="(component,index) in components" >
                <component @choose='changeShadow(index)'
                   :is='component.name'
                   :object = 'component'
                   :nselected='index != ns'
                   :index='index'
                   >
                      <template #ipanel ="{comp}">
                          <ipanel-component
                                :type='component.type'
                                 @changing='changeType(index, $event, comp)'>
                          </ipanel-component>
                       </template>

                       <template #image = "{comp}">
                             <div class='card-image'>
                                  <template v-if = 'component.hasImage'>
                                       <span class='m-3 position-absolute' @click='removeImage(comp)'>
                                           <i class='nc-icon nc-simple-remove ns-image-remove-icon'></i>
                                         </span>
                                       <img :src="component.image" class='p-4' />
                                  </template>
                                  <div v-if = 'comp.imageLoading[0]' class='ml-4 mb-5 p-3 pb-5'>
                                        <div class='m-3 position-absolute' @click='removeImage(comp)'>
                                             <div class="spinner-border text-primary"
                                                  style='width:50px;height:50px;'
                                             ></div>
                                        </div>
                                  </div>
                              </div>

                               <input type='file' class='d-none' :id="'editimage'+index"
                                      @change='editImage($event, comp)' />
                       </template>

                       <template #full-panel = "{comp}">
                          <div class='mt-4' style='width:94%;margin:auto;'>
                               <hr />
                           </div>

                           <div class="spinner-border text-info mx-1 my-1 mr-3"  v-if="comp.saving"
                                style="height:20px;width:20px;float:right;">
                            </div>
                           <div class='mx-1 my-1 mr-3 testit' v-else
                                style='height:20px; width:20px; float:right;'>
                               <i class='nc-icon nc-check-2 text-warning font-weight-bolder' ></i>
                            </div>

                            <div class='mr-3' style='float:right;margin-top:7px;'>
                                <label class="switch">
                                   <input type="checkbox" :checked='component.required' @click="toggleRequire(component.id, comp)">
                                   <span class="slider round"></span>
                                </label>
                            </div>

                            <div class='mr-3 text-sm mt-1 text-muted pl-2 float-right'
                                 style='border-left:1px solid lightgrey'>
                                 <span class='text-muted' style="font-family:'Roboto';"> Required </span>
                            </div>

                            <div class='mr-3 float-right' @click='clickImage(index)'>
                                 <i class='nc-icon nc-image text-primary font-weight-bold h-hover-grey ns-hover-b' style='cursor:pointer;'></i>
                            </div>

                            <div class='mb-1 mr-2 float-right'
                                 style='margin-top:-2px;'>
                                 <delete-component slot='delete' @delete='deleteComponent(component.id)'></delete-component>
                            </div>

                      </template>

                  </component>
                <!--  -->
             </div>
          </div>
          <div class="col-1 text-left" id="actions-panel" style="min-width:90px;">
              <panel-component></panel-component>
          </div>

      </div>

      <div style='margin-bottom:100px;'></div>
  </div>
    <script type="application/javascript">
        $(window).on('scroll', function(){
            let t = $(window).scrollTop();
              setTimeout(() => {
                  $1('actions-panel').style.marginTop = Math.floor(t).toString() + 'px'
              }, 300)
        })
    </script>

@endsection
