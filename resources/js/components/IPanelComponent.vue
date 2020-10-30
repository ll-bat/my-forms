<template>
          
          

    <div class='w-100'>
        <div class='my-dropdown position-absolute ns-position-absolute' 
             :class="{'ns-is-up pt-2 pb-2 ns-rounded-7 ns-my-light-border ns-my-shadow' : expanded}"
             style='width:100%;max-width:230px; margin-left:-10px;'>
            <div v-for="button in buttons">
                 <div class='my-dropdown-item'
                      :class="{'d-none' : items[button.link], 'ns-changed-hover' : !expanded}"
                      @click="choose(button.link)"
                 >
                   <template v-if = 'button.icon'>
                      <img class="ns-icon" :src='button.icon' style='margin-top:-2px;' />
                   </template>
                   <template v-else>
                       <i :class='button.class' class='position-relative'></i>
                   </template>
                   <span class='pl-1'> {{button.name}} </span>
                      
                 </div>
                 <div v-if = 'button.hasHead && expanded' class='mt-2 mb-2 ns-has-head'></div>
            </div>
        </div>
     </div>
      
      
</template>

<script>
    export default {
        props: [
          'type'
        ],
        data(){
            return {
                selected: '',
                expanded: false,
                items : {
                    'paragraph': true,
                    'radio': true,
                    'checkbox': true,
                    'dropdown': true,
                    'upload' : true
                 },
                buttons: {}
            }
        },
        methods: {
            reverse(status){
               let keys = Object.keys(this.items)
               keys.forEach((key) => {
                   this.items[key] = status
               })
            },
            expandPanel(){
                this.reverse(false)
                this.expanded = true
            },
            collapsePanel(){
                this.reverse(true)
                this.expanded = false
                this.adScreen()
            },
            adScreen(){
                setTimeout(()=>{
                    adjustScreen()
                },20)
            },
            choose(item){
               if (!this.expanded){
                   this.expandPanel()
               }
               else {
                //    this.$parent.$emit('changing', this.selected)
                   this.$emit('changing', {from: this.selected, to : item})
                   this.selected = item
                   this.collapsePanel()
                   this.items[this.selected] = false
               }
            }
        },
        mounted() {
            this.selected = this.type
            this.items[this.selected] = false

            this.buttons = [
                {link:'paragraph', name :  'Paragraph', icon: '/icons/paragraph.png', hasHead: true},
                {link:'radio', name :  'Multiple choice', icon: '/icons/radio.png'},
                {link:'checkbox', name :  'Checkboxes', icon: '/icons/checkbox.png'},
                {link:'dropdown', name :  'Dropdown', icon: '/icons/dropdown.png', hasHead:true},
                {link:'upload', name :  'Image upload', icon: '/icons/upload.png'},
            ]
        },
        created(){
            this.adScreen()
        }
        
    }
</script>
<style>
   .my-dropdown{
       border:1px solid #dadddc;
       height:auto;
       border-radius:3px;
       cursor:pointer;
       color: #535554;
       background-color:white;
       z-index:1;
   }
   .ns-rounded-7{
       border-radius: 7px;
   }
   .ns-my-shadow{
       box-shadow: 1px 1px 1px rgba(240, 234, 218, .7), -1px -1px 2px rgba(240, 234, 218, .7) ;
   }
   .ns-my-light-border{
       border:1px solid #e9eeec;
   }
   @keyframes ns-opacity{
       from { opacity: .1; }
       to {}
   }
   .my-dropdown-item{
       animation-name: ns-opacity;
       animation-duration: .4s;
       text-align:left;
       padding-top:10px;
       padding-bottom:10px;
       padding-left:15px;
       font-size:.88em;
       background-color:white;
       transition: all .4s ease-in;
       z-index:2;
   }
   .my-dropdown-item:hover{
       background-color: rgba(181, 219, 216, 0.2);
   }
   .ns-changed-hover:hover {
       background-color: rgba(181, 219, 216, 0.12);
   }
   .ns-has-head{
       border-bottom:1px solid lightgrey;
   }
   .ns-is-up{
       margin-top:-50px;
   }
</style>