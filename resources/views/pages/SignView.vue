<template>
  <div class="login-view">
    <div class="step-count">
      <h1>Sign Up: Step {{ current_index + 1 }} of 3</h1>
    </div>
    <div class="progress-bar">
      <div class="filled" :style="`max-width: ${33 * (current_index + 1)}%`"></div>
    </div>
    <form action="/">
      <div
        v-show="current_index === 0"
        :class="`step one ${(current_index === 0) ? 'active' : 'not-active'}`"
      >
        <label for="username">User name</label>
        <input id="username" type="text" name="username" />
        <label for="email">Email</label>
        <input id="email" type="email" name="email" />
        <label for="password">Password</label>
        <input id="password" type="password" name="password" />
        <div class="buttons" style="display: flex; justify-content: flex-end">
          <button type="button" class="btn" @click.prevent="current_index++">Next</button>
        </div>
      </div>
      <transition>
        <div
          v-show="current_index === 1"
          :class="`step two ${(current_index === 1) ? 'active' : 'not-active'}`"
        >
          <label for="Gender">Gender</label>
          <input id="gender" type="text" name="gender" />
          <label for="phone">Phone</label>
          <input id="Phone" type="text" name="phone" />
          <label for="Cellphone">Cellphone</label>
          <input id="cellphone" type="text" name="Cellphone" />
          <div class="buttons">
            <button type="button" class="btn" @click.prevent="current_index--">Previous</button>
            <button type="button" class="btn" @click.prevent="current_index++">Next</button>
          </div>
        </div>
      </transition>
      <div
        v-show="current_index === 2"
        :class="`step two ${(current_index === 2) ? 'active' : 'not-active'}`"
      >
        <label for="city">City</label>
        <input id="city" type="text" name="city" />
        <label for="state">State</label>
        <input id="sate" type="text" name="state" />
        <label for="street">Street</label>
        <input id="street" type="text" name="street" />
        <label for="number">Number</label>
        <input id="number" type="number" name="number" />
        <div class="buttons">
          <button type="button" class="btn" @click.prevent="current_index--">Previous</button>
          <button id="submit" type="submit" class="btn">Sign Up</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';

let current_index = ref(0);


</script>

<style scoped>
.login-view {
  min-height: 100vh;
  outline: 2px solid blue;
  margin: 0 auto;
  background-color: #ffffe7;
}

.step-count {
  width: 50%;
  display: flex;
  justify-content: center;
  margin: 0 auto;
}

.progress-bar {
  width: 50%;
  height: 1rem;
  border-radius: 1rem;
  margin: 0 auto;
  background-color: gray;
}

.filled {
  background-color: green;
  border-radius: 1rem;
  height: 100%;
}
.step {
  width: 50%;
  display: flex;
  margin: 1rem auto 2rem;
  flex-direction: column;
  border: 1px solid var(--main-color);
  box-shadow: 0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
  border-radius: 1em;
  padding: 1rem;
  gap: 0.3rem;
  background-color: white;
  transition: 0.5s;
}
.v-enter-from {
  transform: translateX(-200%);
}

.v-enter-to {
  transform: translateX(0);
}

.v-leave-from {
  transform: translateX(0);
}

.v-leave-to {
  transition: translateX(200%);
}

.step label {
  font-weight: bold;
  font-size: 1.2rem;
  border-left: 0.4rem solid var(--main-color);
  padding: 0.3rem;
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

@keyframes leave {
  from {
    transform: translateX(200%);
  }
  to {
    transform: translateX(0);
  }
}

@keyframes enter {
  from {
    transform: translateX(-200%);
  }
  to {
    transform: translateX(0%);
  }
}
</style>
