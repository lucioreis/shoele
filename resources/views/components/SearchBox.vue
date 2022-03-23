<template>
  <div class="search-bar">
    <select id="categorias" v-model="selected" name="categories">
      <option v-for="(cat, index) in categorias" :key="index" :value="cat">{{ cat }}</option>
    </select>
    <input
      id="s-text"
      v-model="searchTerm"
      type="text"
      placeholder="Pesquisar"
      @keydown.enter="search"
    />
    <button
      id="s-btn"
      @click="search"
      @mouseover="isMouseOver = true"
      @mouseleave="isMouseOver = false"
    >
      <img id="search-icon" src="@/assets/search-icon-gold.png" v-if="isMouseOver" />
      <img id="search-icon" src="@/assets/search-icon-black.png" v-else />
    </button>
  </div>
</template>

<script>
export default {
  name: "SearchBox",
  data() {
    return {
      categorias: [],
      searchTerm: "",
      selected: "Todos",
      isMouseOver: false,

    };
  },
  mounted() {
    this.getCagorias();
  },
  methods: {
    search() {
      this.$router.push({ path: '/search', query: { search: this.searchTerm } });
    },
    getCagorias() {
      this.categorias = ["Todos", "Tenis", "Chinelos", "Cadarcos", "Croks"];
    }
  }
}
</script>

<style scoped>
.search-bar {
  display: grid;
  max-width: 100%;
  height: 70px;
  padding: 0px;
  font-size: 1.25em;
  margin: 0;
  grid-template-columns: 1fr 4.5fr 1fr;
  grid-template-rows: 1fr 3fr 1fr;
  /* opacity: 0.5; */
  border: 0;
}

.search-bar select {
  height: 100%;
  grid-column: 1 / 2;
  grid-row: 2 / 3;
  font-size: inherit;
  /* border-bottom-left-radius: 10px; */
  /* border-top-left-radius: 10px; */
  background-color: var(--main-color);
  color: var(--second-color);

  border: 0;
  transition: 0.5s;
}

.search-bar select:hover {
  border: 1px var(--main-color) solid;
  background-color: var(--second-color);
  color: var(--main-color);
}

#s-text {
  align-self: stretch;
  grid-column: 2 / 3;
  grid-row: 2/3;
  background-color: var(--second-light);
  color: var(--main-light);
  font-size: inherit;
  border: 0;
}

#s-text:focus {
  outline: none;
}

#s-btn {
  display: grid;
  place-content: center;
  outline: blue 1px dotted;
  height: 100%;
  width: 100%;
  grid-column: 3/4;
  grid-row: 2/3;
  border: 0;
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
  /* border-top-right-radius: 10px; */
  /* border-bottom-right-radius: 10px; */
  background-color: var(--main-color);
  color: var(--background-color);
  transition: 0.5s ease-in-out;
}

#s-btn img {
  height: 32px;
  margin: 0;
  padding: 0;
}

#s-btn:hover {
  border: 1px var(--main-color) solid;
  background-color: var(--second-color);
  color: var(--main-color);
}
</style>
