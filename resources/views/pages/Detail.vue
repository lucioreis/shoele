<template>
  <div class="view">
    <div class="descricao">
      <h1>Nome do Produto</h1>
      <h2>Product description</h2>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p>
    </div>
    <slider class="slider" mode="list" :src="imagensRef" />
    <div class="detalhes-compra">
      <div class="priceTag">Price: {{ detailRef.price }}</div>
      <div id="tamanhosText">Sizes:</div>
      <div class="tamanhos">
        <button
          v-for="size in [34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45]"
          @click="selected = size"
          :id="size.toString()"
          :class="(selected === size) ? 'selected' : 'notSelected'"
        >{{ size }}</button>
      </div>
      <div v-if="detailRef.amount">On stock: {{ detailRef.amount }}</div>
      <div v-else>Out of Stock</div>
      <button id="btn-compra" @click="addToCart()">{{ btnText }}</button>
    </div>
  </div>
</template>

<script setup lang="ts">
import Slider from "../components/Slider.vue";
import { onMounted, ref } from 'vue';
import { useCartStore, Produto } from "../stores/cart"

type Details = {
  price: number,
  size: string,
  color: string,
  ties: string,
  amount: number
}

let detail: Details = {
  price: 0,
  size: '',
  color: '',
  ties: '',
  amount: 0
}
const props = defineProps(['product', 'details']);
const cart = useCartStore();

const imagensRef = ref([]);
const btnText = ref("Add to Cart")
const detailRef = ref(detail);
const selected = ref(-1);
onMounted(() => {
  detailRef.value = props.product.product_details[0];
  console.log(detailRef.value);

});

function addToCart() {
  // const product: Produto = JSON.parse(JSON.stringify(props.product));
  // console.log("Props.product.value", product);
  const product: Produto = props.product;
  product.price = props.product.product_details[0].price;
  product.category = props.product.product_details[0].category;
  product.size = props.product.product_details[0].size;
  product.color = props.product.product_details[0].color;
  product.ties = props.product.product_details[0].ties
  product.amount = (product.amount) ? product.amount : 0;
  cart.addProduct(product);
}
</script>

<style scoped>
.bounce-enter-active {
  animation: bounce-in 0.5s;
}
.bounce-leave-active {
  animation: bounce-in 0.5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.25);
  }
  100% {
    transform: scale(1);
  }
}

.view {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  width: 100%;
  height: calc(100vh-80px);
  gap: 20px;
  margin: 1rem auto;
}
.slider {
  height: 500px;
  width: 500px;
  margin-right: 0;
}

.detalhes-compra {
  display: grid;
  grid-template-rows: 0.5fr 1fr 0.5fr 0.25fr;
  margin-bottom: 0.5rem;
}

.priceTag {
  font-size: 2.5rem;
  font-weight: bold;
  padding-left: 1rem;
}

#btn-compra {
  width: 80%;
  height: 100%;
  font-size: 1.5em;
  font-weight: bold;
  margin: auto;
  border: 2px solid var(--second-color);
  border-radius: 8px;
  color: var(--second-color);
  background-color: var(--main-color);
  transition: 0.5s;
  cursor: pointer;
}

.tamanhos {
  grid-row: 2/3;
  grid-column: 1/2;
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  column-gap: 1.5rem;
}

.tamanhos button {
  margin-top: 1.5rem;
  margin-bottom: 0rem;
  border: 1px solid var(--main-color);
  font-size: 1.2rem;
  color: var(--second-color);
  /* background-color: #fafafa; */
  height: 3rem;
  width: 16%;
}

.selected {
  background-color: var(--main-color);
  border-color: var(--second-color);
}

.notSelected {
  background-color: #fafafa;
}
#tamanhosText {
  grid-row: 2/3;
  grid-column: 1/2;
}

#btn-compra:hover {
  scale: 1.05;
  color: var(--main-color);
  background-color: var(--second-color);
}
</style>

