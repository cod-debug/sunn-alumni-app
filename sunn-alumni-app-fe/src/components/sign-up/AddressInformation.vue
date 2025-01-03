<template>
    <q-form ref="addressInformationForm">
        <h6 class="q-my-sm text-grey-8">Present Address</h6>
        <div class="row">
            <div class="col-12 col-md-6 q-pa-sm">
                <q-select
                    v-model="address_information.present_address_region_id"
                    :options="regions_options_present"
                    label="Region"
                    @filter="filterRegionDropdownPresent"
                    use-input
                    input-debounce="0"
                    @update:model-value="handleChangePresentRegion"
                    :loading="$addressStore.getRegions.loading"
                    :option-value="(option) => option === null ? null : option.id"
                    :option-label="(option) => option === null ? null : option.name"
                    :rules="['required']"
                />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-select
                    v-model="address_information.present_address_province_id"
                    :options="provinces_options_present"
                    label="Province"
                    @filter="filterProvinceDropdownPresent"
                    :loading="$addressStore.getProvinces.loading"
                    :disable="provinces_options_present.length === 0 && !is_filtered_provinces_options_present"
                    use-input
                    input-debounce="0"
                    @update:model-value="handleChangePresentProvince"
                    :option-value="(option) => option === null ? null : option.id"
                    :option-label="(option) => option === null ? null : option.name"
                    :rules="['required']"
                />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-select
                    v-model="address_information.present_address_city_id"
                    :options="cities_options_present"
                    label="City / Municipality"
                    @filter="filterCityDropdownPresent"
                    :loading="$addressStore.getCities.loading"
                    :disable="cities_options_present.length === 0 && !is_filtered_cities_options_present"
                    use-input
                    input-debounce="0"
                    @update:model-value="handleChangePresentCity"
                    :option-value="(option) => option === null ? null : option.id"
                    :option-label="(option) => option === null ? null : option.name"
                    :rules="['required']"
                />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-select
                    v-model="address_information.present_address_barangay_id"
                    :options="barangays_options_present"
                    label="Barangay"
                    @filter="filterBarangayDropdownPresent"
                    :loading="$addressStore.barangays.loading"
                    :disable="barangays_options_present.length === 0 && !is_filtered_barangays_options_present"
                    use-input
                    input-debounce="0"
                    :option-value="(option) => option === null ? null : option.id"
                    :option-label="(option) => option === null ? null : option.name.toUpperCase()"
                    :rules="['required']"
                />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-input label="House No./Lot/Bldg" 
                    v-model="address_information.present_address_1"
                />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-input label="Street/Subdivision/Purok" 
                    v-model="address_information.present_address_2"
                />
            </div>
        </div>
        <h6 class="q-my-sm text-grey-8">Permanent Address</h6>
        <div class="text-left">
            <q-toggle v-model="address_information.same_as_present_address" label="Same as present address" />
        </div>
        <div class="row" v-if="!address_information.same_as_present_address">
            <div class="col-12 col-md-6 q-pa-sm">
                <q-select
                    v-model="address_information.permanent_address_region_id"
                    :options="regions_options"
                    label="Region"
                    @filter="filterRegionDropdown"
                    use-input
                    input-debounce="0"
                    @update:model-value="handleChangeRegion"
                    :loading="$addressStore.getRegions.loading"
                    :option-value="(option) => option === null ? null : option.id"
                    :option-label="(option) => option === null ? null : option.name"
                    :rules="['required']"
                />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-select
                    v-model="address_information.permanent_address_province_id"
                    :options="provinces_options"
                    label="Province"
                    @filter="filterProvinceDropdown"
                    :loading="$addressStore.getProvinces.loading"
                    :disable="provinces_options.length === 0 && !is_filtered_provinces_options"
                    use-input
                    input-debounce="0"
                    @update:model-value="handleChangeProvince"
                    :option-value="(option) => option === null ? null : option.id"
                    :option-label="(option) => option === null ? null : option.name"
                    :rules="['required']"
                />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-select
                    v-model="address_information.permanent_address_city_id"
                    :options="cities_options"
                    label="City / Municipality"
                    @filter="filterCityDropdown"
                    :loading="$addressStore.getCities.loading"
                    :disable="cities_options.length === 0 && !is_filtered_cities_options"
                    use-input
                    input-debounce="0"
                    @update:model-value="handleChangeCity"
                    :option-value="(option) => option === null ? null : option.id"
                    :option-label="(option) => option === null ? null : option.name"
                    :rules="['required']"
                />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-select
                    v-model="address_information.permanent_address_barangay_id"
                    :options="barangays_options"
                    label="Barangay"
                    @filter="filterBarangayDropdown"
                    :loading="$addressStore.barangays.loading"
                    :disable="barangays_options.length === 0 && !is_filtered_barangays_options_present"
                    use-input
                    input-debounce="0"
                    :option-value="(option) => option === null ? null : option.id"
                    :option-label="(option) => option === null ? null : option.name.toUpperCase()"
                    :rules="['required']"
                />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-input label="House No./Lot/Bldg" 
                    v-model="address_information.permanent_address_1"
                />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-input label="Street/Subdivision/Purok" 
                    v-model="address_information.permanent_address_2"
                />
            </div>
        </div>
    </q-form>
