<template>
    <q-form ref="accountInformationForm">
        <div class="row">
            <div class="col-12 col-md-6 q-pa-sm">
                <q-input v-model="username" label="Username" :rules="['required']" />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-input v-model="email" label="Email" :rules="['required', 'email']" />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-input v-model="password" label="Password" :rules="['required']" :type="is_password_visible ? 'text': 'password'" />
            </div>
            <div class="col-12 col-md-6 q-pa-sm">
                <q-input v-model="confirm_password" label="Confirm Password" :type="is_confirm_password_visible ? 'text': 'password'"  />
            </div>
        </div>
    </q-form>
</template>
<script>
    export default {
        data: () => {
            return {
                username: "",
                email: "",
                password: "",
                confirm_password: "",

                is_password_visible: false,
                is_confirm_password_visible: false,
            }
        }
    }
</script>