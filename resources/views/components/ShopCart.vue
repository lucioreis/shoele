<template>
  <div>
    <button class="toggleCart" @click="toggleCart = !toggleCart">
      <img src="@/assets/cart-icon.png" class="btn-icon" />
    </button>
  </div>

  <div v-show="toggleCart" class="navdrawer"></div>
  <div v-show="toggleCart" class="nothing-here" @click="toggleCart = !toggleCart"></div>
  <transition>
    <div v-show="toggleCart" class="drawer">
      <div class="cart">
        <div>
          <h1>Carrinho de Compra</h1>
        </div>
        <div v-for="(produto, index) in produtos" :key="index">
          <button id="btn-plus" @click="changeQntd(produto, 1)">+</button>
          <span>{{ produto.amount }}</span>
          <button id="btn-minus" @click="changeQntd(produto, -1)">-</button>
          <MiniCard :product="produto" />
          <button id="btn-del" @click="remover(produto.id)">Remover</button>
        </div>
        <div id="total">Total: {{ (cart.getTotal) }}</div>
        <button id="btn-compra" @click="finalizar(), toggleCart = !toggleCart">Finalizar Compra</button>
      </div>
    </div>
  </transition>
</template>

<script setup lang="ts">
import { Inertia } from '@inertiajs/inertia'
import { useCartStore, Produto } from "../stores/cart";
import MiniCard from "../components/MiniCard.vue";
import { onMounted, ref, watch } from 'vue';

const cart = useCartStore();
let produtos = ref(Array<Produto>());
let toggleCart = ref(false);
let total = ref(0);

onMounted(() => {
  produtos.value = cart.getProdutos;
  console.log(produtos.value);
});

watch(
  produtos, (newProducts) => {
    newProducts.forEach((product) => {
      total.value += Number(product.price);
    });
  }
);

function changeQntd(produto: Produto, amount: number) {
  if (produto.amount <= 0 && amount <= 0) produto.amount = 0;
  produto.amount += amount;
}

// const form = produtos.value;
function finalizar() {

  Inertia.get('/finalizar');
}

function remover(id: number) {
  for (let i = 0; i < produtos.value.length; i++) {
    if (produtos.value[i].id === id) {
      produtos.value.splice(i, 1);

    }
  }
}

</script>
<style scoped>
.toggleCart {
  display: grid;
  max-height: 2.5rem;
  max-width: 2.5rem;
  border: 0;
  background-color: var(--background-color);
  margin: auto;
}

.btn-icon {
  max-width: 120%;
  max-height: 120%;
}
.cart {
  color: var(--second-color);
}

.nothing-here {
  z-index: 9999;
  position: fixed;
  background-color: black;
  opacity: 0.25;
  display: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  height: 100vh;
  width: 50%;
}

.drawer {
  z-index: 9999;
  position: fixed;
  background-color: var(--main-light);
  display: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin-left: 50%;
  height: 100vh;
  width: 50%;
}

.drawer-enter-from {
  margin-left: 100%;
}
.drawer-enter-to {
  margin-left: 0%;
}
.drawer-enter-active {
  transition: margin-left 5s ease;
}

#total {
  font-size: 1.5rem;
  font-weight: bold;
  margin-left: 1rem;
}
</style>
