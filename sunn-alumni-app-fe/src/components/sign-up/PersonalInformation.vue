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
        </div>
    </q-form>
</template>

<script>
    export default {
        props: {
            default_val: {
                type: Object
            }
        },
        data: () => {
            return {
                gender_dropdown: ['Male', 'Female'],
                civil_status_dropdown: ['Single', 'Married', 'Divorced', 'Widowed', 'Separated', 'Annulled'],
                personal_information: {
                    first_name: "",
                    middle_name: "",
                    last_name: "",
                    date_of_birth: "",
                    gender: "",
                    civil_status: ""
                }
            }
        },
        methods: {
            validateForm(){
                return this.$refs.personalInformationForm.validate();
            }
        },
        updated(){
            this.personal_information = this.default_val;
        },
    }
</script>