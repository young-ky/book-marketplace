<template>
    <div class="container py-3">
        <h2 class="px-3">{{ $route.params.genreTitle }}</h2>
        <hr class="mx-3">
        <Loading :isLoading="isLoading">
            <div class="d-flex flex-wrap justify-content-start">
                <div v-for="book in books">
                    <BookItem :book="book" :bookTitle="bookTitles[book.id - 1]"/>
                </div>
            </div>
        </Loading>
    </div>
</template>

<script>
import BookItem from './BookItem.vue'
import Loading from '../components/Loading.vue'

export default {
    data() {
        return {
            books: [],
            bookTitles: [],
            genreId: null,
            isLoading: true
        }
    },
    components: {
        BookItem,
        Loading
    },
    methods: {
        async getBook() {
            try {
                this.genreId = this.$route.params.genreId
                const { data } = await axios.get('/api/get-book?genreId=' + this.genreId)
                data.forEach(item => {
                    this.bookTitles.push(item.book_title)
                    item.book_title = item.book_title.replace(/[\s\/]/g, '-').toLowerCase()
                });
                this.books = data
                this.isLoading = false
            }
            catch (e) {
                console.log('Log: ' + e)
            }
        }
    },
    created() {
        if (!this.$route.params.genreId) {
            console.log('Invalid Query')
            this.$router.push({ name: 'genres' })
            return
        }
        this.getBook()
    }
}
</script>

<style lang="scss" scoped>
.d-flex {
    margin: 0 auto;
}
</style>
