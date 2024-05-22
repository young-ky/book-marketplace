<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light container-fluid">
        <router-link class="nav-brand" :to="{ name: 'home' }" draggable="false">
            <img class="logo" src="https://logopond.com/logos/caaea19e93eeeafd7c461a32f0af683a.png">
        </router-link>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'home' }" draggable="false">
                        Home
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'genres' }" draggable="false">
                        Genre
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'about' }" draggable="false">
                        About
                    </router-link>
                </li>
                <li class="nav-item" v-if="!isAuth">
                    <router-link class="nav-link" :to="{ name: 'login' }" draggable="false">
                        Login
                    </router-link>
                </li>
                <li class="nav-item" v-if="!isAuth">
                    <router-link class="nav-link" :to="{ name: 'register' }" draggable="false">
                        Register
                    </router-link>
                </li>
                <li class="nav-item" v-if="isAuth">
                    <router-link class="nav-link" :to="{ name: 'dashboard' }" draggable="false">
                        Dashboard
                    </router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'navbar',
    methods: {

    },
    computed: {
        isAuth() {
            return !!window.localStorage.getItem('access_token')
        }
    }
}
</script>

<style lang="scss" scoped>
.navbar {
    position: sticky;
}
.logo {
    width: 64px;
    height: 64px;
}
</style>
