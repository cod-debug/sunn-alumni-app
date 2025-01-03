<template>
    <q-page class="flex flex-center q-pa-md bg-black">
        <div class="w-100 shadow-5" id="registerForm">
            <div class="full-width">
                <div class="text-center">
                    <div>
                        <img src="/assets/images/logo.png" alt="SUNN logo" width="200" class="q-mx-auto block" />
                        <h4 class="text-secondary q-my-sm">Sign up</h4>
                    </div>
                    <p class="text-grey-8">Create your account.</p>
                    
                    <div class="q-pa-lg">
                        <q-stepper
                            v-model="sign_up_step"
                            header-nav
                            ref="signUpStepper"
                            color="secondary"
                            animated
                        >
                            <q-step
                                :name="1"
                                title="Personal Information"
                                :icon="sign_up_step > 1 ? 'check' : ''"
                                :color="sign_up_step > 1 ? 'secondary' : ''"
                                :done="sign_up_step > 1"
                                :header-nav="sign_up_step > 1"
                            >
                                <app-personal-information ref="personalInformation" :default_val="personal_information_app_current_data" />
                            </q-step>
                            <q-step
                                :name="2"
                                title="Address"
                                icon="place"
                                :color="sign_up_step > 2 ? 'secondary' : ''"
                                :done="sign_up_step > 2"
                                :header-nav="sign_up_step > 2"
                            >
                                <app-address-information ref="addressInformation" :default_val="address_app_current_data" />
                            </q-step>
                            <q-step
                                :name="3"
                                title="Account Information"
                                icon="person"
                                :done="sign_up_step > 3"
                                :header-nav="sign_up_step > 3"
                            >
                                <app-account-information ref="accountInformation" />
                                <div class="text-right">
                                    <q-btn @click="submitForm" color="secondary" label="Register" class="q-mt-md" icon-right="check_circle" />
                                </div>
                            </q-step>
                        </q-stepper>
                        <q-stepper-navigation>
                            <q-btn flat type="button" @click="handleBack()" :disabled="sign_up_step === 1" color="primary" label="Back" class="q-ml-sm" icon="chevron_left" />
                            <q-btn flat type="button" @click="handleNext()" :disabled="sign_up_step === 3" color="primary" label="Next" class="q-ml-sm" icon-right="chevron_right" />
                        </q-stepper-navigation>
                        <q-separator class="q-my-sm" />
                        <div class="text-center">
                            <p class="q-mt-lg">Already have an account? </p>
                            <q-btn :to="{ name: 'auth-login' }" label="Back to Log in" size="sm" color="grey-6" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </q-page>
</template>

<script>
    import PersonalInformation from 'components/sign-up/PersonalInformation.vue';
    import AddressInformation from 'components/sign-up/AddressInformation.vue';
    import AccountInformation from 'components/sign-up/AccountInformation.vue';
    import { authStore } from 'stores/auth';
    export default {
        data: () => {
            return {
                sign_up_step: 1,
                region_options: [],
                address_app_current_data: null,
                account_app_current_data: null,
                personal_information_app_current_data: null,
            }
        },
        methods: {
            async handleNext(){

                // first step
                if(this.sign_up_step === 1){
                    const personal_information_ref = this.$refs.personalInformation;
                    const is_valid_personal_information_form = await personal_information_ref.validateForm();

                    if(!is_valid_personal_information_form){
                        return false;
                    }

                    this.sign_up_step++;

                    this.personal_information_app_current_data = personal_information_ref.$data;
                    return false;
                }

                // second step
                if(this.sign_up_step === 2){
                    const address_information_ref = this.$refs.addressInformation;
                    const is_valid_address_information = await address_information_ref.validateForm();

                    if(!is_valid_address_information){
                        return false;
                    }

                    this.address_app_current_data = address_information_ref.$data;
                    this.sign_up_step++;

                    return false;
                }

            },

            async handleBack(){
                if(this.sign_up_step === 2){
                    const address_information_ref = this.$refs.addressInformation;

                    this.address_app_current_data = address_information_ref.$data;
                    this.sign_up_step--;
                    return false;
                }
                if(this.sign_up_step === 3){
                    const account_information_ref = this.$refs.accountInformation;
                    
                    this.account_app_current_data = account_information_ref.$data;

                    this.sign_up_step--;
                    return false;
                }

            },

            async submitForm(){
                if(this.sign_up_step !== 3){
                    return false;
                }
                
                const account_information_ref = this.$refs.accountInformation;

                const is_valid_form = await account_information_ref.validateForm();

                if(!is_valid_form){
                    return false;
                }
                
                this.account_app_current_data = account_information_ref.$data;

                const personal_information = this.personal_information_app_current_data.personal_information;
                const address_information = this.address_app_current_data.address_information;
                const account_information = this.account_app_current_data.account_information;

                if(address_information.same_as_present_address){
                    address_information.permanent_address_region_id = address_information.present_address_region_id;
                    address_information.permanent_address_province_id = address_information.present_address_province_id;
                    address_information.permanent_address_city_id = address_information.present_address_city_id;
                    address_information.permanent_address_barangay_id = address_information.present_address_barangay_id;
                    address_information.permanent_address_1 = address_information.present_address_1;
                    address_information.permanent_address_2 = address_information.present_address_2;
                }
                
                let payload = {
                    ...personal_information,
                    department_id: personal_information.department_id.id,
                    course_id: personal_information.course_id.id,
                    ...address_information,
                    permanent_address_region_id: address_information.permanent_address_region_id.id,
                    permanent_address_province_id: address_information.permanent_address_province_id.id,
                    permanent_address_city_id: address_information.permanent_address_city_id.id,
                    permanent_address_barangay_id: address_information.permanent_address_barangay_id.id,
                    present_address_region_id: address_information.present_address_region_id.id,
                    present_address_province_id: address_information.present_address_province_id.id,
                    present_address_city_id: address_information.present_address_city_id.id,
                    present_address_barangay_id: address_information.present_address_barangay_id.id,
                    ...account_information
                }

                await this.$authStore.registerUser(payload);
                const response = this.$authStore.getRegisterRequestData;
                console.log(response);
            }
        },
        components: {
            appPersonalInformation: PersonalInformation,
            appAddressInformation: AddressInformation,
            appAccountInformation: AccountInformation,
        },
        created(){
            this.$authStore = authStore();
        },
    }
</script>

<style scoped>
.relative {
    position: relative;
}

#registerForm {
    width: 992px;
    border-radius: 10px;
    max-width: 90%;
    z-index: 20;
    position: relative;
    background-color: white;
}
</style>