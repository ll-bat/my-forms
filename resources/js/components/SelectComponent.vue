







<template>
    <div class="card text-left ns-box-shadow" @click='emitClickEvent()'
         :class="{'shadow-none leftBorder': nselected, 'colorLeftBorder ns-border-bottom': !nselected}" 
         style='border-left-width:5px;'
    >
         <div class='row'>
             <div class="col-md-8">
                  <form class="ml-3 mt-3" >
                       <head-component 
                          :object='object' 
                          @saving='showSpinner()' 
                          @saved='hideSpinner()'
                  ></head-component>
                  </form>
             </div>
             <div class="col-md-3" style="">
                 <div class="m-4 ml-0 text-right" style="">
                        <slot name='ipanel' v-bind:comp='this'></slot>
                 </div>
             </div>
         </div>

          <slot name='image' v-bind:comp='this'></slot>

          <div class='ml-4' style=''>
                <div v-for='(value,index) in object.values'>
                    <div class='d-flex'>
                        <template v-if="object.type !='dropdown'">
                            <div :class="{'ns-circle' : object.type == 'radio', 'ns-rect' : object.type == 'checkbox'}" 
                                 class='mt-2 mr-2 mb-3'
                                 style='width:23px;'>
                            </div>
                        </template>
                        <template v-else>
                            <span class='mt-2 mr-2 mb-3'>{{index+1}}.</span>
                        </template>
                         <div style="width:100%">
                            <body-component  
                               :object='value' 
                               placeholder='Add option'
                               @saving='showSpinner()'
                               @saved='hideSpinner()' 
                            ></body-component>
                         </div>
                         <button class='text-center mr-2 bg-white' 
                                 @click='removeOption(value.id)' 
                                 style='width:10%;border:none;outline:0;'>
                            <i class='nc-icon nc-simple-remove option-remove h-ntest'></i>
                         </button>
                    </div>
                </div>
                <div class='d-flex mt-2'>
                    <template v-if="object.type != 'dropdown'">
                         <div :class="{'ns-circle': object.type == 'radio', 'ns-rect' : object.type == 'checkbox' }">
                        </div>
                    </template>
                    <template v-else>
                        <span class='mr-1'>{{object.values.length + 1}}.</span>
                    </template>
                       <span class='text-sm text-muted ml-2 h-border' @click="editOption()">
                           Add another
                        </span>                       
                </div>
           </div>
           
         <div class="">

            <slot name='full-panel' v-bind:comp='this'></slot>
                
        </div>
    </div>
</template>

<script>
    export default {
        name: "SelectComponent",
        props: [
            'object','nselected','index'
        ],
        data(){
            return {
                saving: false,
                removeDisabled: false,
                imageLoading: [false],
            }
        },
        computed: {
            
        },
        watch: {
            
        },
        methods: {
            
            editOption(){
                 Forms.submit('post', 'docs/create-rels', { id: this.object.id})
                      .then((res) => {
                          this.object.values.push({id: res, value: ''})
                      })
                      .catch((err) =>{
                          alert('error')
                          console.log(err)
                      })
            },
            removeOption(id){
                if (this.removeDisabled) return;
                this.removeDisabled = true
                Forms.submit('delete', `docs/remove-rels/${id}`, {})
                     .then((res) => {
                         this.object.values = this.object.values
                                .filter((res) => res.id !== id)
                         this.removeDisabled = false
                     })
                     .catch((err) =>{
                         alert('Unfortunately, error occured')
                         console.log(err)
                     })
            },
            emitClickEvent(){
                this.$emit('choose')
            },
            showSpinner(){
                this.saving = true
            },
            hideSpinner(){
                this.saving = false
            },
        },
        created() {
               setTimeout(()=> {
                    $(window).trigger("autoresize")
                }, 200)
        },
      
        
    }
</script>

<style scoped>
   @keyframes  testanim {
       from {opacity: .8; transform: rotate(-90deg); padding:1px; background-color:lightblue; border-radius:50%;}
       to {}
   }
   .testit{
       animation-name:testanim;
       animation-duration: .5s;
   }
    .ns-circle{
          border:2px solid lightgrey;
          width:20px;
          height:20px;
          border-radius:50%;
    }
    .ns-rect{
          border:2px solid lightgrey;
          width:20px;
          height:20px;
          border-radius:2px;
    }
   

    .h-border{
        border-bottom:1px solid transparent;
    }
    .h-border:hover{
        border-bottom:1px dotted grey;
        cursor:pointer;
    }
    .option-remove{
        font-size:1.2em;font-weight:bold;color:grey;
    }
    .h-ntest{
        padding:12px;
        border-radius:45%;
        cursor: pointer;
        transition: all .3s;
        opacity:.6;
    }
    .h-ntest:hover{
        background-color:whitesmoke;
        border-radius:50%;
        color:#602b92;
        opacity:1;
    }
</style>