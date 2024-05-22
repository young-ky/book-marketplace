<template>
    <div>
        <section class="p-5 d-flex border rounded justify-content-center m-5">
            <form autocomplete="off">
                <div class="input-group mb-4">
                    <input type="text" v-model="form.username" class="form-control" placeholder="Username" />
                </div>

                <div class="input-group mb-4">
                    <input type="text" v-model="form.firstName" class="form-control" placeholder="First Name" />
                </div>

                <div class="input-group mb-4">
                    <input type="text" v-model="form.lastName" class="form-control" placeholder="Last Name" />
                </div>

                <div class="input-group mb-4">
                    <input type="password" v-model="form.password" class="form-control" placeholder="Password" />
                </div>

                <div class="input-group mb-4">
                    <input type="password" v-model="form.password_confirmation" class="form-control"
                        placeholder="Confirm Password" />
                </div>

                <div class="col-auto d-flex justify-content-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="term-condition" />
                        <label class="form-check-label" for="term-condition">
                            I agree all statements in
                            <a href="#">
                                Terms of service
                            </a>
                        </label>
                    </div>
                </div>

                <button type="submit" @click.prevent="register" class="btn btn-dark btn-block mb-4">Register</button>

                <div class="text-center">
                    <p>
                        Already have an account?
                        <router-link :to="{ name: 'login' }">
                            Login
                        </router-link>
                    </p>
                </div>
            </form>
        </section>
    </div>
</template>

<script>
export default {
    name: 'register',
    data() {
        return {
            form: {
                username: '',
                firstName: '',
                lastName: '',
                password: '',
                password_confirmation: ''
            }
        }
    },
    methods: {
        async register() {
            try {
                const response = await axios.post('/api/register', this.form)
                console.log('Log: ' + response.statusText)
                this.$router.push({ name: 'login' })
            }
            catch (e) {
                console.log('Log: ' + e)
            }
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
