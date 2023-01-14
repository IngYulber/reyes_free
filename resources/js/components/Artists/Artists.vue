<template>
  <div class="container py-5">
    <div class="row" data-aos="fade-up">
      <div class="col-3">
        <div class="card">
          <div class="card-body">
            <div>
              <h2 class="text-dark text-center">Categoria</h2>
              <button
                v-for="category in categories"
                v-bind:key="category.id"
                class="btn btn-block btn-round"
                :class="[
                  category.name == categorySelected ? 'btn-primary' : '',
                ]"
                @click="filterByCategory(category.name)"
              >
                {{ category.name + " (" + category.artists_count + ")" }}

                <i
                  class="fa-sharp fa-solid fa-xmark"
                  v-show="category.name == categorySelected"
                  >X</i
                >
              </button>
            </div>
            <div>
              <h2 class="text-dark text-center">País</h2>
              <button
                v-for="item in artistByCoutry"
                v-bind:key="item.id"
                class="btn btn-block btn-round"
                :class="[item.name == countrySelected ? 'btn-primary' : '']"
                @click="filterByCountry(item.name)"
              >
                {{ item.name + " (" + item.artists_count + ")" }}

                <i
                  class="fa-sharp fa-solid fa-xmark"
                  v-show="item.name == countrySelected"
                  >X</i
                >
              </button>
            </div>
            <div>
              <h2 class="text-dark text-center">Estado</h2>
              <button
                v-for="item in artistByStatus"
                v-bind:key="item.status"
                class="btn btn-block btn-round"
                @click="filterByStatus(item.status)"
                :class="[item.status == statusSelected ? 'btn-primary' : '']"
              >
                {{ item.status == 1 ? "Activo" : "Retirado"
                }}{{ " (" + item.number_of_artist + ")" }}
                <i
                  class="fa-sharp fa-solid fa-xmark"
                  v-show="item.status == statusSelected"
                  >X</i
                >
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-9 bg-white pt-3">
        <div class="row">
          <div class="col-xl-12 col-md-12 col-12">
            <div class="row">
              <div class="col-xl-8 col-md-6 col-3 text-center"></div>
              <div class="col-xl-4 col-md-6 col-9 mb-4">
                <div class="input-group">
                  <input
                    type="search"
                    placeholder="Buscar artista"
                    class="form-control w-100"
                    v-model="searching"
                  />
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-xl-3 col-md-4 col-6 mb-4 text-center"
            v-for="item in dataPaginated"
            v-bind:key="item.id"
          >
            <div class="card h-100">
              <img
                src="https://imgs.search.brave.com/fFWyNqSl3KpRWSqrzrU12wM9IcNEKwDTCZ8IbaKYOic/rs:fit:980:600:1/g:ce/aHR0cHM6Ly92aWdu/ZXR0ZS53aWtpYS5u/b2Nvb2tpZS5uZXQv/cmFwL2ltYWdlcy81/LzVkL0Jsb24uanBn/L3JldmlzaW9uL2xh/dGVzdD9jYj0yMDE5/MDIxNTE0MjQyNyZw/YXRoLXByZWZpeD1l/cw"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <p class="card-title text-primary">
                  <strong
                    ><a :href="'/artists/' + item.slug">{{
                      item.aka
                    }}</a></strong
                  >
                </p>
                <p>{{ getFlag(item.unicode) + " " + item.country_name }}</p>
                <p>Edad: {{ item.date_of_birth }}</p>
                <p class="text-success" v-if="item.status == 1">
                  Estado: <b>Activo</b>
                </p>
                <p class="text-danger" v-else>Estado: <b>Retirado</b></p>
              </div>
            </div>
          </div>
          <div v-if="dataPaginated.length == 0" class="col-12 my-5">
            <p class="text-center">No hay data</p>
          </div>
          <div class="col-12 mt-3" v-if="!searchingActive">
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
</template>

