<template>
    <div>
        <nav class="pagination" v-if="pagination.last_page > 1">
            <ul class="list-unstyled container-flex space-center">
                <li class="page-item" v-for="(page, index) in pagination.last_page" :key="index">
                    <router-link :class="getActiveClass(page)" :to="{
                        name: $route.name,
                        query: {
                            page: page
                        }
                    }">{{ page }}</router-link>
                </li>
            </ul>
        </nav>
        <!-- <pre>{{pagination}}</pre> -->
        <!-- TODO: Implement links for prev, next, etc -->
    </div>
</template>

<script>
    export default {
        props: ['pagination'],
        methods: {
            getActiveClass(page) {
                return [
                    ! this.$route.query.page && page == 1 ? 'active' : ''
                ];
            }
        }
    }
</script>

<style>

</style>
