<template>
  <div class="card-body px-4 pt-5 px-md-5">
    <div class="row">
      <div class="col-12" v-if="message.created">
        <div class="alert alert-success alert-dismissible fade show">
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
          ></button>
          {{ message.created[0] }}
        </div>
      </div>

      <div class="col-6 mb-2">
        <div class="row">
          <div class="col-12 form-group">
            <input
              type="text"
              :class="['form-control', errors.username ? 'is-invalid' : '']"
              v-model="form.username"
              id="username"
              placeholder="A.K.A"
            />
            <div v-if="errors.username" class="invalid-feedback">
              {{ errors.username[0] }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 mb-2">
        <div class="row">
          <div class="col-12 form-group">
            <select
              type="text"
              :class="['form-control', errors.country ? 'is-invalid' : '']"
              v-model="form.country"
              id="country"
            >
              <option value="" selected disabled hidden>País</option>
              <option
                v-for="country in countries"
                v-bind:key="country.id"
                :value="country.id"
              >
                {{ country.name }}
              </option>
            </select>
            <div v-if="errors.country" class="invalid-feedback">
              {{ errors.country[0] }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 mb-2">
        <div class="row">
          <div class="col-12 form-group">
            <input
              type="text"
              :class="['form-control', errors.name ? 'is-invalid' : '']"
              v-model="form.name"
              id="name"
              placeholder="Nombres"
            />
            <div v-if="errors.name" class="invalid-feedback">
              {{ errors.name[0] }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 mb-2">
        <div class="row">
          <div class="col-12 form-group">
            <input
              type="text"
              :class="['form-control', errors.last_name ? 'is-invalid' : '']"
              v-model="form.last_name"
              id="last_name"
              placeholder="Apellidos"
            />
            <div v-if="errors.last_name" class="invalid-feedback">
              {{ errors.last_name[0] }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 mb-2">
        <div class="row">
          <div class="col-12 form-group">
            <input
              type="email"
              :class="['form-control', errors.email ? 'is-invalid' : '']"
              v-model="form.email"
              id="email"
              placeholder="Correo electrónico"
            />
            <div v-if="errors.email" class="invalid-feedback">
              {{ errors.email[0] }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 mb-2">
        <div class="row">
          <div class="col-12 form-group">
            <input
              type="password"
              :class="['form-control', errors.password ? 'is-invalid' : '']"
              v-model="form.password"
              id="password"
              placeholder="Contraseña"
            />
            <div v-if="errors.password" class="invalid-feedback">
              {{ errors.password[0] }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <button @click="register()" class="btn btn-primary btn-block">
          Crear cuenta
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      countries: {},
      errors: {},
      message: {},
      form: {
        username: "",
        country: "",
        name: "",
        last_name: "",
        email: "",
        password: "",
      },
    };
  },

  methods: {
    async getCountries() {
      axios.get("/countries").then((response) => {
        const { data: data } = response.data;
        this.countries = data;
      });
    },
    async register() {
        this.message = {}
      axios
        .post("/register", this.form)
        .then((response) => {
          if (response.data.status == "created") {
            this.message = {
              created: ["Usuario registrado"],
            };
            this.errors = {}
          }
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          console.log(this.errors);
        });
    },
  },
  created() {
    this.getCountries();
  },
};
</script>

<style>
</style>
