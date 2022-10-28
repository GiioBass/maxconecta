<template>
<div class="container">
    <div>
        <router-link class="btn btn-primary" to="movies/create">Crear película</router-link>
    </div>
    <div class="card" >
        <div class="card-body">
            <h2 class="card-title ">Películas</h2>
            <div class="mt-5">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Año</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="movie in movies" key="movie.id">
                        <td>{{ movie.title }}</td>
                        <td>{{ movie.description }}</td>
                        <td>{{ movie.category }}</td>
                        <td>{{ movie.age }}</td>
                        <td>{{ movie.quantity }}</td>
                        <td>
                            <router-link class="btn btn-primary" :to="`/movies/edit/${movie.id}`">Editar</router-link>
                        </td>
                        {{movie.id}}
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

const movies = ref(null)

const getData = async () => {
    try {
        const res = await axios.get(`/movie`)
        movies.value = res.data.data
    } catch (e) {
        console.log('Catch')
        console.log(e)
    } finally {
    }
}
getData()
</script>

