<template>
    <footer class="text-center text-lg-start bg-light text-muted">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border">
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <div>
                <a href="" class="me-4 text-reset"><i class="bi bi-facebook"></i></a>
                <a href="" class="me-4 text-reset"><i class="bi bi-twitter"></i></a>
                <a href="" class="me-4 text-reset"><i class="bi bi-instagram"></i></a>
                <a href="" class="me-4 text-reset"><i class="bi bi-linkedin"></i></a>
                <a href="" class="me-4 text-reset"><i class="bi bi-github"></i></a>
            </div>
        </section>
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4"><img class="logo"
                                src="https://logopond.com/logos/caaea19e93eeeafd7c461a32f0af683a.png"></h6>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur minima eveniet amet
                            similique facere ducimus, optio et reprehenderit dolores eaque.</p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Our Team</h6>
                        <p><a href="" class="text-reset">Youngky</a></p>
                        <p><a href="" class="text-reset">Gahasa Purba</a></p>
                        <p><a href="" class="text-reset">Aldo Ramadhan</a></p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
                        <p><router-link class="text-reset" :to="{ name: 'genres' }">Genre</router-link></p>
                        <p><router-link class="text-reset" :to="{ name: 'login' }">Login</router-link></p>
                        <p><router-link class="text-reset" :to="{ name: 'register' }">Register</router-link></p>
                        <p><router-link class="text-reset" :to="{ name: 'faq' }">FAQ</router-link></p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="bi bi-building"></i> Jl. Jend Sudirman, Jakarta Selatan</p>
                        <p><i class="bi bi-envelope-fill"></i> bukuku@examplemail.com</p>
                        <p><i class="bi bi-headset"></i> cs.bukuku@examplemail.com</p>
                        <p><i class="bi bi-telephone-fill"></i> +62 811 2222 3333</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">© 2022 Copyright: <a
                class="text-reset fw-bold">Bukuku</a> all rights reserved.</div>
    </footer>
</template>

<script>
export default {
    name: 'footers'
}
</script>

<style scoped>
.text-reset {
    text-decoration: none;
}

.logo {
    width: 64px;
    height: 64px;
}
</style>