<template>
    <div class="container">
          <router-link to="/vue"><a>Back to the root</a></router-link>
    </div>
</template>

<script>
    export default {

        props :{
            title : {
                default: '123'
            }
        },
        created(){
            this.$on('evnt', function(){
                alert('testing')
            })
        }
    }
</script>
