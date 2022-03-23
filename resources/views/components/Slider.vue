<template>
  <div class="display">

    <button v-show="$props.mode !== 'list'" id="n-btn" class="btn" @click="next"> </button>
    <button v-show="$props.mode !== 'list'" id="p-btn" class="btn" @click="previous"> </button>
    <img :src="images[index]" :alt="images[index]">
    <div v-show="$props.mode == 'list'" class="image-list">
      <button id="p-btn" class="btn" @click="previous"> </button>
      <span v-for="(image,ikey) in images" 
        :key="ikey"
        class="mini-imgs">
         <img :src="image" :alt="image" :class="(index===ikey)?'selected':'not-selected'" @click="()=>index=ikey">
      </span>
      <button id="n-btn" class="btn" @click="next"> </button>
    </div>
  </div>
    
</template>

<script>
export default {
  name: "DisplayCard",
  props: ["src", "_alt", "mode"],
  data() {
    return {
     images: [],
      index: 0,
    };
  },
  watch: {
    src() {
      this.getImages();
    }
  },
  beforeMount() {
    this.getImages();

  },
  methods: {
    next() {
      this.index++;
      this.index = this.index%this.images.length;
    },
    previous() {
      this.index--;
      this.index = (this.index >= 0)? this.index: this.images.length -1;
    },
    getImages() {
      this.images = this.$props.src;
    }
  }

}
</script>

<style scoped>
  .display {
    width: 100%;
    height: 100%;
    margin: 0;
    display: grid;
    grid-template-columns: 1fr 1fr ;
    grid-auto-rows: 1fr 1fr 1fr 1fr 1fr;
    background-color: var(--second-color);
  }

  .display img {
    height: 100%;
    width: 100%;
    grid-row: 1/5;
    grid-column: 1/3;
  }

  .btn {
    z-index: 3;
    grid-row: 2/4;
    width: 20%;
    background-color: var(--main-color);
    color: white;
    opacity: 50%;
    border: 0;
    border-radius: 4px;
  }

  .btn:hover {
    opacity: 100%;
    scale: 1.1;
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

  .image-list {
    display: flex;
    height: 100%;
    gap: 8px;
    border: 2px solid black;
    grid-row: 5/6;
    grid-column: 1/3;
    border-radius: 8px;
  }

  .image-list .btn {
    align-self: center;
    height: 90%;
  }

  .selected {
    border: 2px solid var(--main-color);
  }
</style>

