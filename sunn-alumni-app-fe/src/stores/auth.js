import axios from 'axios';
import { defineStore, acceptHMRUpdate } from 'pinia'

const API_BASE_URL = process.env.VUE_APP_API_BASE_URL;
export const authStore = defineStore('authStore', {
  state: () => ({
    is_logged_in: false,
    token: null,
    register_request: {
      loading: false,
      error: null,
      data: null,
    },
  }),
  getters: {
    getRegisterRequestData(state){
      return state.register_request;
    }
  },
  actions: {
    async registerUser(payload){
      this.register_request.loading = true;
      try {
        const {data, status} = await axios({
          method: 'POST',
          url:`${API_BASE_URL}/api/v1/auth/register`,
          data: payload,
        });
        
        if([200,201].includes(status)){
          this.register_request.data = data;
        }
      } catch(error){
        this.register_request.error = error;
      } finally {
        this.register_request.loading = false;
      }
    },
  }
})

if (import.meta.hot) {
  import.meta.hot.accept(acceptHMRUpdate(authStore, import.meta.hot))
}
