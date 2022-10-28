<template>
    <div class="container">
        <div>
            <router-link class="btn btn-primary" to="users/create">Crear usuario</router-link>
        </div>
        <div class="card" >
            <div class="card-body">
                <h2 class="card-title ">Usuarios</h2>
                <div class="mt-5">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Nombre de usuario</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="user in users" key="movie.id">
                            <td>{{ user.name }}</td>
                            <td>{{ user.user_name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <router-link class="btn btn-primary" :to="`/users/edit/${user.id}`">Editar</router-link>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { RouterLink } from 'vue-router';

const users = ref(null)

const getData = async () => {
    try {
        const res = await axios.get(`/user`)
        users.value = res.data.data
    } catch (e) {
        console.log(e)
    } finally {
    }
}
getData()
</script>

