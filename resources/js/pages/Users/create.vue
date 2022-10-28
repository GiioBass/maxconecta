<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>
                    Crear usuario
                </h2>
            </div>
            <div class="card-body d-flex justify-content-center ">
                <div class="w-75 mt-3">
                    <form class="form-control" @submit.prevent="sendData">
                        <div class="m-3">
                            <label for="name" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" v-model="user.name" aria-describedby="name">
                        </div>
                        <div class="m-3">
                            <label for="user_name" class="form-label">Nombre de usuario:</label>
                            <input type="text" class="form-control" v-model="user.user_name"
                                   aria-describedby="user_name">
                        </div>
                        <div class="m-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" v-model="user.email" aria-describedby="email">
                        </div>
                        <div class="m-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" v-model="user.password"
                                   aria-describedby="password">
                        </div>

                        <div class=" m-4 d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="submit">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import {ref} from 'vue';
import axios from 'axios';
import {useRouter} from 'vue-router';

const user = ref({});
const response = ref(null);
const router = useRouter();

const redirect = () => {
    router.push('/users');
}
const sendData = async () => {
    try {
        const res = await axios.post(`/user`, user)
        response.value = res.data
        if (response.value.status) {
            redirect();
        }
    } catch (e) {
        console.log(e)
    } finally {
    }
}

</script>
