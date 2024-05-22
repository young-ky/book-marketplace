<template>
    <div class="row container-fluid">
        <div class="col-2 p-3 border-end">
            <div class="nav flex-column py-5">
                <router-link class="nav-link py-3" :to="{ name: 'profile' }">
                    <i class="bi bi-person-circle"></i> Personal Profile
                </router-link>
                <router-link class="nav-link py-3" :to="{ name: 'collection' }">
                    <i class="bi bi-book"></i> Book Collection
                </router-link>
                <router-link class="nav-link py-3" :to="{ name: 'publish' }">
                    <i class="bi bi-plus-square"></i> Publish Book
                </router-link>
                <router-link class="nav-link py-3" :to="{ name: 'transaction' }">
                    <i class="bi bi-receipt-cutoff"></i> Transaction History
                </router-link>
                <router-link class="nav-link py-3" :to="{ name: 'dashboard' }">
                    <i class="bi bi-moon-stars"></i> Dark Mode
                </router-link>
                <a @click.prevent="logout" class="nav-link py-3" href="#">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
        <div class="col p-3 ps-5">
            <h3>Dashboard</h3>
            <hr />
            <router-view class="my-5"></router-view>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        logout() {
            axios.defaults.headers.post['Authorization'] = `Bearer ${localStorage.getItem('access_token')}`
            axios.post("/api/logout").then(response => {
                localStorage.removeItem('access_token')
                this.$router.go({ name: 'login' })
            })
        }
    }
}
</script>

<style lang="scss" scoped>
.nav-link {
    color: dimgrey;

    &:hover {
        color: rgb(54, 205, 255);
    }
}
</style>