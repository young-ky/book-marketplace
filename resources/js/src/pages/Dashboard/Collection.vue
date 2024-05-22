<template>
    <div>
        <h3>Collection</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">Book Author</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody v-for="bookCollection in bookCollections">
                <tr>
                    <th scope="row">
                        <a class="ripple" data-mdb-ripple-color="info" href="#!">
                            <img class="img-fluid rounded"
                                :src="`/storage/book_covers/${bookCollection.genre_id}/${bookCollection.user_id}/${bookCollection.id}/${bookCollection.book_cover}`" />
                        </a>
                    </th>
                    <td>{{ bookCollection.book_title }}</td>
                    <td>{{ bookCollection.author }}</td>
                    <td>
                        <router-link class="btn btn-dark" :to="{ name: 'collection.file', params: {file:bookCollection.id, data: bookCollection} }">
                            Open
                        </router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            bookCollections: [],
        }
    },
    methods: {
        async getCollections() {
            try {
                axios.defaults.headers.post['Authorization'] = `Bearer ${localStorage.getItem('access_token')}`
                const { data } = await axios.get('/api/get-collection')
                this.bookCollections = data
            }
            catch (e) {
                console.log('Log: ' + e)
            }
        }
    },
    created() {
        this.getCollections()
    }
}
</script>

<style lang="scss" scoped>
.rounded {
    width: 80px;
    height: 80px;
}
td {
    vertical-align: middle;
}
</style>
