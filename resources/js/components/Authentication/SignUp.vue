<template>
  <div class="card-body px-4 pt-5 px-md-5">
    <div class="row">
      <div class="col-12 mb-4">
        <div class="row">
          <div class="col-12">
            <div
              v-if="errors.login"
              class="
                alert alert-danger alert-dismissible
                fade
                show
                mb-4
                text-center
              "
            >
              {{ errors.login[0] }}
            </div>
          </div>
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

      <div class="col-12 mb-4">
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

      <div class="col-12 mb-4">
        <button @click="signUp()" class="btn btn-primary btn-block">
          Iniciar sesión
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      errors: {},
      form: {
        username: "",
        password: "",
      },
    };
  },

  methods: {
    signUp() {
      const formData = new FormData();
      formData.append("username", this.form.username);
      formData.append("password", this.form.password);
      this.errors = {};
      axios
        .post("/login", formData)
        .then((response) => {
          if (response.data.status == "logged") {
            window.location.href = "/";
          } else {
            this.errors = {
              login: ["A.K.A y/o contraseña equivocado"],
            };
          }
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>

<style>
</style>
