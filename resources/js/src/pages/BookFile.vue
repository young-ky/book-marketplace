<template>
    <div class="container">
        <div class="app-header">
            <template v-if="isLoading">
                Loading...
            </template>
            <template v-else>
                <span>
                    <button class="btn btn-dark btn-floating btn-sm" :disabled="page <= 1" @click="page--">
                        <i class="fas fa-angle-left"></i>
                    </button>
                    {{ page }} / {{ pageCount }}
                    <button class="btn btn-dark btn-floating btn-sm" :disabled="page >= pageCount" @click="page++">
                        <i class="fas fa-angle-right"></i>
                    </button>
                </span>
            </template>
        </div>

        <div class="app-content">
            <VPE ref="pdfRef" :source="pdfSource" :page="page" @password-requested="handlePasswordRequest"
                @rendered="handleDocumentRender" />
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import VPE from 'vue-pdf-embed/dist/vue2-pdf-embed'

export default {
    data() {
        return {
            isLoading: true,
            page: 1,
            pageCount: 1,
            pdfSource: {},
            bookData: null
        }
    },
    components: {
        VPE
    },
    methods: {
        handleDocumentRender() {
            this.isLoading = false
            this.pageCount = this.$refs.pdfRef.pageCount
        },
        handlePasswordRequest(callback, retry) {
            callback(prompt(retry ? 'Enter password again' : 'Enter password'))
        },
        async getBookFile() {
            try {
                this.bookData = this.$route.params.data
                const { data } = await axios.post('/api/read-book', this.bookData)
                this.pdfSource = 'data:application/pdf;base64,' + data
            }
            catch(e) {
                console.log('Log: ' + e)
            }
        }
    },
    created() {
        if (!this.$route.params.data) {
            console.log('Invalid Query')
            this.$router.push({ name: 'collection' })
            return
        }
        this.getBookFile()
    },
    watch: {
        //
    }
}
</script>

<style lang="scss" scoped>
.app-header {
    padding: 16px;
    box-shadow: 0 2px 8px 4px rgba(0, 0, 0, 0.1);
    background-color: gray;
    color: white;
    vertical-align: middle;
    font-size: large;
    position: sticky;
}

.app-content {
    padding: 24px 16px;
}
</style>