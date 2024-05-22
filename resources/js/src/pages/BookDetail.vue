<template>
    <div class="container">
        <img class="img-fluid rounded my-4"
            :src="`/storage/book_covers/${data.genre_id}/${data.user_id}/${data.id}/${data.book_cover}`" />
        <h2>{{ $route.params.bookTitle }}</h2>
        <button type="submit" :disabled="isDisabled" @click.prevent="purchaseBook"
            class="btn btn-dark my-4">Purchase Book</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isDisabled: false,
            data: {}
        }
    },
    methods: {
        getData() {
            this.data = this.$route.params.data
            console.log(this.$route.params.data)
        },
        async purchaseBook() {
            try {
                this.isDisabled = true;
                axios.defaults.headers.post['Authorization'] = `Bearer ${localStorage.getItem('access_token')}`
                const {data} = await axios.post('/api/purchase-book', this.data)
                console.log(data)
                this.$router.push({ name: 'collection' })
            }
            catch (e) {
                console.log('Log: ' + e)
                this.isDisabled = false;
            }
        }
    },
    created() {
        if (!this.$route.params.data) {
            console.log('Invalid Query')
            this.$router.push({ name: 'genres' })
            return
        }
        this.getData()
    }
}
</script>

<style lang="scss" scoped>
.container {
    justify-content: center;
    text-align: center;
}
.img-fluid {
    width: 250px;
    height: 250px;
}
</style>