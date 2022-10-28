<template>

    <div class="container">

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <span class="navbar-brand" href="#">Navbar</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link class="nav-link active" aria-current="page" to="/home">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/movies">Peliculas</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/users">Usuarios</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
</template>

<script setup>
import { RouterLink } from 'vue-router';
</script>

