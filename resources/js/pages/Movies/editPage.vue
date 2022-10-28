<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>
                    Crear película
                </h2>
            </div>
            <div class="card-body d-flex justify-content-center ">
                <div class="w-75 mt-3">
                    <form class="form-control" @submit.prevent="sendData">
                        <div class="m-3">
                            <label for="title" class="form-label">Titulo:</label>
                            <input type="text" class="form-control" v-model="movie.title" aria-describedby="title">
                        </div>
                        <div class="m-3">
                            <label for="category" class="form-label">Category:</label>
                            <input type="text" class="form-control" v-model="movie.category"
                                   aria-describedby="category">
                        </div>
                        <div class="m-3">
                            <label for="description" class="form-label">Descripción:</label>
                            <input type="text" class="form-control" v-model="movie.description"
                                   aria-describedby="description">
                        </div>
                        <div class="m-3">
                            <label for="age" class="form-label">Año:</label>
                            <input type="number" class="form-control" v-model="movie.age" aria-describedby="age">
                        </div>
                        <div class="m-3">
                            <label for="quantity" class="form-label">Cantidad:</label>
                            <input type="number" class="form-control" v-model="movie.quantity"
                                   aria-describedby="quantity">
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

<script setup >
import { ref } from 'vue';
import { useRouter, useRoute} from 'vue-router';
import axios from 'axios';

const route = useRoute();
const router = useRouter();
const idMovie = ref(route.params.id);
const movie = ref({})
const response = ref(null)


const redirect = () => {
    router.push('/movies');
}

const getData = async () => {
    try {
        const res = await axios.get(`/movie/${idMovie.value}`)
        movie.value = res.data
    } catch (e) {
        console.log(e)
    } finally {
    }
}
const sendData = async () => {
    try {
        const res = await axios.put(`/movie/${idMovie.value}`, movie)
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