</template>
<script>
    import { addressStore } from '../../stores/address';
    export default {
        data: () => {
            return {
                address_information: {
                    permanent_address_region_id: null,
                    permanent_address_province_id: null,
                    permanent_address_city_id: null,
                    permanent_address_barangay_id: null,
                    permanent_address_1: "",
                    permanent_address_2:"",
                    same_as_present_address: false,
                    present_address_region_id: null,
                    present_address_province_id: null,
                    present_address_city_id: null,
                    present_address_barangay_id: null,
                    present_address_1: "",
                    present_address_2:"",
                },
                regions_options_all: [],
                regions_options: [],
                is_filtered_regions_options: false,

                provinces_options_all: [],
                provinces_options: [],
                is_filtered_provinces_options: false,

                cities_options_all: [],
                cities_options: [],
                is_filtered_cities_options: false,

                barangays_options_all: [],
                barangays_options: [],
                is_filtered_barangays_options: false,

                regions_options_present_all: [],
                regions_options_present: [],
                is_filtered_regions_options_present: false,

                provinces_options_present_all: [],
                provinces_options_present: [],
                is_filtered_provinces_options_present: false,

                cities_options_present_all: [],
                cities_options_present: [],
                is_filtered_cities_options_present: false,

                barangays_options_present_all: [],
                barangays_options_present: [],
                is_filtered_barangays_options_present: false,
            }
        },
        methods: {
            validateForm(){
                return this.$refs.addressInformationForm.validate();
            },
            async getRegions() {
                await this.$addressStore.fetchAllRegions();
                this.regions_options = this.$addressStore.regionsDropdown;
            },
            async handleChangeRegion(){
                const region_code = this.address_information.permanent_address_region_id.region_code;
                await this.$addressStore.fetchProvinces(region_code);
                this.provinces_options = this.$addressStore.getProvinces.data;

                // reset province data
                this.is_filtered_provinces_options = false;
                this.address_information.permanent_address_province_id = null;

                // reset city data
                this.address_information.permanent_address_city_id = null;
                this.cities_options = [];

                // reset barangay data
                this.address_information.permanent_address_barangay_id = null;
                this.barangays_options = [];
            },
            async handleChangeProvince(){
                const province_code = this.address_information.permanent_address_province_id.province_code;
                await this.$addressStore.fetchCities(province_code);
                this.cities_options = this.$addressStore.getCities.data;

                // reset city data
                this.is_filtered_cities_options = false;
                this.address_information.permanent_address_city_id = null;

                // reset barangay data
                this.address_information.permanent_address_barangay_id = null;
                this.barangays_options = [];

            },
            async handleChangeCity(){
                const city_code = this.address_information.permanent_address_city_id.city_code;
                await this.$addressStore.fetchBarangays(city_code);
                this.barangays_options = this.$addressStore.getBarangays.data;

                // reset barangay data
                this.is_filtered_barangays_options = false;
                this.address_information.permanent_address_barangay_id = null;
            },
            filterRegionDropdown(val, update){
                update(() => {
                    const search = val?.toLowerCase() || "";
                    this.regions_options = this.$addressStore.getRegions.data.filter((i) => {
                        let name = i.name?.toLowerCase()?.includes(search) || false;
                        return search === "" ? true : name;
                    })
                })
            },
            filterProvinceDropdown(val, update){
                this.is_filtered_provinces_options = true;
                update(() => {
                    const search = val?.toLowerCase() || "";
                    this.provinces_options = this.$addressStore.getProvinces.data.filter((i) => {
                        let name = i.name?.toLowerCase()?.includes(search) || false;
                        return search === "" ? true : name;
                    })
                })
            },
            filterCityDropdown(val, update){
                this.is_filtered_cities_options = true;
                update(() => {
                    const search = val?.toLowerCase() || "";
                    this.cities_options = this.$addressStore.getCities.data.filter((i) => {
                        let name = i.name?.toLowerCase()?.includes(search) || false;
                        return search === "" ? true : name;
                    })
                })
            },
            filterBarangayDropdown(val, update){
                this.is_filtered_barangays_options = true;
                update(() => {
                    const search = val?.toLowerCase() || "";
                    this.barangays_options = this.$addressStore.getBarangays.data.filter((i) => {
                        let name = i.name?.toLowerCase()?.includes(search) || false;
                        return search === "" ? true : name;
                    })
                })
            },

            // PRESENT ADDRESS LOGIC
            async handleChangePresentRegion(){
                const region_code = this.address_information.present_address_region_id.region_code;
                await this.$addressStore.fetchProvinces(region_code, true);
                this.provinces_options_present = this.$addressStore.getProvincesPresent.data;

                // reset province data
                this.is_filtered_provinces_options_present = false;
                this.address_information.present_address_province_id = null;

                // reset city data
                this.address_information.present_address_city_id = null;
                this.cities_options_present = [];

                // reset barangay data
                this.address_information.present_address_barangay_id = null;
                this.barangays_options_present = [];
            },
            async handleChangePresentProvince(){
                const province_code = this.address_information.present_address_province_id.province_code;
                await this.$addressStore.fetchCities(province_code, true);
                this.cities_options_present = this.$addressStore.getCitiesPresent.data;

                // reset city data
                this.is_filtered_cities_options_present = false;
                this.address_information.present_address_city_id = null;

                // reset barangay data
                this.address_information.present_address_barangay_id = null;
                this.barangays_options_present = [];

            },
            async handleChangePresentCity(){
                const city_code = this.address_information.present_address_city_id.city_code;
                await this.$addressStore.fetchBarangays(city_code, true);
                this.barangays_options_present = this.$addressStore.getBarangaysPresent.data;

                // reset barangay data
                this.is_filtered_barangays_options_present = false;
                this.address_information.permanent_address_barangay_id = null;
            },
            filterRegionDropdownPresent(val, update){
                update(() => {
                    const search = val?.toLowerCase() || "";
                    this.regions_options_present = this.$addressStore.getRegions.data.filter((i) => {
                        let name = i.name?.toLowerCase()?.includes(search) || false;
                        return search === "" ? true : name;
                    })
                })
            },
            filterProvinceDropdownPresent(val, update){
                this.is_filtered_provinces_options_present = true;
                update(() => {
                    const search = val?.toLowerCase() || "";
                    this.provinces_options_present = this.$addressStore.getProvincesPresent.data.filter((i) => {
                        let name = i.name?.toLowerCase()?.includes(search) || false;
                        return search === "" ? true : name;
                    })
                })
            },
            filterCityDropdownPresent(val, update){
                this.is_filtered_cities_options_present = true;
                update(() => {
                    const search = val?.toLowerCase() || "";
                    this.cities_options_present = this.$addressStore.getCitiesPresent.data.filter((i) => {
                        let name = i.name?.toLowerCase()?.includes(search) || false;
                        return search === "" ? true : name;
                    })
                })
            },
            filterBarangayDropdownPresent(val, update){
                this.is_filtered_barangays_options_present = true;
                update(() => {
                    const search = val?.toLowerCase() || "";
                    this.barangays_options_present = this.$addressStore.getBarangaysPresent.data.filter((i) => {
                        let name = i.name?.toLowerCase()?.includes(search) || false;
                        return search === "" ? true : name;
                    })
                })
            }
        },
        mounted(){
            this.getRegions();
        },
        created(){
            this.$addressStore = addressStore();
        },
    }
</script>