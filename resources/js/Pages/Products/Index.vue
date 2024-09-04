<script setup>
import { ref, computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import Layout from "../../Layouts/ProductLayout.vue";
import HelpSidebar from "../../Components/Layouts/Layout1/Sidebar/HelpSidebar.vue";
import CookieBanner from '@/Shared/Cookiebanner/CookieBanner.vue';
import ManageCookieBanner from '@/Shared/Cookiebanner/ManageCookieBanner.vue';
import PolicyBanner from '@/Shared/Cookiebanner/PolicyBanner.vue';
import { posthogModule } from '@/plugins/posthog'

const page_or_slug = ref('product_overview');
const products = ref([]);
const { props } = usePage();
products.value = props.products;

const base_names = computed(() => {
  const urlParams = new URLSearchParams(window.location.search);
  const type = urlParams.get('type');

  if (type === 'mobile') {
    return ['star', 'easy-xl', 'wlo', 'prime-xs', 'star-otc', 'big-foot'];
  } else if (type === 'container') {
    return ['hcrn-06', 'hcrn-065', 'hcrn-08', 'hcry-08', 'secu-dock'];
  } else {
    return ['star', 'easy-xl', 'wlo', 'prime-xs', 'star-otc', 'big-foot', 'hcrn-06', 'hcrn-065', 'hcrn-08', 'hcry-08', 'secu-dock'];
  }
});

// const base_names = ref(['star', 'easy-xl', 'wlo',
//     'prime-xs', 'star-otc', 'big-foot', 'hcrn-06',
//     'hcrn-065', 'hcrn-08', 'hcry-08', 'secu-dock']);

const canonicalUrl = ref('');
canonicalUrl.value = window.location.origin + window.location.pathname;
const url = ref(window.location.origin);

// show banner depending on posthog opt in or out
const showBanner = ref(!(posthogModule.posthog.has_opted_out_capturing() || posthogModule.posthog.has_opted_in_capturing()));

const showConfigBanner = ref(false)
const showPolicyBanner = ref(false)
</script>

<template>

    <Head>
        <title>{{ $t('meta.product_list_view_title') }}</title>
        <link rel="canonical" :href="canonicalUrl" />
        <meta name="keywords" :content="$t('meta.product_list.keywords')" />
        <meta name="description" :content="$t('meta.product_list.description')" />
        <meta property="og:url" :content="canonicalUrl" />
        <meta property="og:title" :content="$t('meta.product_list.og:title')" />
        <meta property="og:description" :content="$t('meta.product_list.description')" />
        <meta property="og:type" content="productlist" />
        <meta property="og:price:currency" content="EUR" />
        <meta property="og:publish_date" content="2024-01-15T06:50:46+00:00" />
        <meta property="article:published_time" content="2024-01-15T06:50:46+00:00" />
        <meta property="article:modified_time" content="2024-01-15T12:32:47+00:00" />
        <meta property="article:section" :content="$t('meta.article:section')" />
        <meta property="article:author" :content="$t('meta.article:author')" />
        <meta property="article:tag" :content="$t('meta.article:section')" />
        <meta property="article:tag" :content="$t('meta.article:tag1')" />
        <meta property="article:tag" :content="$t('meta.article:tag2')" />
        <meta property="article:tag" :content="$t('meta.article:tag3')" />
        <meta property="article:tag" :content="$t('meta.article:tag4')" />
        <meta property="article:publisher" content="https://www.facebook.com/azmachineryfrance/" />
        <meta property="twitter:url" :content="canonicalUrl" />
        <meta property="twitter:title" :content="$t('meta.product_list_view_title')" />
        <meta property="twitter:description" :content="$t('meta.product_list.description')" />
        <meta property="twitter:domain" :content="url" />
        <meta property="twitter:card" content="Summary Card" />
        <meta property="twitter:creator" content="@arnoa69" />
        <meta property="twitter:site" content="@JeromeGuiguet" />

    </Head>
    <Layout :isDetailView="false">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch justify-content-center justify-content-lg-start">
                    <div class="row categories-list">
                        <div class="service-details">
                            <HelpSidebar :page_or_slug="page_or_slug" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex flex-column align-items-stretch">
                    <div v-for="(type, key) in base_names" :key="key" :class="`postcard dark ${['green', 'red', 'blue'][key % 3]}`" >
                        <a class="postcard__img_link" href="#">
                            <img class="postcard__img" :src="`/img/products/${type}/${type}.jpg`" alt="Image Title" />
                        </a>
                        <div class="postcard__text">
                            <h1 class="postcard__title"><a href="#">{{ type }}</a></h1>
                            <div class="postcard__subtitle small">
                                <time :datetime="new Date().toISOString()">
                                    <i class="fas fa-calendar-alt mr-2"></i>{{ new Date().toLocaleDateString() }} - livraison en 3 jours: {{ new Date(Date.now() + 3 * 24 * 60 * 60 * 1000).toLocaleDateString() }}
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">{{ $t(`categories.${type}.description`) }}</div>
                            <ul class="postcard__tagbox">
                                <li class="tag__item"><i class="fas fa-tag mr-2"></i>{{ type }}</li>
                                <li class="tag__item"><i class="fas fa-clock mr-2"></i>locaction 1,3,6 meses</li>
                                <li class="tag__item play">
                                    <a :href="'products/' + type"><i class="fas fa-play mr-2"></i>Show</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <CookieBanner v-if="showBanner" @hideBanner="showBanner = false" @showManageBanner="showConfigBanner = true"
        @showPolicyBanner="showPolicyBanner = true" />

    <ManageCookieBanner v-if="showConfigBanner" @hideConfigBanner="showConfigBanner = false"
        @hideBothBanner="showBanner = false, showConfigBanner = false" />

    <PolicyBanner v-if="showPolicyBanner" @hide-policy-banner="showPolicyBanner = false" />
    </Layout>


    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</template>

<style scoped>
.dark {
    background: #110f16;
}


.light {
    background: #f3f5f7;
}

a,
a:hover {
    text-decoration: none;
    transition: color 0.3s ease-in-out;
}

#pageHeaderTitle {
    margin: 2rem 0;
    text-transform: uppercase;
    text-align: center;
    font-size: 2.5rem;
}

