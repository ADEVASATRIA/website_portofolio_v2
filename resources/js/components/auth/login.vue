<script setup>
    import { reactive , ref} from 'vue'
    import { useRouter } from 'vue-router'

    const router = useRouter()

    let form = reactive({
        email: '',
        password: '',
    })

    let error = ref('')

    const login = async() => {
        await axios.post('api/login',form)
        .then(response=>{
            //console.log(response)
            if (response.data.success) {
                localStorage.setItem('token',response.data.data.token)
                router.push('/admin/home')
            } else {
                error.value = response.data.message;
            }
        })
    }
    /*const login= async()=>{
        try{
            const response = await axios.post('api/login',form);
            if(response.data.success){
                localStorage.setItem('token',response.data.token);
            }else{
                error.value = response.data.message;
            }
        }catch(error){
            console.error(error);
            error.value ='terjadi kesalahan pada proses login.';
        }
    }*/
    /*const login = async()=>{
        await axios.post('/api/login',form)
            .then(response=>{
                if (response.data.success) {
                    localStorage.setItem('token', response.data.data.token)
                } else {
                    error.value = response.data.message;
                }
            })
    }*/
</script>

<template>
    <div class="login">
        <div class="formLogin">
            <p class="text-danger" v-if="error">{{ error }}</p>
            <form @submit.prevent="login">
                <input class="input_auth" type="email" placeholder="Enter email address" v-model="form.email" />
                <br>
                <input class="input_auth" type="password" placeholder="Enter Password" v-model="form.password"/>
                <br>
                <input type="submit" value="Login" class="input_auth submit"/>
            </form>
        </div>
    </div>
</template>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Fira sans', sans-serif;
        font-size: 16px;
    }
    .login{
        background-color: #6c5ce7;
        padding: 0;
        margin: 0;
        width: 100%;
        height: 100%;
        height: 100vh;
    }
    .formLogin{
        display: flex;
        align-items: center;
        width: 10.8em;
        height: 48em;
        margin: 0 auto 0 auto;
        overflow: hidden;
    }
    .input_auth{
        background-color: rgba(228, 232, 243, 0.8);
        background-position: 0.5em 0.6em;
        border: none;
        color: rgba(80, 80, 80, 1);
        padding: 0 0 0 0.3rem;
        margin: 0 0 lem 0;
        width: 10em;
        height: 2.1em;
        outline: none;
        transition: background-color 0.4s;
    }
    .input_auth:hover{
        background-color: rgba(255, 255, 255, 255);
    }
    .input_auth:focus{
        background-color: rgba(255, 255, 255, 255);
    }
    .submit{
        color: rgba(35, 35, 35, 0.8);
        background: rgba(220, 220, 220, 1);
        padding: 0;
        margin: 1.5em 0 0 0em;
        width: 10em;
        text-transform: uppercase;
        cursor: pointer;
        transition: background-color 0.4s;
    }

    .submit:hover{
        background: #43467f;
        color: #ffffff;
    }
    .submit:focus{
        background: #43467f;
        color: #ffffff;
    }

    .text-danger{
        color:red;
        font-size: 16px;
    }
</style>