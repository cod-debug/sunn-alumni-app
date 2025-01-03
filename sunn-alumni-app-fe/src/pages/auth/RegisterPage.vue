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
                    
                    <q-form class="q-pa-lg" ref="registerForm">
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
                                <app-personal-information ref="personalInformation" :default_val="sign_up_form.personal_information" />
                            </q-step>
                            <q-step
                                :name="2"
                                title="Address"
                                icon="place"
                                :color="sign_up_step > 2 ? 'secondary' : ''"
                                :done="sign_up_step > 2"
                                :header-nav="sign_up_step > 2"
                            >
                                <app-address-information ref="addressInformation" />
                            </q-step>
                            <q-step
                                :name="3"
                                title="Account Information"
                                icon="person"
                                :done="sign_up_step > 3"
                                :header-nav="sign_up_step > 3"
                            >
                                <q-select v-model="sign_up_form.region" :options="options" label="Region" />
                            </q-step>
                        </q-stepper>
                        <q-stepper-navigation>
                            <q-btn flat type="button" @click="handleBack()" :disabled="sign_up_step === 1" color="primary" label="Back" class="q-ml-sm" icon="chevron_left" />
                            <q-btn flat type="button" @click="handleNext()" :disabled="sign_up_step === 3" color="primary" label="Next" class="q-ml-sm" icon-right="chevron_right" />
                            <q-btn @click="submitForm" v-if="sign_up_step === 3" color="secondary" label="Register" class="q-ml-sm" icon-right="check_circle" />
                        </q-stepper-navigation>
                        <q-separator class="q-my-sm" />
                        <div class="text-center">
                            <p class="q-mt-lg">Already have an account? </p>
                            <q-btn :to="{ name: 'auth-login' }" label="Back to Log in" size="sm" color="grey-6" />
                        </div>
                    </q-form>
                </div>
            </div>
        </div>
    </q-page>
</template>

<script>
    import PersonalInformation from 'components/sign-up/PersonalInformation.vue';
    import AddressInformation from 'components/sign-up/AddressInformation.vue';
    export default {
        data: () => {
            return {
                sign_up_step: 1,
                region_options: [],
                sign_up_form: {
                    personal_information: null,
                    address_information: null,
                }
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

                    this.sign_up_form.personal_information = personal_information_ref.personal_information;
                    return false;
                }

                // second step
                if(this.sign_up_step === 2){
                    const address_information_ref = this.$refs.addressInformation;
                    const is_valid_address_information = await address_information_ref.validateForm();

                    if(!is_valid_address_information){
                        return false;
                    }

                    // add condition for validation of second step here...
                    this.sign_up_step++;
                    this.sign_up_form.address_information = address_information_ref.address_information;

                    return false;
                }

            },

            handleBack(){
                    this.sign_up_step--;

            },

            async submitForm(){
                if (!this.$refs.registerForm.validate()) {
                    return false;
                }
                const personal_information_data = this.$refs.personalInformation.personal_information;

                console.log(personal_information_data);
            }
        },
        components: {
            appPersonalInformation: PersonalInformation,
            appAddressInformation: AddressInformation,
        }
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