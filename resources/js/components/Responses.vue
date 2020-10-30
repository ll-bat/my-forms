






<template>
    <div class="container text-center position-absolute">
        <div class="row justify-content-center" >
            <div class="col-lg-7 col-md-10 col-sm-12 col-12">
                <div class="" :class="{'d-none': !loading}" style="margin-top:30%;">
                    <div class="spinner-border text-warning d-none d-sm-inline-block" style="width:5rem; height: 5rem;border-width: 10px;"></div>
                </div>

                <div v-for = '(res,ind) in responses'>
                     <router-link :to="'/user/docs/responses/'+res.id" tag="p">
                              <div class='card card-user border partial-shadow rounded-10 pointer hoverable' 
                                   :class="{'seen' : res['is_seen']}"
                                   :id = "'hasId' + res.id"
                                   @click = 'clickRes(res)'
                                   @contextmenu="handler($event, res.id)"
                                   >
                                   <div class='d-flex p-2 mx-3 my-3'>
                                       <img src='/icons/user-forms-1.png' height='60' />
                                       <span class='ns-font-family text-left font-weight-bolder mx-3 my-3' style='text-decoration:none !important;'>
                                             New Response {{ind + 1}}
                                        </span>
                                    </div>
                                    <span class='text-muted text-sm position-absolute' 
                                          style='bottom:10px;right:10px;'> {{res['is_seen'] ? 'Seen' : 'Not seen yet'}} </span>
                              </div>
                     </router-link>
                </div>
            </div>
        </div> 
    </div>
</template>

<script>
    export default {

        props : [
            'questions'
        ],
        data(){
            return {
                loading: true,
                responses: []
            }
        },
        methods: {
           getResponse(id){
               
           },

           getLink(){
               alert('getting link')
           },

           clickRes(res){  

               if (res['is_seen']) return 

               res['is_seen'] = 1 

               let id = res.id
               fetch(`responses/${id}`, {
                   method: 'POST',
                   headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   body: JSON.stringify({isSeen: 1})
               }).then(res => res.text())
               .then(res => {})
               .catch(err => {
                   alert('Error occured');
                   console.log(err.response.data)
                })
           },

           handler(ev, id){
               let dom = document 

               setStyle($1(`hasId${id}`),  {
                   opacity: '.1'
               })

               let[x,y] = [ev.pageX, ev.pageY ]
               
               let el = dom.createElement('div')
               el.className = 'position-absolute pointer'
            
               setStyle(el, {
                   left: x + 'px',
                   top:  y + 'px',
                   width: '100px',
               })
                 
               function clickHandler(e){
                   
                   axios['delete'](`responses/delete/${id}`)
                       .then(res => {
                           alert('all-done')
                       })
                       .catch(err => {
                           alert('error')
                           console.log(err);
                       })

                   tout(() => {
                      $1(`hasId${id}`).remove()
                   },400)

                    e.preventDefault()
               }

               for (let a of ['delete']){
                   
                    let d = dom.createElement('div')
                    d.innerText = a 
                    d.className = "text-right hoverable px-4 py-2"
                    
                    setStyle(d, {
                        background : 'white',
                        'box-shadow': '2px 2px 4px lightgrey'
                    })

                    d.addEventListener('mousedown', clickHandler)

                    dom.addEventListener('mousedown', e => {
                        if (!$1(`hasId${id}`)){
                            removeEventListener('mousedown', this)
                        }
                        else {
                            setStyle($1(`hasId${id}`), {
                                opacity: '1'
                            })
                        }
                        
                        d.remove()
                    })

                    el.append(d)
               }

               dom.body.append(el)

               ev.preventDefault()
           },

           handleData(data){
               this.responses = data.map(d => {
                           d['data'] = JSON.parse(d['data'])
                           return d
                })

                this.loading = false
           },

           getJson(data){
               return JSON.stringify(data)
           }
        },
        created(){
             
        },
        mounted(){
            fetch('responses/get-all')
                   .then(res => res.json())
                   .then(res => {
                       this.handleData(res)
                   })
                   .catch(err => [
                       this.loading = false
                   ])
        }
    }
</script>

<style scoped>
    .hoverable:hover {
        box-shadow:none !important;
        background-color:rgba(255,255,255,.5) !important;
    }

    .seen {
        background-color :rgba(255, 235, 235, 0.5) !important;
    }


</style>