<template>
    <q-form ref="accountInformationForm">
        <div class="row">
            <div class="col-12 col-md-6 q-pa-sm">
                <q-input v-model="account_information.username" label="Username" :rules="[$rules.required]" />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-input v-model="account_information.email" label="Email" :rules="[$rules.required, $rules.email]" />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-input v-model="account_information.password" 
                label="Password" 
                :rules="[$rules.required]" 
                :type="is_password_visible ? 'text': 'password'">
                    <template v-slot:append>
                        <q-btn flat @click="is_password_visible = !is_password_visible">
                            <q-icon :name="is_password_visible ? 'visibility' : 'visibility_off'" />
                        </q-btn>
                    </template>
                </q-input>
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-input v-model="account_information.confirm_password" label="Confirm Password" :type="is_confirm_password_visible ? 'text': 'password'">
                    <template v-slot:append>
                        <q-btn flat @click="is_confirm_password_visible = !is_confirm_password_visible">
                            <q-icon :name="is_confirm_password_visible ? 'visibility' : 'visibility_off'" />
                        </q-btn>
                    </template>
                </q-input>
            </div>
        </div>
    </q-form>
</template>
<script>
    export default {
        data: () => {
            return {
                account_information: {
                    username: "",
                    email: "",
                    password: "",
                    confirm_password: "",
                },

                is_password_visible: false,
                is_confirm_password_visible: false,
            }
        },
        methods: {
            validateForm(){
                return this.$refs.accountInformationForm.validate();
            },
        }
    }
</script>