<template>
    <div>
        <section class="p-5 d-flex border rounded justify-content-center m-5">
            <form autocomplete="off">
                <div class="input-group mb-4">
                    <input type="text" v-model="form.username" class="form-control" placeholder="Username" />
                </div>

                <div class="input-group mb-4">
                    <input type="password" v-model="form.password" class="form-control" placeholder="Password" />
                </div>

                <div class="row mb-4">
                    <div class="col-auto d-flex justify-content-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="remember-me" />
                            <label class="form-check-label" for="remember-me">Remember me</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="#">Forgot password?</a>
                    </div>
                </div>

                <button type="submit" :disabled="isDisabled" @click.prevent="loginSubmit"
                    class="btn btn-dark btn-block mb-4">Login</button>

                <div class="text-center">
                    <p>
                        Not a member?
                        <router-link :to="{ name: 'register' }">
                            Register
                        </router-link>
                    </p>
                </div>
            </form>
        </section>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'login',
    data() {
        return {
            form: {
                username: '',
                password: ''
            },
            isDisabled: false
        }
    },
    methods: {
        async loginSubmit() {
            try {
                this.isDisabled = true;
                await axios.post('/api/login', this.form).then(response => {
                    localStorage.setItem('access_token', response.data.token)
                    this.$router.go({ name: 'dashboard' })
                })
            }
            catch (e) {
                console.log('Log: ' + e)
                this.isDisabled = false;
            }
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
