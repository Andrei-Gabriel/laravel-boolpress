<template>
    <div>
        <Header/>
        <Main/>
        <Footer/>
    </div>
</template>

<script>
    import Header from './components/Header.vue';
    import Main from './components/Main.vue';
    import Footer from './components/Footer.vue';
    export default {
        name: "App",
        components: {
            Header,
            Main,
            Footer,
        }
    }
</script>

<style lang="scss">
// Con scoped non funzionano le proprietà al di fuori di div#app
    * {
        margin: 0;
        padding: 0;
        font-size: 100%;
        box-sizing: border-box;
    }
</style>