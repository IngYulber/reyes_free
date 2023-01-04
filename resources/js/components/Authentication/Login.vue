<template>
  <div class="card bg-glass">
    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified bg-glass" id="ex1" role="tablist">
      <li class="nav-item" role="presentation">
        <button
          class="nav-link"
          :class="[tabMenu == 'signup' ? 'active' : '']"
          @click="changeTabMenu('signup')"
        >
          Ingresar
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button
          class="nav-link"
          :class="[tabMenu == 'register' ? 'active' : '']"
          @click="changeTabMenu('register')"
        >
          Registrarse
        </button>
      </li>
    </ul>
    <!-- Pills navs -->
    <SignUp v-show="tabMenu == 'signup'"/>
    <Register v-show="tabMenu == 'register'" />
  </div>
</template>

<script>
import SignUp from "./SignUp.vue";
import Register from "./Register.vue";
export default {
  components: {
    SignUp,
    Register,
  },
  data() {
    return {
      tabMenu: "signup",
    };
  },
  methods: {
    changeTabMenu(option) {
      this.tabMenu = option;
    },
  },
};
</script>

