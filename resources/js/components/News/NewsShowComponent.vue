<template>

</template>

<script>
export default {
    name: "NewsShowComponent",
    props: ['news'],

    data() {
        return {
            category: null,
        }
    },

    mounted() {
        this.getCategory();
    },

    methods: {
        getCategory() {
            axios.get(`${document.location.origin}/api/news/${this.news.category_id}`)
            .then(res => {
                this.category = res.data.data;
            })
        }
    }
}
</script>

<style scoped>

</style>
