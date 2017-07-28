<template>
  <div id="app">
      <router-view></router-view>
  </div>
</template>

<script>
    export default {
        name: 'app'
    }
</script>

<style>
    body{
        background: #a1e0ff;
        padding: 0;
        margin: 0;
    }
    *{
        padding: 0;
        margin: 0;
    }
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        color: #2c3e50;
    }
    li,ul {
        padding: 0;
        list-style: none;
    }
    .content {
        padding: 0 5%;
        margin-top: .4rem;
    }
    .content .content-item {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 6px rgba(0, 93, 152,.5);
        position: relative;
        padding: 3rem 0 2.5rem;
        margin-bottom: 2rem;
    }
    .content .content-title {
        width: 10rem;
        position: absolute;
        top: -1rem;
        left: 50%;
        font-size: large;
        margin-left: -5rem;
        line-height: 2rem;
        vertical-align: middle;
        border:2px solid rgba(0, 93, 152, .5);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 0 2px rgba(0, 93, 152,.5);
        text-align: center;
        color: #2a88bd;
    }
    .content p{
        padding: 0 6%;
        font-weight: 200;
        text-align: justify;
        letter-spacing: .5px;
        font-size: small;
    }

    input:focus {
        outline: none;
    }
    button:focus {
        outline:none;
    }

    .toast {
        position:fixed;
        top:40%;
        margin-top:-28px;
        width:100%;
        font-size:16px;
        text-align:center;
        z-index:10
    }
    .toast>p{display:inline-block;margin:0 auto;padding:16px;color:#fff;background-color:rgba(0,0,0,.8);border-radius:5px}


</style>
