<script setup>
import { ref } from 'vue';
import Layout1 from '@/Layouts/Layout1.vue';
import { useI18n } from "vue-i18n";

const { t, locale } = useI18n();
const metaKeywords = ref(t("meta.keywords"));
const metaDescription = ref(t("meta.description"));
const url = ref( window.location.origin + '/' + locale.value);
const ogTitle = ref(t("meta.og:title"));
const ogDescription = ref(t("meta.og:description"));
const ogSitename = ref(t("meta.og:sitename"));
const articleSection = ref(t("meta.article:section"));
const articleAuthor = ref(t("meta.article:author"));
const articleTag1 = ref(t("meta.article:tag1"));
const articleTag2 = ref(t("meta.article:tag2"));
const articleTag3 = ref(t("meta.article:tag3"));
const articleTag4 = ref(t("meta.article:tag4"));
const twitterTitle = ref(t("meta.twitter:title"));
const twitterDescription = ref(t("meta.twitter:description"));
const twitterImage = ref(t("meta.twitter:image"));

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head>
        <title>{{ $t('meta.title') }}</title>
        <link rel="canonical" :href="url" />
        <meta name="keywords" :content="metaKeywords" />
        <meta name="description" :content="metaDescription" />
        <meta property="og:url" :content="url" />
        <meta property="og:title" :content="ogTitle" />
        <meta property="og:description" :content="ogDescription" />
        <meta property="og:type" content="product" />
        <meta property="og:image" :content="`${url}/img/products/video-8T-details.jpg`" />
        <meta property="og:image:width" content="350" />
        <meta property="og:image:height" content="191" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:site_name" :content="ogSitename" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:publish_date" content="2024-01-15T06:50:46+00:00" />
        <meta property="article:published_time" content="2024-01-15T06:50:46+00:00" />
        <meta property="article:modified_time" content="2024-01-15T12:32:47+00:00" />
        <meta property="article:section" :content="articleSection" />
        <meta property="article:author" :content="articleAuthor" />
        <meta property="article:tag" :content="articleTag1" />
        <meta property="article:tag" :content="articleTag2" />
        <meta property="article:tag" :content="articleTag3" />
        <meta property="article:tag" :content="articleTag4" />
        <meta property="article:publisher" content="https://www.facebook.com/azmachineryfrance/" />
        <meta property="twitter:url" :content="url" />
        <meta property="twitter:title" :content="twitterTitle" />
        <meta property="twitter:description" :content="twitterDescription" />
        <meta property="twitter:image" :content="`${url}/img/products/video-8T-details.jpg`" />
        <meta property="twitter:domain" :content="url" />
        <meta property="twitter:card" content="Summary Card" />
        <meta property="twitter:creator" content="@arnoa69" />
        <meta property="twitter:site" content="@JeromeGuiguet" />

    </Head>

    <main id="main">
        <Layout1 />
    </main>

    <!-- <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <button type="button" class="btn btn-primary">Primary</button>
                    <button type="button" class="btn btn-secondary">Secondary</button>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div> -->
</template>
