import { defineStore } from "pinia";

export type Produto = {
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
}
export type RootState = {
  produtos: Array<Produto>,
  total: number
}
export const useCartStore = defineStore({
  id: "cart",
  state: () => ({
    produtos: [],
    total: 0,
  } as RootState),
  getters: {
    getProdutos: (state): Array<Produto> => state.produtos,
    getTotal: (state): number => state.total,
  },

  actions: {
    isIn(produto: Produto) {
      const produtos: Array<Produto> = this.getProdutos;
      for (let i = 0; i < produtos.length; i++) {
        if (produto.id === produtos[i].id) {
          return i;
        }
      }
      return -1;
    },
    reset() {
      this.produtos = [];
    },
    remove(index: number) {
      this.produtos.splice(index, 1);
    },
    addProduct(produto: Produto) {
      let i = -1;
      for (let j = 0; j < this.produtos.length; j++) {
        if (produto.id === this.produtos[j].id)
          i = j;
      }
      if (i === -1) {
        produto.amount += 1;
        this.produtos.push(produto);
      } else {
        this.produtos[i].amount++;
      }
      this.total += Number(produto.price);
    },
  },
});
