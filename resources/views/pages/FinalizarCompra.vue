<template>
  <div class="view">
    Confirm and payment view
    <div class="list">
      <div class="element" v-for="product in products" :key="product.id">
        <mini-card :product="product" />
      </div>
      <div class="end">
        Total: {{ cart.getTotal }}
        <button class="confirm">Confirm and Buy</button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import MiniCard from "../components/MiniCard.vue";
import { useCartStore, Produto } from "../stores/cart";


const cart = useCartStore();

const products: Array<Produto> = cart.getProdutos;

</script>

<style scoped>
.view {
  min-height: 100vh;
}
.list {
  display: flex;
  flex-direction: column;
  align-content: space-around;
  max-width: 80%;
  outline: 1px solid red;
  margin: 1.5rem auto;
  min-height: 80vh;
  gap: 1.5rem;
}

.element {
  width: 98%;
  margin: auto;
}

.end {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 50%;
  padding: 0.2rem;
  height: 5rem;
  font-size: 2rem;
  font-weight: bold;
  margin: auto;
  background-color: var(--main-color);
  border: 1px solid var(--second-color);
  border-radius: 0.5rem;
}

.confirm {
  height: 100%;
  background-color: var(--second-color);
  border: 0;
  border-radius: 0.5rem;
  color: var(--main-color);
  font-size: 2rem;
  font-weight: bold;
  transition: 0.5s ease-out;
}

.confirm:hover {
  scale: 1.05;
  border-radius: 0 0.5rem 0.5rem 0;
}
</style>

