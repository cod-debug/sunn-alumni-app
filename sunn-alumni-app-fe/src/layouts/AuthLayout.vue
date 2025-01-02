<template>
    <q-layout>
        <q-page-container class="relative">
            <router-view />
            <div class="background-top">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#fabd16"><path d="M0 1v99c134.3 0 153.7-99 296-99H0Z" opacity=".5"></path><path d="M1000 4v86C833.3 90 833.3 3.6 666.7 3.6S500 90 333.3 90 166.7 4 0 4h1000Z" opacity=".5"></path><path d="M617 1v86C372 119 384 1 196 1h421Z" opacity=".5"></path><path d="M1000 0H0v52C62.5 28 125 4 250 4c250 0 250 96 500 96 125 0 187.5-24 250-48V0Z"></path></svg>
            </div>
            <div class="background-bottom">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#fabd16"><path d="M0 1v99c134.3 0 153.7-99 296-99H0Z" opacity=".5"></path><path d="M1000 4v86C833.3 90 833.3 3.6 666.7 3.6S500 90 333.3 90 166.7 4 0 4h1000Z" opacity=".5"></path><path d="M617 1v86C372 119 384 1 196 1h421Z" opacity=".5"></path><path d="M1000 0H0v52C62.5 28 125 4 250 4c250 0 250 96 500 96 125 0 187.5-24 250-48V0Z"></path></svg>
            </div>
        </q-page-container>
    </q-layout>
</template>

<script>
    export default {

    }
</script>

<style scoped>
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