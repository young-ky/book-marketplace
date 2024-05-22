<template>
    <router-link class="card text-center m-3" :to="{ name: 'bookDetail.book', params: { data: book, book: book.book_title, bookTitle: bookTitle } }">
        <img class="card-img-top"
            :src="`/storage/book_covers/${book.genre_id}/${book.user_id}/${book.id}/${book.book_cover}`" />
        <div class="card-body">
            <h5 class="card-title">{{ bookTitle }}</h5>
        </div>
    </router-link>
</template>

<script>
export default {
    props: {
        bookTitle: String,
        book: Object
    },
    methods: {
        //
    }
}
</script>

<style lang="scss" scoped>
.card {
    width: 15rem;
    .card-img-top {
        width: 100%;
        height: 200px;
    }
    .card-title {
        color: dimgray;
    }
}
</style>