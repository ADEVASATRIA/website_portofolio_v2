<script setup>
    import {useRouter} from "vue-router"
    const logout = () =>{
        localStorage.removeItem('token')
        router.push('/')
        
    }
</script>

<template>
    <h1>Welcome To admin overview dashboard</h1>
    <div>
        <router-link to="/">Home Page</router-link>
    </div>
    <br>
    <button @click="logout">
        log out
    </button>
</template>