<template>
    <q-form ref="personalInformationForm">
        <div class="row">
            <div class="col-12 col-md-4 q-pa-sm">
                <q-input v-model="personal_information.first_name" :rules="[$rules.required]" label="First Name" />
            </div>
            <div class="col-12 col-md-4 q-pa-sm">
                <q-input v-model="personal_information.middle_name" label="Middle Name" />
            </div>
            <div class="col-12 col-md-4 q-pa-sm">
                <q-input v-model="personal_information.last_name" :rules="[$rules.required]" label="Last Name" />
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 q-pa-sm">
                <q-input v-model="personal_information.date_of_birth" label="Date of Birth (YYYY/MM/DD)" mask="date" :rules="['date', $rules.required]">
                    <template v-slot:append>
                        <q-icon name="event" class="cursor-pointer">
                            <q-popup-proxy cover transition-show="scale" transition-hide="scale">
                                <q-date v-model="personal_information.date_of_birth">
                                    <div class="row items-center justify-end">
                                        <q-btn v-close-popup label="Close" color="primary" flat />
                                    </div>
                                </q-date>
                            </q-popup-proxy>
                        </q-icon>
                    </template>
                </q-input>
            </div>
            <div class="col-12 col-md-4 q-pa-sm">
                <q-select :options="gender_dropdown" v-model="personal_information.gender" label="Gender" />
            </div>
            <div class="col-12 col-md-4 q-pa-sm">
                <q-select :options="civil_status_dropdown" v-model="personal_information.civil_status" label="Civil Status" />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-select :options="departments_dropdown" 
                    :disable="departments_dropdown.length === 0" 
                    v-model="personal_information.department_id" 
                    :option-value="(option) => option === null ? null : option.id"
                    :option-label="(option) => option === null ? null : option.department_name"
                    @update:model-value="handleChangeDepartment"
                label="Department" />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-select :options="course_dropdown" 
                    :disable="course_dropdown.length === 0" 
                    v-model="personal_information.course_id" 
                    :option-value="(option) => option === null ? null : option.id"
                    :option-label="(option) => option === null ? null : option.course_name"
                label="Course" />
            </div>
        </div>
    </q-form>
</template>

<script>
    import { departmentStore } from 'stores/department';

    export default {
        props: {
            default_val: {
                type: Object,
                default: null
            },
        },
        data: () => {
            return {
                gender_dropdown: ['Male', 'Female'],
                civil_status_dropdown: ['Single', 'Married', 'Divorced', 'Widowed', 'Separated', 'Annulled'],
                departments_dropdown: [],
                course_dropdown: [],
                personal_information: {
                    first_name: "",
                    middle_name: "",
                    last_name: "",
                    date_of_birth: "",
                    gender: "",
                    civil_status: "",
                    permanent_address_region_id: null,
                    department_id: null,
                    course_id: null
                },
            }
        },
        methods: {
            validateForm(){
                return this.$refs.personalInformationForm.validate();
            },
            async getAllDepartments(){
                await this.$departmentStore.fetchAllDepartments();
                this.departments_dropdown = this.$departmentStore.getDepartmentsDropdown?.data || [];
            },
            handleChangeDepartment(){
                this.personal_information.course_id = null;
                this.course_dropdown = this.personal_information.department_id?.courses || [];
            },
        },
        mounted(){
            this.getAllDepartments();
            if(this.default_val !== null){
                for (let column in this.default_val) {
                    this[column] = this.default_val[column];
                }
            }
        },
        created(){
            this.$departmentStore = departmentStore();
        },
    }
</script>