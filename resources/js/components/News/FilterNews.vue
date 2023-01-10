<template>
  <div class="row" data-aos="fade-up">
    <div class="col-lg-3 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <h2 class="text-dark text-center">Categoria</h2>
          <div>
            <button
              v-for="category in categories"
              v-bind:key="category.id"
              class="btn btn-block"
              :class="[category.name == categorySelected ? 'btn-primary' : '']"
              @click="getForCategory(category.name)"
            >
              {{ category.name }} ({{
                category.news_count ? category.news_count : "0"
              }})
              <i
                class="fa-sharp fa-solid fa-xmark"
                v-show="category.name == categorySelected"
                >X</i
              >
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12 my-2">
              <div class="row">
                <div class="col-xl-7 col-md-6 col-3 text-center">
                  <p class="mt-2" v-show="searchingActive">
                    {{ dataPaginated.length }} resultados
                  </p>
                </div>
                <div class="col-xl-5 col-md-6 col-9 mb-4">
                  <div class="input-group">
                    <div class="form-outline">
                      <input
                        type="search"
                        id="form1"
                        placeholder="Buscar"
                        class="form-control"
                        v-model="searching"
                      />
                    </div>
                    <button type="button" class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" v-for="item in dataPaginated" v-bind:key="item.id">
              <div class="col-sm-4 mt-2 grid-margin">
                <div class="position-relative">
                  <div class="rotate-img">
                    <img
                      src="https://mundofreestyle.com/wp-content/uploads/2019/06/aczino-chuty.jpg"
                      alt="thumb"
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
              <div class="col-sm-8 grid-margin">
                <h2 class="mb-2 text-dark font-weight-600">
                    <a :href="'/news/'+item.slug">
                  {{ item.title }}
                    </a>
                </h2>
                <p class="mb-0">
                  {{ item.extract }}
                </p>
              </div>
            </div>
            <div class="text-center" v-show="dataPaginated.length == 0">
              No se encuentran resultados
            </div>
            <div class="col-12 mt-3" v-show="!searchingActive">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a
                    class="page-link"
                    :class="[currentPage == 1 ? 'disabled' : '']"
                    @click="getPreviusPage()"
                    >Anterior</a
                  >
                </li>
                <li
                  class="page-item"
                  :class="[currentPage == page ? 'active' : '']"
                  v-for="page in totalPages()"
                  v-bind:key="page"
                >
                  <a class="page-link" @click="dataForPage(page)">{{ page }}</a>
                </li>
                <li class="page-item">
                  <a
                    class="page-link"
                    @click="getNextPage()"
                    :class="[currentPage == totalPages() ? 'disabled' : '']"
                    >Siguiente</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    news: {
      type: Array,
      required: true,
    },
    categories: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      pages: 0,
      elementForPage: 3,
      dataPaginated: [],
      currentPage: 1,
      searching: "",
      searchingActive: false,
      categorySelected: "",
    };
  },
  methods: {
    totalPages() {
      return Math.ceil(this.news.length / this.elementForPage);
    },

    dataForPage(page) {
      this.dataPaginated = [];
      this.currentPage = page;
      let start = page * this.elementForPage - this.elementForPage;
      let end = page * this.elementForPage;

      this.dataPaginated = this.news.slice(start, end);
    },
    initPages() {
      this.dataPaginated = this.news.slice(0, this.elementForPage);
    },

    getPreviusPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }

      this.dataForPage(this.currentPage);
    },

    getNextPage() {
      if (this.currentPage < this.totalPages()) {
        this.currentPage++;
      }
      this.dataForPage(this.currentPage);
    },

    getForCategory(category) {
      if (this.categorySelected == category) {
        this.initPages();
        this.categorySelected = "";
        this.searchingActive = false;
        return;
      }
        this.searchingActive = true;
        this.dataPaginated = this.news.filter(
          (item) => item.category == category
        );
        this.categorySelected = category;

    },
  },
  created() {
    this.initPages();
  },

  watch: {
    searching(newValue, oldValue) {
      this.categorySelected = "";
      if (newValue != "") {
        this.dataPaginated = this.news.filter((item) =>
          item.title.includes(newValue)
        );
        this.searchingActive = true;
      } else {
        this.dataForPage(1);
        this.searchingActive = false;
      }
    },
  },
};
</script>

<style>
</style>
