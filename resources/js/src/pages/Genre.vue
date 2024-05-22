<template>
    <div class="p-4">
        <Loading :isLoading="isLoading">
            <div class="d-flex flex-wrap justify-content-center">
                <div v-for="genre in genres">
                    <GenreItem :genreTitle="genreTitles[genre.id - 1]" :genre="genre" />
                </div>
            </div>
        </Loading>
    </div>
</template>

<script>
import axios from 'axios'
import cacheUtils from '../../utils/cacheUtils'
import Loading from '../components/Loading.vue'
import GenreItem from './GenreItem.vue'

export default {
    name: 'genre',
    data() {
        return {
            genres: [],
            genreTitles: [],
            isLoading: true
        }
    },
    components: {
        Loading,
        GenreItem
    },
    methods: {
        async getGenre() {
            if (cacheUtils.isOnCache("genres")) {
                this.genres = cacheUtils.getFromCache("genres")
                this.genreTitles = cacheUtils.getFromCache("genreTitles")
                this.isLoading = false
                console.log("Data Exist")
                return
            }
            try {
                const { data } = await axios.get('/api/get-genre')
                data.forEach(item => {
                    this.genreTitles.push(item.genre)
                    item.genre = item.genre.replace(/[\s\/]/g, '-').toLowerCase()
                });
                this.genres = data
                cacheUtils.addToCache("genres", data)
                cacheUtils.addToCache("genreTitles", this.genreTitles)
                this.isLoading = false
            }
            catch (e) {
                console.log(e.message)
            }
        }
    },
    created() {
        this.getGenre()
    }
}
</script>

<style lang="scss" scoped>

</style>
