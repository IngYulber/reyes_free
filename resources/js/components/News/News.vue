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
        <div class="row mb-5" data-aos="fade-up">
          <div class="col-xl-8 stretch-card">
            <div class="position-relative">
              <img
                src="https://mundofreestyle.com/wp-content/uploads/2019/06/aczino-chuty.jpg"
                alt="banner"
                class="img-fluid"
              />
              <div class="banner-content">
                <div class="badge badge-danger fs-12 fo nt-weight-bold my-3">
                  Noticia internacional,
                  <span class="mr-2">Hace 10 min</span>
                </div>
                <h1 class="mb-2">
                  <a :href="'/news/' + newTop.slug">
                    {{ newTop.title }}
                  </a>
                </h1>
              </div>
            </div>
          </div>
          <div class="col-xl-4 stretch-card grid-margin">
            <div class="card bg-dark text-white">
              <div class="card-body">
                <h2 class="mb-3">Nuevas noticias</h2>

                <div
                  v-for="item in newsRecent"
                  v-bind:key="item.id"
                  class="row mb-4"
                >
                  <div class="col-6">
                    <h5 class="text-justify fs-6">
                      <a :href="'/news/' + item.slug">{{ item.title }}</a>
                    </h5>
                    <div class="fs-12 text-light">
                      <!-- <span>Hace 10 min </span> -->
                    </div>
                  </div>
                  <div class="col-6">
                    <img
                      src="https://mundofreestyle.com/wp-content/uploads/2019/06/aczino-chuty.jpg"
                      alt="thumb"
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <FilterNews class="mb-5" :news="news" :categories="categories"/>
      </div>
    </div>
  </div>
</template>

<script>
import FilterNews from "./FilterNews.vue";
export default {
  props: {
    recent: {
      type: Array,
      required: true,
    },
  },
  components: {
    FilterNews,
  },

  data() {
    return {
      newTop: this.recent.slice(0, 1)[0],
      newsRecent: this.recent.slice(1, 4),
      news: {},
      categories:{},
    };
  },
  methods: {
    async getAllNews() {
      axios
        .get("/news/all")
        .then((response) => {
          this.news = response.data.data;
        })
        .catch((error) => {});
    },

    async getCategories(){
        axios.get('/news/categories').then((response) => {
            this.categories = response.data.data;
        })
    }
  },

  created() {
    this.getAllNews();
    this.getCategories();
  },

  filters: {},
};
</script>

<style>
</style>
