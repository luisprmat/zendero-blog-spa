<template>
    <div>
        <posts-list :posts="posts"></posts-list>
        <nav class="pagination" v-if="pagination.last_page > 1">
            <ul class="list-unstyled container-flex space-center">
                <li class="page-item" v-for="(page, index) in pagination.last_page" :key="index">
                    <router-link :class="getActiveClass(page)" :to="{
                        name: 'home',
                        query: {
                            page: page
                        }
                    }">{{ page }}</router-link>
                </li>
            </ul>
        </nav>
        <pre>{{pagination}}</pre>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
                pagination: {}
            }
        },
        mounted() {
            axios.get(`/api/posts?page=${this.$route.query.page || 1}`)
                .then(res => {
                    this.pagination = res.data
                    this.posts = res.data.data
                    delete this.pagination.data
                })
                .catch(err => {
                    console.log(err.response.data)
                })
        },
        methods: {
            getActiveClass(page) {
                return [
                    ! this.$route.query.page && page == 1 ? 'active' : ''
                ];
            }
        }
    }
</script>

<style lang="scss">
    .page-item {
        a.active {
            background-color: #1abc9c;
	        color: #fff;
        }
    }
</style>
