import { defineStore } from "pinia";

export type Counter = {
  counter: number
}

export const useCounterStore = defineStore({
  id: "counter",
  state: () => ({
    counter: 0,
  }),
  getters: {
    doubleCount: (state: Counter) => state.counter * 2,
  },
  actions: {
    increment() {
      this.counter++;
    },
  },
});
