// resources/js/router.js
import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import About from "./pages/About";
import SinglePost from "./pages/SinglePost";
import Categories from "./pages/Categories";
import SingleCategory from "./pages/SingleCategory";
import PageNotFound from "./pages/PageNotFound";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/chi-siamo",
            name: "about",
            component: About
        },
        {
            path: "/posts/:slug",
            name: "single-post",
            component: SinglePost,
        },
        {
            path: "/categorie",
            name: "categories",
            component: Categories,
        },
        {
            path: "/categorie/:slugCat",
            name: "single-category",
            component: SingleCategory,
        },
        // Mostrare 404
        {
            path: "*",
            name: "page-404",
            component: PageNotFound,
        },
    ]
});

export default router