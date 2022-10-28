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
                            <input type="text" class="form-control" v-model="user.user_name" aria-describedby="user_name">
                        </div>
                        <div class="m-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" v-model="user.email" aria-describedby="email">
                        </div>
                        <div class="m-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" v-model="user.password" aria-describedby="password">
                        </div>

                        <div class=" m-4 d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="submit">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup >
import { ref } from 'vue';
import { useRouter, useRoute} from 'vue-router';
import axios from 'axios';

const route = useRoute();
const router = useRouter();
const idUser = ref(route.params.id);
const user = ref({})
const response = ref(null)


const redirect = () => {
    router.push('/users');
}

const getData = async () => {
    try {
        const res = await axios.get(`/user/${idUser.value}`)
        user.value = res.data
    } catch (e) {
        console.log(e)
    } finally {
    }
}
const sendData = async () => {
    try {
        const res = await axios.put(`/user/${idUser.value}`, user)
        response.value = res.data
        if (response.value.status) {
            redirect();
        }
    } catch (e) {
        console.log(e)
    } finally {
    }
}
getData()
</script>

