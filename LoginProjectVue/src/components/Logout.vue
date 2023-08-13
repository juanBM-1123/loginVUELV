<script setup>
import { useAuthStore } from '../stores/auth';
const userStore = useAuthStore();
</script>

<template>
    <div>
        <button @click="userStore.logout()">
            Cerrra sesion
        </button>
    </div>
</template>

<style scoped>

</style>