/* Cards */
.postcard {
    flex-wrap: wrap;
    display: flex;

    box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
    border-radius: 10px;
    margin: 0 0 2rem 0;
    overflow: hidden;
    position: relative;
    color: #ffffff;

    &.dark {
        background-color: #18151f;
    }

    &.light {
        background-color: #e1e5ea;
    }

    .t-dark {
        color: #18151f;
    }

    a {
        color: inherit;
    }

    h1,
    .h1 {
        margin-bottom: 0.5rem;
        font-weight: 500;
        line-height: 1.2;
    }

    .small {
        font-size: 80%;
    }

    .postcard__title {
        font-size: 1.75rem;
    }

    .postcard__img {
        max-height: 180px;
        width: 100%;
        object-fit: cover;
        position: relative;
    }

    .postcard__img_link {
        display: contents;
    }

    .postcard__bar {
        width: 50px;
        height: 10px;
        margin: 10px 0;
        border-radius: 5px;
        background-color: #424242;
        transition: width 0.2s ease;
    }

    .postcard__text {
        padding: 1.5rem;
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .postcard__preview-txt {
        overflow: hidden;
        text-overflow: ellipsis;
        text-align: justify;
        height: 100%;
    }

    .postcard__tagbox {
        display: flex;
        flex-flow: row wrap;
        font-size: 14px;
        margin: 20px 0 0 0;
        padding: 0;
        justify-content: center;

        .tag__item {
            display: inline-block;
            background: rgba(83, 83, 83, 0.4);
            border-radius: 3px;
            padding: 2.5px 10px;
            margin: 0 5px 5px 0;
            cursor: default;
            user-select: none;
            transition: background-color 0.3s;

            &:hover {
                background: rgba(83, 83, 83, 0.8);
            }
        }
    }

    &:before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-image: linear-gradient(-70deg, #424242, transparent 50%);
        opacity: 1;
        border-radius: 10px;
    }

    &:hover .postcard__bar {
        width: 100px;
    }
}

@media screen and (min-width: 769px) {
    .postcard {
        flex-wrap: inherit;

        .postcard__title {
            font-size: 2rem;
        }

        .postcard__tagbox {
            justify-content: start;
        }

        .postcard__img {
            max-width: 300px;
            max-height: 100%;
            transition: transform 0.3s ease;
        }

        .postcard__text {
            padding: 3rem;
            width: 100%;
        }

        .media.postcard__text:before {
            content: "";
            position: absolute;
            display: block;
            background: #18151f;
            top: -20%;
            height: 130%;
            width: 55px;
        }

        &:hover .postcard__img {
            transform: scale(1.1);
        }

        &:nth-child(2n+1) {
            flex-direction: row;
        }

        &:nth-child(2n+0) {
            flex-direction: row-reverse;
        }

        &:nth-child(2n+1) .postcard__text::before {
            left: -12px !important;
            transform: rotate(4deg);
        }

        &:nth-child(2n+0) .postcard__text::before {
            right: -12px !important;
            transform: rotate(-4deg);
        }
    }
}

@media screen and (min-width: 1024px) {
    .postcard__text {
        padding: 2rem 3.5rem;
    }

    .postcard__text:before {
        content: "";
        position: absolute;
        display: block;

        top: -20%;
        height: 130%;
        width: 55px;
    }

    .postcard.dark {
        .postcard__text:before {
            background: #18151f;
        }
    }

    .postcard.light {
        .postcard__text:before {
            background: #e1e5ea;
        }
    }
}

/* COLORS */
.postcard .postcard__tagbox .green.play:hover {
    background: #79dd09;
    color: black;
}

.green .postcard__title:hover {
    color: #79dd09;
}

.green .postcard__bar {
    background-color: #79dd09;
}

.green::before {
    background-image: linear-gradient(-30deg,
            #79dd09,
            transparent 50%);
}

.green:nth-child(2n)::before {
    background-image: linear-gradient(30deg, #79dd09, transparent 50%);
}

.postcard .postcard__tagbox .blue.play:hover {
    background: #0076bd;
}

.blue .postcard__title:hover {
    color: #0076bd;
}

.blue .postcard__bar {
    background-color: #0076bd;
}

.blue::before {
    background-image: linear-gradient(-30deg, #0076bd, transparent 50%);
}

.blue:nth-child(2n)::before {
    background-image: linear-gradient(30deg, #0076bd, transparent 50%);
}

.postcard .postcard__tagbox .red.play:hover {
    background: #bd150b;
}

.red .postcard__title:hover {
    color: #bd150b;
}

.red .postcard__bar {
    background-color: #bd150b;
}

.red::before {
    background-image: linear-gradient(-30deg, #bd140b, transparent 50%);
}

.red:nth-child(2n)::before {
    background-image: linear-gradient(30deg, #bd140b, transparent 50%);
}

.postcard .postcard__tagbox .yellow.play:hover {
    background: #bdbb49;
    color: black;
}

.yellow .postcard__title:hover {
    color: #bdbb49;
}

.yellow .postcard__bar {
    background-color: #bdbb49;
}

.yellow::before {
    background-image: linear-gradient(-30deg,
            #bdbb49,
            transparent 50%);
}

.yellow:nth-child(2n)::before {
    background-image: linear-gradient(30deg,
            #bdbb49,
            transparent 50%);
}

@media screen and (min-width: 769px) {
    .green::before {
        background-image: linear-gradient(-80deg,
                #7add09,
                transparent 50%);
    }

    .green:nth-child(2n)::before {
        background-image: linear-gradient(80deg,
                #7add09,
                transparent 50%);
    }

    .blue::before {
        background-image: linear-gradient(-80deg,
                #0076bd,
                transparent 50%);
    }

    .blue:nth-child(2n)::before {
        background-image: linear-gradient(80deg, #0076bd, transparent 50%);
    }

    .red::before {
        background-image: linear-gradient(-80deg, #bd140b, transparent 50%);
    }

    .red:nth-child(2n)::before {
        background-image: linear-gradient(80deg, #bd140b, transparent 50%);
    }

    .yellow::before {
        background-image: linear-gradient(-80deg,
                #bdbb49,
                transparent 50%);
    }

    .yellow:nth-child(2n)::before {
        background-image: linear-gradient(80deg,
                #bdbb49,
                transparent 50%);
    }
}
</style>
