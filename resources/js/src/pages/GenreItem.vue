<template>
    <router-link class="card text-center m-4" :to="{ name: 'genres.genre', params: { genre: genre.genre, genreId: genre.id, genreTitle: genreTitle} }">
        <img class="card-img-top" :src="'/images/genre_images/' + genre.image" />
        <div class="card-body">
            <h5 class="card-title">{{ genreTitle }}</h5>
        </div>
    </router-link>
</template>

<script>
export default {
    props: {
        genreTitle: String,
        genre: Object
    }
}
</script>

<style lang="scss" scoped>
.card {
    width: 18rem;
    .card-img-top {
        width: 100%;
        height: 200px;
    }
    .card-title {
        color: dimgray;
    }
}
</style>