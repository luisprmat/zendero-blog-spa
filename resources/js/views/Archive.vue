<template>
    <section class="pages container">
        <div class="page page-archive">
            <h1 class="text-capitalize">archivo</h1>
            <p>Nam efficitur, massa quis fringilla volutpat, ipsum massa consequat nisi, sed eleifend orci sem sodales lorem. Curabitur molestie eros urna, eleifend molestie risus placerat sed.</p>
            <div class="divider-2" style="margin: 35px 0;"></div>
            <div class="container-flex space-between">
                <div class="authors-categories">
                    <h3 class="text-capitalize">Autores</h3>
                    <ul class="list-unstyled">
                        <li v-for="author in authors" v-text="author.name" :key="author.id"></li>
                    </ul>
                    <h3 class="text-capitalize">categorías</h3>
                    <ul class="list-unstyled">
                        <li class="text-capitalize" v-for="category in categories" :key="category.id">
                            <category-link :category="category"></category-link>
                        </li>
                    </ul>
                </div>
                <div class="latest-posts">
                    <h3 class="text-capitalize">últimas publicaciones</h3>

                    <p v-for="post in posts" :key="post.id">
                        <post-link :post="post">{{ post.title }}</post-link>
                    </p>

                    <h3 class="text-capitalize">publicaciones por mes</h3>

                    <ul class="list-unstyled">
                        <li class="text-capitalize">
                            <!-- <a href="{{ route('pages.home', ['month' => $date->month, 'year' => $date->year]) }}"> -->
                                <!-- {{ $date->monthname }} {{ $date->year }} ({{ $date->posts }}) -->
                            <!-- </a> -->
                        </li>
                        <li class="text-capitalize" v-for="(date, index) in archive" :key="index" >
                            {{ date.monthname }} {{ date.year }} ({{ date.posts }})
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                authors: [],
                categories: [],
                posts: [],
                archive: []
            }
        },
        mounted() {
            axios.get('/api/archivo')
                .then(res => {
                    this.authors = res.data.authors
                    this.categories = res.data.categories
                    this.posts = res.data.posts
                    this.archive = res.data.archive
                })
                .catch(err => {
                    console.log(err.response.data)
                })
        }
    }
</script>
