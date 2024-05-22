<template>
    <body>
        <div class="jumbotron fixed-top">
            <div class="container">
                <h1 class="display-4">BUKUKU</h1>
                 <p class="lead">DIGITAL ONLINE BOOKSTORE</p>
                <hr class="my-4">
                <p>BUY YOUR FAVORITE BOOK</p>
                <a class="btn btn-primary btn-lg" href="/home" role="button">Shop Now</a>
            </div>
          </div>
    </body>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
.jumbotron{
    background-image: url(/assets/img/old-library-books.jpeg);
    background-size: cover;
    width: 100%;
    height: 100%;
    position: absolute;
    text-align: center;
    .container {
        vertical-align: middle;
        padding-top: 60px;
    }
}
.jumbotron .display-4{
    color: white;
    margin-top: 100px;
}
.jumbotron p{
    color: white;
    font-size: 25px;
}
.jumbotron hr{
    border-color: white;
    width: 70px;
    border-width: 3px;
}

.jumbotron .btn{
    background-color: orange;
    border: none;
    border-radius: 25px;
    padding-left: 25px;
    padding-right: 25px;
}
</style>