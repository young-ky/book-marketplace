<template>
    <div>
        <h3>Publish Book</h3>
        <section class="section py-5 border rounded justify-content-center my-3">
            <form autocomplete="off">
                <div class="input-group mb-4">
                    <input type="text" v-model="form.bookTitle" class="form-control" placeholder="Book Title" />
                </div>

                <div class="input-group mb-4">
                    <select class="form-select" v-model="form.genreId">
                        <option value="0" selected>Select Book Genre</option>
                        <option :value="genre.id" v-for="genre in genres" :key="genre.id">{{ genre.genre }}</option>
                    </select>
                </div>

                <div class="input-group mb-4">
                    <span class="input-group-text">Book Cover</span>
                    <input type="file" @change="changeBookCover" class="form-control" id="bookCover" />
                </div>

                <div class="input-group mb-4">
                    <input type="number" v-model="form.bookPage" class="form-control" placeholder="Total Page">
                </div>

                <div class="input-group mb-4">
                    <input type="number" v-model="form.previewPage" class="form-control" placeholder="Preview Page">
                </div>

                <div class="input-group mb-4">
                    <input type="number" v-model="form.bookPrice" class="form-control" placeholder="Book Price">
                </div>

                <div class="input-group mb-4">
                    <span class="input-group-text">Book File</span>
                    <input type="file" @change="changeBookFile" class="form-control" id="bookFile" />
                </div>

                <button type="submit" @click.prevent="publishSubmit"
                    class="btn btn-dark btn-block mb-4">Publish</button>
            </form>
        </section>
    </div>
</template>

<script>
import axios from 'axios'
import cacheUtils from '../../../utils/cacheUtils'

export default {
    data() {
        return {
            form: {
                bookTitle: '',
                bookPage: null,
                previewPage: null,
                bookPrice: null,
                bookAuthor: '',
                genreId: 0,
                userId: null,
            },
            formData: new FormData(),
            genres: []
        }
    },
    methods: {
        changeBookCover(event) {
            this.formData.append('bookCover', event.target.files[0])
        },

        changeBookFile(event) {
            this.formData.append('bookFile', event.target.files[0])
        },

        async setAuthor() {
            try {
                axios.defaults.headers.post['Authorization'] = `Bearer ${localStorage.getItem('access_token')}`
                const { data } = await axios.get('/api/user')
                this.form.bookAuthor = data.first_name + ' ' + data.last_name
                this.form.userId = data.id
            }
            catch (e) {
                console.log('Log: ' + e)
            }
        },

        async getGenre() {
            if (cacheUtils.isOnCache("genres")) {
                this.genres = cacheUtils.getFromCache("genres")
                return
            }
            try {
                const { data } = await axios.get('/api/get-genre')
                data.forEach(item => {
                    item.genre = item.genre.replace(/[\s\/]/g, '-').toLowerCase()
                });
                this.genres = data
                cacheUtils.addToCache("genres", data)
            }
            catch (e) {
                console.log(e.message)
            }
        },

        async publishSubmit() {
            this.formData.append('bookTitle', this.form.bookTitle)
            this.formData.append('bookPage', this.form.bookPage)
            this.formData.append('previewPage', this.form.previewPage)
            this.formData.append('bookPrice', this.form.bookPrice)
            this.formData.append('bookAuthor', this.form.bookAuthor)
            this.formData.append('genreId', this.form.genreId)
            this.formData.append('userId', this.form.userId)
            try {
                await axios.post('/api/publish-book', this.formData)
            }
            catch (e) {
                console.log('Log: ' + e)
            }
        }
    },
    created() {
        this.getGenre()
        this.setAuthor()
    }
}
</script>

<style lang="scss" scoped>
.section {
    padding-left: 30%;
    padding-right: 30%;
}

.input-group-text {
    color: dimgrey;
    background-color: lightgrey;
    user-select: none;
}
</style>
