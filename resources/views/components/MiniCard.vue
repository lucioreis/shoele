<template>
  <div class="minicard">
    <img class="image" :src="image" />
    <div class="column2">Model: {{ product.model }}</div>
    <div class="column3">Price: {{ product.price }}</div>
    <div class="column2">Color: {{ product.color }}</div>
    <div class="column3">Amount: {{ product.amount }}</div>
    <button class="button remove">
      <img src="https://img.icons8.com/small/16/000000/trash--v3.png" />
    </button>
    <button class="button edit">
      <img src="https://img.icons8.com/material-rounded/16/000000/edit--v1.png" />
    </button>
  </div>
</template>

<script setup lang="ts">

import { ref } from 'vue'


let props = defineProps(["image", "product"])
let image = ref("/logo.png");

if (props.image) {
  image.value = "/" + props.image;
}

console.log(image.value);
let calcado = ref({
  model: "Example",
  id: 1,
  preco: 1.50,
  desconto: 0.2,
  tamanhos: {
    "35": 17,
    "36": 13,
    "37": 8,
    "39": 40,
    "40": 5
  },
});

if (props.product) {
  calcado.value = props.product;
  image.value = '/images/600x900.png';
}

</script>

<style scoped>
.minicard {
  font-weight: bold;
  color: var(--main-color);
  background-color: var(--second-color);
  height: 5rem;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-template-rows: 1fr 1fr;
  grid-column-gap: 1rem;
  align-items: center;
  border: 0.15rem solid var(--main-color);
  border-radius: 1rem;
  transition: 0.5s;
}

.minicard:hover {
  transform: scale(1.03);
}

.image {
  grid-column: 1/2;
  grid-row: 1/3;
  height: 100%;
  width: 4rem;
  border-radius: 0.8rem 1rem 1rem 0.8rem;
}

.remove {
  grid-column: 4/5;
  grid-row: 1/2;
}

.edit {
  grid-column: 4/5;
  grid-row: 2/3;
}

.button {
  width: 2rem;
  height: 2rem;
  border-radius: 50%;
  border: 0;
  justify-self: right;
  margin-right: 1rem;
  background-color: var(--main-color);
}

.column2 {
  grid-column: 2/3;
}

.column3 {
  grid-column: 3/4;
}
</style>
