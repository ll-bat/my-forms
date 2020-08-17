<template>
    <div class="container">
       
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
