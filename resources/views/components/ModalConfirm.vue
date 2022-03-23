<template>
  <div class="dropback" v-show="exibir" @click.self="close">
    <div class="modal-content">
      <slot></slot>
      <div> {{mostrar}}-{{exibir}} </div>
      <button class="confirma resposta" @click="$emit('confirm'), close"> Sim </button> 
      <button class="nega resposta" @click="$emit('deny'), close"> Nao </button> </div>
  </div>
</template>

scr
<script setup lang="ts">
  import { ref, Ref} from "vue";



  let exibir = ref(true);
  let mostrar: Ref<boolean>;
  const props = defineProps(["mostrar"])
  console.log(props)

  function close(){
    exibir = !exibir && mostrar;
  }


</script>

<style scope>
  .dropback {
    top: 0;
    position: fixed;
    height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: grid;
  }

  .modal-content {
    margin: auto;
    display: grid;
    height: 40%;
    width: 40%;
    grid-template-columns: 2;
    grid-template-rows: 2;
    background: rgb(255, 255, 255);
    border-radius: 10px;
  }

  .modal-content h1 {
    grid-column: 1/3;
    grid-row: 1/2;
    max-height: 50%;
    margin: auto;
  }

  .modal-content .resposta {
    grid-row: 2/3;
    margin: auto 10%;
    font-size: 1.5rem;
    height: 70%;
    width: 80%;
  }
</style>
