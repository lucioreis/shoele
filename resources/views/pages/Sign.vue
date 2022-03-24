<template>
  <div class="view">
    <div class="step">
      <h1>Log in</h1>
      <form action="/">
        <label for="username">E-mail</label>
        <input v-model="form.email" type="text" name="username" />
        <label for="password">Password</label>
        <input id="password" v-model="form.password" type="password" name="password" />
      </form>

      <div class="buttons">
        <button class="btn" @click="login">Log in</button>
        <button class="btn" @click="signup">Sign up</button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";
import { ref, watch } from "vue";
import { useUserStore } from "../stores/user"


const form = useForm({
  email: '',
  password: '',
  remember: true
});

watch(form, (nform)=> {
  console.log('form', nform);
});
let session = useUserStore();

function login() {

  form.post('/login', {
    preserveScroll: true,
    // onSuccess: () => {
    //   form.reset('password');
    // }
  })

}

function signup() {
  Inertia.get('/signup')
}

</script>

<style scoped>
.view {
  min-height: 100vh;
}
.step {
  width: 50%;
  margin: 5rem auto 6rem;
  display: flex;
  flex-direction: column;
  border: 1px solid var(--main-color);
  box-shadow: 0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
  border-radius: 1em;
  padding: 1rem;
  gap: 0.3rem;
  background-color: white;
  transition: 0.5s;
}
.step label {
  font-weight: bold;
  font-size: 1.2rem;
  border-left: 0.4rem solid var(--main-color);
  padding: 0.3rem;
}

.step form {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.step input {
  margin-bottom: 1.5rem;
  font-size: 1.1rem;
  height: 2rem;
}

.buttons {
  display: flex;
  justify-content: space-between;
}
.btn {
  font-size: 1.2em;
  font-weight: bold;
  width: 8em;
  padding: 0.5em;
  color: var(--main-color);
  background-color: var(--second-color);
  border-radius: 0.5em;
  border: 2px solid var(--second-color);
  transition: 0.3s;
  margin: 0;
}

.btn:hover {
  background-color: var(--main-color);
  color: var(--second-color);
  border: 2px solid var(--second-color);
}
</style>
