<template>
  <div id="admin">
    <div id="tab">
      <div class="users seleceted">Users</div>
      <div class="goods not-selected">Goods</div>
    </div>

    <div class="goods-list">
      <h1>Lista de mercadorias</h1>
      <ul id="mini-cards">
        <li v-for="shoe in calcados" :key="shoe.id">
          <MiniCard class="mini-card" :product="shoe" @click="selectProduct(shoe)" />
        </li>
      </ul>
    </div>

    <div class="detail">
      <slider class="slider" mode="list" :src="images" />
    </div>
  </div>
</template>

<script setup>

import { ref } from 'vue';
import MiniCard from '../components/MiniCard.vue';
import Slider from '../components/Slider.vue';

//nome => [calcados|chinelos|croques|cadarcos|categorias]
const getData = async function (nome) {
  const req = await fetch(`http://localhost:4000/${nome}`);
  const data = await req.json();
  return data;
}

let calcados = ref([]);

getData("calcados").then((content) => {
  calcados.value = content;
});

let images = ref([]);

function selectProduct(shoe) {
  images.value = [];
  for (let img in shoe.imagens) {
    images.value.push(`/imgs/${shoe.model}/${shoe.imagens[img].img}`);
  }
}

() => { MiniCard, Slider, images, selectProduct }
</script>

<style scoped>
#admin {
  margin-left: 0.2rem;
  display: grid;
  grid-template-columns: 1fr 1fr;
}

.goods-list {
  grid-column: 1/2;
}

#tab {
  grid-column: 1/2;
  display: grid;
  gap: 0.2rem;
  grid-template-columns: 1fr 1fr;
  height: 100%;
  width: 100%;
  justify-items: center;
  align-items: center;
  margin-top: 0.2rem;
}

#tab .goods {
  width: 100%;
  color: var(--main-color);
  background-color: var(--second-color);
  transition: 0.5s;
}

#tab .goods:hover {
  color: var(--second-color);
  background-color: var(--main-color);
}

#tab .users {
  width: 100%;
  color: var(--main-color);
  background-color: var(--second-color);
  transform: 0.5s;
}

#tab .users:hover {
  color: var(--second-color);
  background-color: var(--main-color);
}
#mini-cards {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin: 1em;
}
.mini-card {
  width: 30rem;
  margin: 0 auto;
}

.detail {
  grid-column: 2/3;
}

.slider {
  border: 1px solid var(--second-color);
  border-radius: 2rem;
  height: 60%;
  width: 30%;
}
</style>
