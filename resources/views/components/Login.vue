<template>
  <router-link to="/login">
    <div class="login" @mouseover="toggleLogin = true">
      <img src="@/assets/login.png" />
      {{ user }}
    </div>
  </router-link>
</template>


<script>
import { computed, ref } from 'vue'
import { useUserStore } from '../stores/user'

export default {
  setup() {
    let toggleLogin = ref(false)
    let user = ref("Login");
    const session = useUserStore();

    return {
      toggleLogin,
      user,
      session
    }
  },
}
</script>

<style scoped>
img {
  margin-top: 8px;
  max-width: 20%;
}

.login {
  display: grid;
  place-items: end;
  color: var(--main-color);
  cursor: pointer;
  transition: 0.3s ease-out;
}

.login:hover {
  transform: scale(1.05);
}

#modal {
  outline: blue 2px solid;
  /* display: none; */
}
</style>
