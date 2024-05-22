<template>
    <div class="app">
        <navbar />
        <router-view />
        <footers />
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Footers from './components/Footer.vue'

export default {
    components: {
        Navbar,
        Footers
    },
    name: 'app'
}
</script>
