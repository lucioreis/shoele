<template>
  <div class="modal">
    <div class="overlay">
    </div>
    <div calss="content">
      Modal Login    
    </div>
  </div>
</template>

<style scoped>

.modal {
  position: absolute;
  top: 0;
  width: 100px;
  height: 100px;
  outline: 2px green solid;
  display: grid;
}

.overlay {
  background-color: #0000007f;
  top: 0;
  width: 100%;
  height: 100%;
}

.content {
  height: 30%;
  width: 20%;
  background-color: #ffffff;
  color: #000;
}

  
</style>
