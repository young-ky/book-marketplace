<template>
    <div>
        <h3>Profile</h3>
        <h5>Name: {{ this.fullName }}</h5>
    </div>
</template>

<script>
import cacheUtils from '../../../utils/cacheUtils'

export default {
    data() {
        return {
            fullName: ''
        }
    },
    methods: {
        async setFullName() {
            if (cacheUtils.isOnCache("fullName")) {
                this.fullName = cacheUtils.getFromCache("fullName")
                return
            }
            try {
                axios.defaults.headers.post['Authorization'] = `Bearer ${localStorage.getItem('access_token')}`
                const { data } = await axios.get('/api/user')
                this.fullName = data.first_name + ' ' + data.last_name
                cacheUtils.addToCache("fullName", this.fullName)
            }
            catch (e) {
                console.log('Log: ' + e)
            }
        },
    },
    created() {
        this.setFullName()
    }
}
</script>

<style lang="scss" scoped>

</style>
