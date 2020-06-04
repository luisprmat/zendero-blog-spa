<template>
    <div>
        <component :is="componentName" :items="items"></component>
        <pagination-links :pagination="pagination"></pagination-links>
    </div>
</template>

<script>
    export default {
        props: ['url', 'componentName'],
        data() {
            return {
                pagination: {},
                items: []
            }
        },
        mounted() {
            axios.get(`${this.url}?page=${this.$route.query.page || 1}`)
                .then(res => {
                    this.pagination = res.data
                    this.items = res.data.data
                    delete this.pagination.data
                })
                .catch(err => {
                    console.log(err.response.data)
                })
        },
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
