<template>
  <div class="login" @mouseover="toggleLogin = true">
    <img src="@/assets/login.png" />
    <div class="username">
      {{ user }}
      <span v-show="user!=='Login'">(Logout)</span>
    </div>
  </div>
</template>


<script setup lang="ts">
import { ref } from 'vue'
import { useUserStore } from '../stores/user'

let props = defineProps({
  name: String
})
let toggleLogin = ref(false)
let user = ref("Login");
const session = useUserStore();

if (props.name) {
  user.value = props.name;
}

</script>

<style scoped>
img {
  margin-top: 8px;
  max-width: 20%;
  margin: auto;
}

.login {
  display: grid;
  outline: 2px solid red;
  place-items: end;
  color: var(--main-color);
  cursor: pointer;
}

.username {
  margin: auto;
}

.login:hover {
  transform: scale(1.05);
}

#modal {
  outline: blue 2px solid;
  /* display: none; */
}
</style>
