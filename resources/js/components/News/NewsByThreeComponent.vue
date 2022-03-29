<template>
<!--    <section class="news" id="news-culture">-->
<!--        <div class="container">-->
<!--            <a href="#" class="news__title">-->
<!--                {{ category.title }}-->
<!--            </a>-->
<!--            <div class="news__wrap">-->
<!--                <a v-for="news_item in news" :href="route('news.show', news)" class="news__item">-->
<!--                    <img :src="news_item.preview_image" alt="news" class="news__img">-->
<!--                    <div class="news__bottom">-->
<!--                        <h3 class="news__name">-->
<!--                            <span class="date">{{ localeDate(news_item.publication_date)}}</span>-->
<!--                            {{ news_item.title }}-->
<!--                        </h3>-->
<!--                        <p class="news__desk">-->
<!--                            {{ news_item.description }}-->
<!--                        </p>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
</template>

<script>
export default {
    name: "NewsByThreeComponent",
    props: ['category'],

    data() {
        return {
            news: null
        }
    },

    mounted() {
        this.getNews();
    },

    methods: {
        getNews() {
            axios.get(`/api/news/by-three/${this.category.id}`)
                .then( res => {
                    this.news = res.data.data
                })
        },
        localeDate(date) {
            return (new Date(date.replace(/-/g, "/"))).toLocaleDateString('kk-KZ',{month: 'long', day: '2-digit' })
        },
    }
}
</script>

<style scoped>

</style>
