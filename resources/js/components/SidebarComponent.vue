<template>
    <div class="col-lg-4">
        <div class="side-bar short-col">
            <h3 class="side-bar__title">
                Соңғы жаңалықтар
            </h3>
            <div class="side-bar__wrap">
                <a v-for="news_item in news" href="#" class="side-bar__item">
                    <span class="date">{{ localeDate(news_item.publication_date) }}</span>
                    <h4 class="side-bar__news-name">
                        {{ news_item.title }}
                    </h4>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SidebarComponent",

    data() {
        return {
            news: null
        }
    },

    computed: {
    },

    mounted() {
        this.getNews();
    },

    methods: {
        getNews() {
            axios.get('/api/sidebar')
            .then( res => {
                this.news = res.data.data
            })
        },
        localeDate(date) {
            // return (new Date(date.replace(/-/g, "/"))).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})
            return (new Date(date)).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})
        },
    }
}
</script>

<style scoped>

</style>
