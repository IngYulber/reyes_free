<template>
  <div>
    <div class="bg-dark">
      <div class="container">
        <div class="d-lg-flex align-items-center justify-content-between py-4">
          <div class="d-flex align-items-center">
            <span class="badge badge-dark mr-3">Flash news</span>
            <p class="mb-0">
              Lorem Ipsum has been the industry's standard dummy text ever since
              the 1500s.
            </p>
          </div>
          <div class="d-flex">
            <span class="mr-3 text-light">Jueves, 10 de enero del 2023</span>
          </div>
        </div>
      </div>
    </div>
    <div class="content-wrapper pt-5">
      <div class="container">
        <RecenterNews class="mb-5" />
        <AllNews class="mb-5" />
      </div>
    </div>
  </div>
</template>

<script>
import RecenterNews from "./RecenterNews.vue";
import AllNews from "./AllNews.vue";
export default {
  components: {
    RecenterNews,
    AllNews,
  },

  data(){
    return {
    }
  },
  methods:{
  },

  filters:{

  }
};
</script>

<style>
</style>
