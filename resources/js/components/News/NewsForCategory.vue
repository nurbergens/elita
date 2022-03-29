<template>
<!--    <div v-if="news" class="category__wrap">-->
<!--        <div v-for="news_item in news" class="category__item">-->
<!--            <img :src="news_item.preview_image " alt="" class="category__img">-->
<!--            <a href="#" class="category__item-right">-->
<!--                <h4 class="category__name">-->
<!--                    {{ news_item.title}}-->
<!--                </h4>-->
<!--                <p class="category__desc">-->
<!--                    {{ news_item.description }}-->
<!--                </p>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
</template>

<script>
export default {
    name: "NewsForCategory",
    props: ['category-id'],

    data() {
        return {
            news: null,
        }
    },

    mounted() {
        this.getNews();
    },


    methods: {

        getNews() {
            axios.get(`${document.location.origin}/api/category/${this.categoryId}`)
            .then(res => {
                this.news = res.data.data
            })
        }

    }
}
</script>

<style scoped>

</style>
