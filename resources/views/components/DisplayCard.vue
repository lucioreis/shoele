<template>
  <div class="display" @click.self="goToDetail">
    <div id="img">
      <img :src="imagesAddress[index]" alt="image" />
    </div>

    <div class="descricao">
      <div id="nome">{{ product.model }}</div>
      <div v-if="desconto">
        <div>
          De:
          <span class="descontado">{{ detail.price }}</span>
        </div>
        <div>
          Por:
          <span class="preco-atual">{{ (detail.price).toFixed(2) }}</span>
        </div>
      </div>
      <div v-else class="preco-atual">Por: {{ detail.price }}</div>
    </div>
    <button id="p-btn" class="btn" @click="previous"></button>
    <button id="n-btn" class="btn" @click="next"></button>
  </div>
</template>

<script setup lang="ts">
import { Inertia } from '@inertiajs/inertia';
import { onMounted, Ref, ref } from 'vue';

type Detail = {
  id?: 0,
  price?: 0.0,
  size?: '',
  ties?: '',
  color?: '',
  amount?: ''
}
// type Props = {
//   product: Produto,
//   images: Array<string>
// }
let props = defineProps(['product', 'images']);

let desconto = ref(0);
let imagesname: Array<string> = props.images;
let index = ref(0);
let imagesAddress = ref(Array<string>());

let detail = ref({
  id: 0,
  price: 0,
  size: '',
  ties: '',
  color: '',
  amoutn: 0
});

function setDetail(value: any) {
  detail.value = value;
}

onMounted(() => {
  getImages();
  console.log("PROD-DETAILS: ", props.product.product_details[0]);
  detail.value = props.product.product_details[0];
  console.log("DETAIL: ", detail);
});

function next() {
  index.value++;
  index.value = index.value % imagesAddress.value.length;
}
function previous() {
  index.value--;
  index.value = (index.value >= 0) ? index.value : imagesAddress.value.length - 1;
}
function getImages() {
  let dir: string = '/images/';
  imagesname.forEach((image) => {
    imagesAddress.value.push(dir + image);
  });
}

function goToDetail() {
  Inertia.get(`/detail/${props.product.id}`);
}
</script>

<style scoped>
.full-grid {
  grid-template-columns: 1 / span 1;
  grid-template-rows: 1 / span 1;
}
.display {
  width: 200px;
  height: 300px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-auto-rows: 1fr 1fr 1fr;
  background-color: lightgray;
  border-radius: 1em;
  border: 1px solid var(--main-color);
}

.descricao {
  font-size: 1em;
  grid-column: 1 / 3;
  grid-row: 4 /5;
}
.descricao .descontado {
  text-decoration-line: line-through;
  color: red;
  grid-row: 4 / 5;
  grid-column: 1 /2;
}

.descricao .preco-atual,
#nome {
  font-weight: bold;
  font-size: 1.5em;
  color: black;
}

#img {
  height: 200px;
  border-radius: inherit;
  grid-row: 1/3;
  grid-column: 1/3;
}
img {
  height: 100%;
  width: 100%;
  margin: 0;
  border-radius: 1em 1em 0 0;
}

.btn {
  grid-row: 2/3;
  width: 20%;
  background-color: black;
  color: white;
  opacity: 50%;
  border: 0;
  border-radius: 4px;
}

.btn:hover {
  opacity: 100%;
}
#p-btn {
  clip-path: polygon(90% 0, 49% 50%, 90% 100%, 40% 100%, 0 50%, 40% 0);
  margin: 0 auto 0 0;
  grid-column: 1/2;
}
#n-btn {
  clip-path: polygon(60% 0, 100% 50%, 60% 100%, 10% 100%, 50% 50%, 12% 0);
  grid-column: 2/3;
  margin: 0 0 0 auto;
}
</style>

