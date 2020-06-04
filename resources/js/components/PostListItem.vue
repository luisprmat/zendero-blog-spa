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

                <!-- @include('posts.tags') -->
                <div class="tags container-flex">
                    <span class="tag c-gris" :key="tag.id" v-for="tag in post.tags">
                        <!-- <a href="{{ route('tags.show', $tag) }}">#{{ $tag->name }}</a> -->
                        <router-link :to="{name: 'tags_posts', params: {tag: tag.url}}">
                            #{{ tag.name }}
                        </router-link>
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
