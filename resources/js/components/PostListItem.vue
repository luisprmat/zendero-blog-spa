<template>
    <article class="post">

        <!-- @include($post->viewType('home')) -->

        <div class="content-post">

            <post-header :post="post"></post-header>

            <p v-html="post.excerpt"></p>
            <footer class="container-flex space-between">
                <div class="read-more">
                    <post-link class="text-uppercase c-green" :post="post">leer más</post-link>
                </div>

                <div class="tags container-flex">
                    <span class="tag c-gris" :key="tag.id" v-for="tag in post.tags">
                        <tag-link :tag="tag"></tag-link>
                    </span>
                </div>
            </footer>
        </div>
    </article>
</template>

<script>
    export default {
        props: ['post']
    }
</script>
