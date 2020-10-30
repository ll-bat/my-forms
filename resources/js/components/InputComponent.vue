






<template>
    
    <div class="card text-left rounded-10" @click='emitClickEvent()'
      :class="{'shadow-none leftBorder': nselected, 'colorLeftBorder ns-border-bottom': !nselected}" 
      style='border-left-width:5px;'
    >
        <div class='row'>
               <div class="col-md-8 col-sm-8 col-12 m-auto">
                     <form class="ml-3 mr-3 mr-sm-0 mt-3" >
                          <head-component 
                             :object='object' 
                             @saving='showSpinner()' 
                             @saved='hideSpinner()'
                     ></head-component>
                     </form>
                </div>
                <div class="col-md-4 col-sm-4" style="">
                    <div class="mx-4 mx-sm-0 mt-sm-4 mt-3 mb-sm-0 mb-4" style="">
                           <slot name='ipanel' v-bind:comp='this'></slot>
                    </div>
                </div>
         </div>

         <slot name='image' v-bind:comp='this'></slot>

         <div class='pb-2 mt-0' style='margin-top:-5px;'> 
             <template v-if = "object.type == 'paragraph'">
                  <span class='ml-4 pb-5 text-muted text-sm'> text answer here </span>
             </template>
             <template v-else>
                  <div class='ml-4 text-muted text-sm' style='margin-bottom:-15px;'> 
                       <button class='btn btn-secondary bg-white text-primary border disabled'>
                            <i class='fa fa-upload'></i> Image upload 
                        </button>    
                   </div>
             </template>
         </div>

         <div class="">
            <slot name='full-panel' v-bind:comp='this'></slot>  
         </div>

    </div>

</template>

<script>
export default {
        props: [
            'object','nselected','index'
        ],
        data(){
            return {
                ys: false,
                saving: false,
                imageLoading: [false],
            }
        },
        computed: {
            
        },

        watch :{
            
        },
        
        methods: {
            changeObjectType(type){
                alert(type)
            },
            emitClickEvent(){
                this.$emit('choose')
            },
            showSpinner(){
                this.saving = true
            },
            hideSpinner(){
                this.saving = false
            }
        },
        created() {
               setTimeout(()=> {
                    $(window).trigger("autoresize")
                }, 200)

                this.$on('changing', (name) => {
                    if (this.object.type != name){
                        this.changeObjectType(name)
                    }
                })
        }
    }
</script>
<style>
   .ns-input{
       width: 100%;
       border-bottom:1px solid lightgrey;
   }
</style>