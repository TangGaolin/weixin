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


</style>
