import { defineStore, acceptHMRUpdate } from 'pinia';
import axios from 'axios';

const API_BASE_URL = process.env.VUE_APP_API_BASE_URL;
export const departmentStore = defineStore('departmentStore', {
  state: () => ({
    departments: {
      loading: false,
      data: [],
      error: null,
    },
  }),
  getters: {
    getDepartmentsDropdown(state){
      return state.departments;
    },
  },
  actions: {
    async fetchAllDepartments(){
      this.departments.loading = true;
      try {
        const {data, status} = await axios.get(`${API_BASE_URL}/api/v1/departments/all`);
        if([200,201].includes(status)){
          this.departments.data = data;
        }
      } catch(error){
        this.departments.error = error;
      } finally {
        this.departments.loading = false;
      }
    },
  }
})

if (import.meta.hot) {
  import.meta.hot.accept(acceptHMRUpdate(departmentStore, import.meta.hot))
}
