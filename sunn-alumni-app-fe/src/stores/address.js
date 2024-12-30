import { defineStore, acceptHMRUpdate } from 'pinia'

export const useAddressStore = defineStore('address', {
  state: () => ({}),
  getters: {},
  actions: {}
})

if (import.meta.hot) {
  import.meta.hot.accept(acceptHMRUpdate(useAddressStore, import.meta.hot))
}
