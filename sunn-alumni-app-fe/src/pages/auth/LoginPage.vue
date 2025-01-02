<template>
    <q-page class="flex flex-center q-pa-md bg-black">
        <div class="w-100 shadow-5" id="loginForm">
            <div class="full-width">
                <img src="/assets/images/logo.png" alt="SUNN logo" width="300" class="q-mx-auto block" />
                <div class="text-center">
                    <h4 class="text-secondary q-my-sm">Welcome Back!</h4>
                    <p class="text-grey-8">Log in to your account</p>
                </div>
            </div>
            <q-form @submit.prevent="submitForm" class="q-pa-lg" ref="loginForm">
                <q-input bottom-slots color="green" v-model="username" :rules="[$rules.required]" greedy
                    label="Username / Email">
                    <template v-slot:append>
                        <q-icon name="account_circle" />
                    </template>
                </q-input>
                <q-input bottom-slots color="green" type="password" v-model="password" :rules="[$rules.required]" greedy
                    label="Password">
                    <template v-slot:append>
                        <q-icon name="lock" />
                    </template>
                </q-input>
                <div class="text-center q-mt-sm">
                    <q-btn color="secondary" type="submit" label="Log In" class="full-width" icon-right="login" />
                    <p class="q-my-md">Don't have an account yet? </p>
                    <q-btn :to="{ name: 'auth-register' }" label="register" size="sm" color="grey-6" />
                </div>
            </q-form>
        </div>
    </q-page>
</template>

<script>
export default {
    data: () => {
        return {
            username: "",
            password: "",
        }
    },
    methods: {
        async submitForm() {
            if (!this.$refs.loginForm.validate()) {
                return false;
            }
            console.log('LOGIN!');
        }
    }
}
</script>

<style scoped>
.relative {
    position: relative;
}

#loginForm {
    width: 500px;
    border-radius: 10px;
    max-width: 90%;
    z-index: 20;
    position: relative;
    background-color: white;
}
</style>