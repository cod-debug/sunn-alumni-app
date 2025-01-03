import axios from 'axios';
import { defineStore, acceptHMRUpdate } from 'pinia'

const API_BASE_URL = process.env.VUE_APP_API_BASE_URL;

export const addressStore = defineStore('addressStore', {
  state: () => ({
    regions: {
      loading: false,
      data: [],
      error: null,
    },
    provinces: {
      loading: false,
      data: [],
      error: null
    },
    cities: {
      loading: false,
      data: [],
      error: null,
    },
    barangays: {
      loading: false,
      data: [],
      error: null,
    },
    regions_present: {
      loading: false,
      data: [],
      error: null,
    },
    provinces_present: {
      loading: false,
      data: [],
      error: null
    },
    cities_present: {
      loading: false,
      data: [],
      error: null,
    },
    barangays_present: {
      loading: false,
      data: [],
      error: null,
    },
  }),
  getters: {
    getRegions(state){
      return state.regions;
    },
    getProvinces(state){
      return state.provinces;
    },
    getCities(state){
      return state.cities;
    },
    getBarangays(state){
      return state.barangays;
    },
    getProvincesPresent(state){
      return state.provinces_present;
    },
    getCitiesPresent(state){
      return state.cities_present;
    },
    getBarangaysPresent(state){
      return state.barangays_present;
    }
  },
  actions: {
    async fetchAllRegions(){
      this.regions.loading = true;
      try {
        const {data, status} = await axios.get(`${API_BASE_URL}/api/v1/address/regions`);
        if([200,201].includes(status)){
          this.regions.data = data;
        }
      } catch(error){
        this.regions.error = error;
      } finally {
        this.regions.loading = false;
      }
    },
    async fetchProvinces(region_code, is_present = false){
      this.provinces.loading = true;
      try {
        const {data, status} = await axios.get(`${API_BASE_URL}/api/v1/address/provinces/${region_code}`);
        if([200,201].includes(status)){
          if(is_present){
            this.provinces_present.data = data;
          } else {
            this.provinces.data = data;
          }
        }
      } catch(error){
        this.provinces.error = error;
      } finally {
        this.provinces.loading = false;
      }
    },
    async fetchCities(province_code, is_present = false){
      this.cities.loading = true;
      try {
        const {data, status} = await axios.get(`${API_BASE_URL}/api/v1/address/cities/${province_code}`);
        if([200,201].includes(status)){
          if(is_present){
            this.cities_present.data = data;
          } else {
            this.cities.data = data;
          }
        }
      } catch(error){
        this.cities.error = error;
      } finally {
        this.cities.loading = false;
      }
    },
    async fetchBarangays(city_code, is_present = false){
      this.barangays.loading = true;
      try {
        const {data, status} = await axios.get(`${API_BASE_URL}/api/v1/address/barangays/${city_code}`);
        if([200,201].includes(status)){
          if(is_present){
            this.barangays_present.data = data;
          } else {
            this.barangays.data = data;
          }
        }
      } catch(error){
        this.barangays.error = error;
      } finally {
        this.barangays.loading = false;
      }
    }
  }
})

if (import.meta.hot) {
  import.meta.hot.accept(acceptHMRUpdate(addressStore, import.meta.hot))
}
