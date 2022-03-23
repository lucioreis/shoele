import { defineStore } from "pinia";

export type User = {
  name: String,
  password: String
}
export const useUserStore = defineStore({
  id: "name",
  state: () => ({
    name: "",
    password: "",
  } as User),
  getters: {
    getname: (state: User): String => state.name,
    getPassword: (state: User): String => state.password,
  },
  actions: {
    reset() {
      this.name = "";
      this.password = "";
    },
    setname(name: String) {
      this.name = name;
    },
    setPassword(password: String) {
      this.password = password;
    }
  },
});
