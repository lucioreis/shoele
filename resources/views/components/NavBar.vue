<template>
  <div id="nav">
    <div id="logo-link">
      <img
        id="logo"
        src="@/assets/logo-gold.png"
        alt="Logo"
        @click="() => Inertia.Inertia.get('/')"
      />
    </div>
    <div class="search-box">
      <search-box />
    </div>
    <div class="cart">
      <div v-if="props.username">
        <login class="login" @click="() => Inertia.Inertia.get('/logout')" :name="props.username" />
      </div>
      <div v-else>
        <login class="login" @click="() => Inertia.Inertia.get('/login')" />
      </div>
      <shop-cart class="shop-cart m-center" />
    </div>
    <div class="links-row">
      <div v-for="i in [1, 2, 3, 4, 5]" :key="i" class="link-btn">{{ `Link${i}` }}</div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import SearchBox from "./SearchBox.vue";
import ShopCart from "./ShopCart.vue";
import Login from "./Login.vue";
import Inertia from "@inertiajs/inertia"

const props = defineProps({
  logo: String,
  desc: String,
  username: String
})
</script>

<style scoped>
@import "@/assets/base.css";

#nav {
  height: 90px;
  background-color: var(--second-color);
  color: var(--main-color);
  display: grid;
  grid-template-columns: 1fr 2fr 1fr;
  grid-template-rows: 70% 30%;
  align-items: center;
}

.links-row {
  grid-row: 2/3;
  grid-column: span 3;
  background-color: var(--main-color);
  color: var(--second-color);
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  height: 100%;
  width: 100%;
  place-self: center;
  place-items: center;
}

.link-btn {
  height: 100%;
  width: 100%;
  text-align: center;
  text-justify: center;
  /* outline: blue solid 2px; */
  transition: 0.3s;
  padding: 0px 4rem;
}
.link-btn:hover {
  background-color: var(--second-color);
  color: var(--main-color);
}

#logo-link {
  text-decoration: none;
  padding: 20px 0;
  color: var(--main-color);
  margin-left: 20px;
  display: grid;
  align-items: center;
}

#logo-link img {
  max-width: 30%;
  transition: 250ms ease-in-out;
}

#logo-link img:hover {
  transform: scale(1.05);
}

.cart {
  /* outline: red solid 2px; */
  grid-row: 1/2;
  grid-column: 3/4;
  display: grid;
  place-items: center;
  /* place-items: center; */
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.m-center {
  color: white;
}

.login {
  margin: 0px 0px 0px auto;
}

.search-box {
  outline: green 2px dotted;
  max-width: 100%;
}
</style>
