






<template>
    <div class="container text-center position-absolute">
        <div class="row justify-content-center" >
            <div class="col-lg-7 col-md-10 col-sm-12 col-12">
                <div class="" :class="{'d-none': !loading}" style="margin-top:30%;">
                    <div class="spinner-border text-warning d-none d-sm-inline-block" style="width:5rem; height: 5rem;border-width: 10px;"></div>
                </div>

                <div v-for = '(question,ind) in allQuestions'>
                     <div class='card card-user border-0 rounded-10 partial-shadow text-left p-4'
                          v-if = 'hasAnswer(response[question.name])'
                     >
                          <p class='text-primary font-weight-bolder'> {{question.title}}  </p>

                          <div v-if = 'hasImage(question)' class='my-3'>
                               <img :src="getImageName(question.image)" width='100%' />
                          </div>

                          <div>
                                <template v-if = "typeof response[question.name] == 'object'">
                                     <div v-for = 'answer in response[question.name]' class='d-flex mr-1 my-2'>
                                          <img src='/icons/check.png' class='mt-1' width="20" height='20' /> 
                                          <span class='ml-3 mb-2'> {{answer}} </span>
                                     </div>
                                </template>
                                <template v-else>
                                      <div v-if = "['radio', 'dropdown'].includes(question.type)" class='d-flex'>
                                            <img  src = '/icons/check.png' width='20' height="20" class='mt-1' />
                                            <span class='ml-3 mb-1'> {{response[question.name]}} </span>
                                      </div> 
                                      <div v-else>
                                            <span v-if = "question.type == 'paragraph'" class='mx-0 my-2'>
                                                  {{ response[question.name] }}
                                            </span>

                                            <span v-else></span>
                                      </div>
                                </template>
                           </div>
                     </div>
                     
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
                response: null,
                allQuestions: []
            }
        },
        methods : {
            hasAnswer(question){
                if (question != undefined && question.length > 0)
                      return true 
                return false
            },

            hasImage(question){
                return question.image != 'null'
            },

            getImageName(name){
                return '/storage/' + name
            }
        },
        created(){
            let id = this.$route.params.id

            fetch(`get/${id}`)
                   .then(res => res.json())
                   .then(res => {
                       this.response = JSON.parse(res['data'])
                       this.allQuestions = JSON.parse(this.questions)
                       this.loading = false
                   })
                   .catch(err => [
                       this.loading = false
                   ])
        }
    }
</script>

<style scoped>
      .checkbox {
          width: 20px;
          height:20px;
          border-radius: 4px;
          margin-top:4px;
          border: 2px solid grey;
      }

      .radio {
          width: 20px;
          height:20px;
          border-radius: 50%;
          margin-top:2px;
          border: 2px solid grey;
      }
</style> 