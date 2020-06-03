<template>
    <section class="posts container">
        <!-- @if (isset($title))
            <h3>{{ $title }}</h3>
        @endif -->
        <article v-for="post in posts" :key="post.id" class="post">

            <!-- @include($post->viewType('home')) -->

            <div class="content-post">
                <!-- @include('posts.header') -->
                <header class="container-flex space-between">
                    <div class="date">
                        <span class="c-gris">
                            {{ post.published_date }} / {{ post.owner.name }}
                        </span>
                    </div>
                    <div class="post-category">
                        <span class="category">
                            <!-- <a href="{{ route('categories.show', $post->category) }}">
                                {{ optional($post->category)->name }}
                            </a> -->
                            <a href="#">{{ post.category.name }}</a>
                        </span>
                    </div>
                </header>

                <h1 v-text="post.title"></h1>

                <div class="divider"></div>

                <p v-html="post.excerpt"></p>
                <footer class="container-flex space-between">
                    <div class="read-more">
                        <!-- <a href="{{ route('posts.show', $post) }}" class="text-uppercase c-green">leer más</a> -->
                        <a href="#" class="text-uppercase c-green">leer más</a>
                    </div>

                    <!-- @include('posts.tags') -->
                    <div class="tags container-flex">
                        <span class="tag c-gris" :key="tag.id" v-for="tag in post.tags">
                            <!-- <a href="{{ route('tags.show', $tag) }}">#{{ $tag->name }}</a> -->
                            <a href="#">#{{ tag.name }}</a>
                        </span>
                    </div>
                </footer>
            </div>
        </article>

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
        data() {
            return {
                posts: []
            }
        },
        mounted() {
            axios.get('/api/posts')
                .then(res => {
                    this.posts = res.data.data
                })
                .catch(err => {
                    console.log(err.response.data)
                })
        }
    }
</script>
