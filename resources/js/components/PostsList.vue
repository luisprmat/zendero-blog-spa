<template>
    <section class="posts container">
        <!-- @if (isset($title))
            <h3>{{ $title }}</h3>
        @endif -->
        <post-list-item v-for="post in posts"
            :key="post.id"
            :post="post"
        ></post-list-item>

        <!-- @empty -->
        <article class="post" v-if="! posts.length">
            <div class="content-post">
                <h1>No hay publicaciones todavía</h1>
            </div>
        </article>
    </section>
</template>

<script>
    export default {
        props: ['posts']
    }
</script>