<script>
import getUnicodeFlagIcon from "country-flag-icons/unicode";
export default {
  props: {
    artists: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      pages: 0,
      elementsForPage: 4,
      dataPaginated: [],
      currentPage: 1,
      searching: "",
      searchingActive: false,
      categories: [],
      categorySelected: "",
      artistByCoutry: [],
      countrySelected: "",
      artistByStatus: [],
      statusSelected: 0,
    };
  },
  methods: {
    getFlag(unicode) {
      return getUnicodeFlagIcon(unicode);
    },
    initPages() {
      this.dataPaginated = this.artists.slice(0, this.elementsForPage);
      this.currentPage = 1;
    },
    totalPages() {
      return Math.ceil(this.artists.length / this.elementsForPage);
    },

    dataForPage(page) {
      this.currentPage = page;
      let start = page * this.elementsForPage - this.elementsForPage;
      let end = page * this.elementsForPage;

      this.dataPaginated = this.artists.slice(start, end);
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

    async getCategories() {
      axios.get("/artists/categories").then((response) => {
        this.categories = response.data.data;
      });
    },

    async getArtistByCountry() {
      axios.get("/artists/by-country").then((response) => {
        this.artistByCoutry = response.data.data;
      });
    },

    async getArtistByStatus() {
      axios.get("/artists/by-status").then((response) => {
        this.artistByStatus = response.data.data;
      });
    },

    filterByStatus(status) {
      if (this.statusSelected == status) {
        this.statusSelected = "";
        if (this.verifyFilter()) {
          this.dataPaginated = this.artists.filter((item) =>
            this.combineFilter(item)
          );
        }
        return;
      }
      this.statusSelected = status;
      this.searchingActive = true;
      this.dataPaginated = this.artists.filter((item) =>
        this.combineFilter(item)
      );
    },
    filterByCountry(country) {
      if (this.countrySelected == country) {
        this.countrySelected = "";
        if (this.verifyFilter()) {
          this.dataPaginated = this.artists.filter((item) =>
            this.combineFilter(item)
          );
        }
        return;
      }
      this.countrySelected = country;
      this.searchingActive = true;
      this.dataPaginated = this.artists.filter((item) =>
        this.combineFilter(item)
      );
    },

    filterByCategory(category) {
      if (this.categorySelected == category) {
        this.categorySelected = "";
        if (this.verifyFilter()) {
          this.dataPaginated = this.artists.filter((item) =>
            this.combineFilter(item)
          );
        }
        return;
      }
      this.categorySelected = category;
      this.searchingActive = true;
      this.dataPaginated = this.artists.filter((item) =>
        this.combineFilter(item)
      );
    },

    combineFilter(item) {
      if (
        this.countrySelected != "" &&
        this.statusSelected != "" &&
        this.categorySelected != ""
      ) {
        return (
          item.country_name == this.countrySelected &&
          item.status == this.statusSelected &&
          item.type_name == this.categorySelected
        );
      }
      if (this.statusSelected != "" && this.categorySelected != "") {
        return (
          item.status == this.statusSelected &&
          item.type_name == this.categorySelected
        );
      }
      if (this.countrySelected != "" && this.categorySelected != "") {
        return (
          item.country_name == this.countrySelected &&
          item.type_name == this.categorySelected
        );
      }
      if (this.countrySelected != "" && this.statusSelected != "") {
        return (
          item.country_name == this.countrySelected &&
          item.status == this.statusSelected
        );
      }
      if (this.countrySelected != "") {
        return item.country_name == this.countrySelected;
      }

      if (this.statusSelected != 0) {
        return item.status == this.statusSelected;
      }

      if (this.categorySelected != "") {
        return item.type_name == this.categorySelected;
      }
    },

    verifyFilter() {
      if (
        this.statusSelected == "" &&
        this.countrySelected == "" &&
        this.categorySelected == ""
      ) {
        this.initPages();
        this.searchingActive = false;
        return false;
      }
      return true;
    },
  },

  created() {
    this.initPages();
    this.getCategories();
    this.getArtistByCountry();
    this.getArtistByStatus();
  },

  watch: {
    searching(newValue, oldValue) {
      if (newValue != "") {
        this.dataPaginated = this.artists.filter((item) =>
          item.aka.includes(newValue)
        );
        this.searchingActive = true;
        this.statusSelected = "";
        this.countrySelected = "";
        this.categorySelected = "";
      } else {
        this.dataForPage(1);
        this.searchingActive = false;
        this.statusSelected = "";
        this.countrySelected = "";
        this.categorySelected = "";
      }
    },
  },
};
</script>

<style>
</style>