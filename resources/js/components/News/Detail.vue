<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-xl-8 col-md-8 col-12">
        <h1>{{ news.title }}</h1>
        <p>{{ news.created_at }}</p>
        <div>
          <p>Categoria: {{ news.category_name }}</p>
        </div>
        <div class="mb-3">
          <button class="btn btn-primary btn-sm" type="button">Button</button>
          <button class="btn btn-primary btn-sm" type="button">Button</button>
        </div>

        <img
          src="https://mundofreestyle.com/wp-content/uploads/2019/06/aczino-chuty.jpg"
          class="img-fluid w-100"
          alt=""
        />
        <p class="my-4">{{ news.extract }}</p>
        <p class="my-4 text-justify">{{ news.body }}</p>
        <p>Actualizado el {{ news.updated_at }}</p>
        <hr />
        <div class="row">
          <div class="col-6" v-if="previous_news">
            <p>Noticia anterior:</p>
            <a :href="'/news/'+previous_news.slug">{{previous_news.title}}</a>
          </div>
          <div class="col-6" v-if="next_news">
            <p>Siguiente noticia:</p>
            <a :href="'/news/'+next_news.slug">{{next_news.title}}</a>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-4 col-12 stretch-card grid-margin">
        <div class="card bg-dark text-white">
          <div class="card-body">
            <p class="mb-3 h5">Noticias relacionadas</p>

            <div class="row mb-4" v-for="item in related" v-bind:key="item.id">
              <div class="col-6">
                <h5 class="text-justify fs-6">
                  <a :href="'/news/' + item.slug">{{ item.title }}</a>
                </h5>
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
  </div>
</template>

<script>
export default {
  name: "detail",
  props: {
    news: {
      type: Object,
      required: true,
    },
    related: {
      type: Array,
      required: true,
    },
    previous_news: {
        type: Object,
        required: true,
    },
    next_news: {
        type: Object,
        required: true,
    }
  },
  data() {
    return {};
  },

  methods: {},
};
</script>

<style>
</style>