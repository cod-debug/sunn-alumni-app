<template>
    <q-page class="flex flex-center relative q-pa-md">
        <div class="background-top">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#fabd16"><path d="M0 1v99c134.3 0 153.7-99 296-99H0Z" opacity=".5"></path><path d="M1000 4v86C833.3 90 833.3 3.6 666.7 3.6S500 90 333.3 90 166.7 4 0 4h1000Z" opacity=".5"></path><path d="M617 1v86C372 119 384 1 196 1h421Z" opacity=".5"></path><path d="M1000 0H0v52C62.5 28 125 4 250 4c250 0 250 96 500 96 125 0 187.5-24 250-48V0Z"></path></svg>
        </div>
        <div class="w-100 shadow-5" id="loginForm">
            <div class="full-width">
                <img src="/assets/images/logo.png" alt="SUNN logo" width="300" class="q-mx-auto block" />
                <div class="text-center">
                    <h4 class="text-secondary q-my-sm">Welcome Back!</h4>
                    <p class="text-grey-8">Log in to your account</p>
                </div>
            </div>
            <q-form @submit.prevent="submitForm" class="q-pa-lg" ref="loginForm">
                <q-input bottom-slots 
                color="green" 
                v-model="username" 
                :rules="[$rules.required]"
                greedy
                label="Username / Email">
                    <template v-slot:append>
                        <q-icon name="account_circle" />
                    </template>
                </q-input>
                <q-input bottom-slots 
                color="green" 
                type="password" 
                v-model="password" 
                :rules="[$rules.required]"
                greedy
                label="Password">
                    <template v-slot:append>
                        <q-icon name="lock" />
                    </template>
                </q-input>
                <div class="text-center q-mt-sm">
                    <q-btn color="secondary" type="submit" label="Log In" class="full-width" icon-right="login" />
                    <p class="q-my-md" >Don't have an account yet? </p>
                    <q-btn :to="{ name: 'auth-register' }" label="register" size="sm" color="grey-6" />
                </div>
            </q-form>
        </div>
        <div class="background-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#fabd16"><path d="M0 1v99c134.3 0 153.7-99 296-99H0Z" opacity=".5"></path><path d="M1000 4v86C833.3 90 833.3 3.6 666.7 3.6S500 90 333.3 90 166.7 4 0 4h1000Z" opacity=".5"></path><path d="M617 1v86C372 119 384 1 196 1h421Z" opacity=".5"></path><path d="M1000 0H0v52C62.5 28 125 4 250 4c250 0 250 96 500 96 125 0 187.5-24 250-48V0Z"></path></svg>
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
            async submitForm(){
                if(!this.$refs.formRef.validate()) {
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

    body {
        background-color: aqua;
    }
    
    #loginForm {
        width: 500px;
        border-radius: 10px;
        max-width: 90%;   
        z-index: 20;
        position: relative;
        background-color: white;
    }

    .background-top {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }

    .background-bottom {
        position: absolute;
        bottom: 0;
        transform: scale(-1);
        left: 0;
        width: 100%;
    }
</style>