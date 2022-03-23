<template>
  <div class="slider-main-offer">
    <button @click="imageIndex(-1)" class="btn previous">Previous</button>
    <div
      v-for="offer in main_offers"
      :key="offer.id"
      v-show="offer.id === index"
      :class="isOnCart(offer) ? 'onCart' : ''"
      class="main-offer"
      @click="goToDetails(offer.id)"
    >
      <img :src="`/images/900x400.png`" />
      <span class="onCartTag" v-show="isOnCart(offer)">On Cart</span>
      <div class="modelName">{{ offer.model }}</div>
    </div>
    <button @click="imageIndex(1)" class="btn next">Next</button>
  </div>
  <div class="second-offer">
    <div class="card" v-for="offer in second_offers" :key="offer.id">
      <display-card
        @click="goToDetails(offer.id)"
        :product="offer"
        class="displayCard"
        :images="['900x400.png', '900x400.png', '900x400.png', '900x400.png']"
      />
      <div v-show="isOnCart(offer)" class="onCartTag">On Cart</div>
    </div>
  </div>
</template>
<script setup lang="ts">
import { onMounted, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import DisplayCard from "../components/DisplayCard.vue";
import { useCartStore } from '../stores/cart';

type Detail = {
  size: string,
  color: string,
  ties: string,
  amount: number,
  price: number
}

type Product = {
  id: number,
  model: string,
  category: string,
  brand: string,
  material: string,
  target: string,
  size: string,
  color: string,
  ties: string,
  price: number,
  amount: number
  isOnCart?: boolean
  details: Array<Detail>
}


const props = defineProps(['products']);

let main_offers = ref(Array<Product>());
let second_offers = ref(Array<Product>());

const cart = useCartStore();
// console.log(cart.produtos)
let index = ref(1);

main_offers.value = props.products;
second_offers.value = props.products.splice(100, 5);

function isOnCart(product: Product): boolean {
  if (cart.isIn(product) !== -1) {
    product.isOnCart = true;
    return true;
  }
  else {
    product.isOnCart = false;
    return false;
  }
}
// onMounted(() => console.log(props.products[1]));

function imageIndex(i: number) {
  let id = index.value;
  let length = main_offers.value.length;
  id += i;
  id = (id > 0) ? id : length;
  id = (id <= length) ? id : 1;
  index.value = id;
}

function goToDetails(id: number) {
  Inertia.get('/detail/' + id);
}
</script>

<style scoped>
.main-offer {
  display: grid;
  grid-template-columns: 100%;
  grid-template-rows: 85% 15%;
  margin: 1rem;
}

.main-offer img {
  grid-row: 1/3;
  grid-column: 1/2;
  height: 400px;
  width: 100%;
  border: 1px solid var(--main-color);
  border-radius: 1rem;
}

.modelName {
  grid-row: 1/2;
  grid-column: 1/2;
  padding-top: 2rem;
  padding-left: 2rem;
  font-size: 2rem;
  font-weight: bold;
}

.second-offer {
  display: flex;
  gap: 2rem;
  justify-content: center;
}

#img {
  height: 100px;
  width: 100px;
}

.slider-main-offer {
  display: grid;
  grid-template-columns: 20% 60% 20%;
  justify-content: center;
  align-items: center;
}

.btn {
  margin: auto;
  height: 5rem;
  width: 5rem;
  border-radius: 50%;
}

.main-offer .onCartTag {
  grid-row: 2/3;
  grid-column: 1/2;
  margin-top: auto;
  background-color: green;
  height: 2rem;
  color: black;
  font-size: 1.5rem;
  font-weight: bold;
  text-align: center;
  border-radius: 0 0 1rem 1rem;
}

.card {
  margin-bottom: 2rem;
  display: grid;
  grid-template-rows: 15% 85%;
}

.card .onCartTag {
  width: 100%;
  background-color: green;
  color: black;
  font-weight: black;
  place-self: center;
  border-radius: 1rem 1rem 0 0;
  text-align: center;
  grid-row: 1/2;
  grid-column: 1/2;
}

.card .displayCard {
  grid-row: 1/3;
  grid-column: 1/2;
}
</style>
