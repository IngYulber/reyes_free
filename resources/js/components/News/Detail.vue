<template>
  <div>
    {{ news }}
  </div>
</template>

<script>
export default {
    name:"detail",
    props:{
        news:{
            type:Object,
            required:true
        }
    },
    data(){
        return {

        }
    },

    methods:{

    }
}
</script>

<style>

</style>