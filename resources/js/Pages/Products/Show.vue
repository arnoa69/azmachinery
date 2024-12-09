<script setup>
import ProductDetail from "../../Shared/Frontend/Products/ProductDetail.vue";
import Layout from "../../Layouts/ProductLayout.vue";
import { ref, computed } from 'vue';
import { usePage } from "@inertiajs/vue3";
import { useI18n } from 'vue-i18n';
import { getCountryName } from '@/utils/localizedSlugMixin';
import { getProductImages } from '@/utils/imageUtil';
import getOptionsFromSlug from '@/utils/urlHelper';

const { t } = useI18n();
const canonicalUrl = ref('');
canonicalUrl.value = window.location.origin + window.location.pathname;
const url = ref(window.location.origin);
const ogSitename = ref(t("meta.og:sitename"));
const articleSection = ref(t("meta.article:section"));
const articleAuthor = ref(t("meta.article:author"));
const articleTag1 = ref(t("meta.article:tag1"));
const articleTag2 = ref(t("meta.article:tag2"));
const articleTag3 = ref(t("meta.article:tag3"));
const articleTag4 = ref(t("meta.article:tag4"));

const options = getOptionsFromSlug(props.product.slug);

const { props } = usePage();
const product = ref(props.product);

/* reuse function for correct image path */
const isGalvanized = (slug) => {
    const galvanizedKeywords = ['gan', 'gal', 'gab', 'gap', 'gao'];
    return galvanizedKeywords.some(keyword => slug.includes(keyword));
};
const { main: image, additional: [image_01, image_02, image_03, image_04] } = getProductImages(props.product.base_name, isGalvanized(props.product.slug));
/* End image path function */

const productInfo = computed(() => {
    const info = [];
    const weight_capacity = product.value.weight_capacity;
    const version = product.value.version;

    let keywords;

    let country = getCountryName();
    info.push({ country })

    keywords = country + ",";
    keywords += t('meta.product_detail_view.keywords.tonnes', { tonnes: weight_capacity });
    keywords += t('meta.product_detail_view.keywords.keyword_chain');
    info.push({ dynamic_keywords: keywords })

    let operation;

    switch (version) {
        case 'standard':
            operation = t('meta.product_detail_view.keywords.type.standard');
            keywords = t('meta.product_detail_view.keywords.type.standard');
            break;
        case 'llo':
            operation = t('meta.product_detail_view.keywords.type.llo');
            keywords = t('meta.product_detail_view.keywords.type.llo');
            break;
        case 'xl':
            operation = t('meta.product_detail_view.keywords.type.xl');
            keywords = t('meta.product_detail_view.keywords.type.xl');
            break;
        case 'lloxl':
            operation = t('meta.product_detail_view.keywords.type.lloxl');
            keywords = t('meta.product_detail_view.keywords.type.lloxl');
            break;
        default:
            operation = version;
    }

    info.push({ operation })

    info.push({ price: product.value.total_price })

    return info;
});

/* component for alternate links */
// BEGIN define countries and domains as well as hreflang
const countryDomains = {
    azmat: { domain: 'at', hreflang: 'de-AT' },
    azmch: { domain: 'ch', hreflang: 'de-CH' },
    azmbe: { domain: 'be', hreflang: 'fr-BE' },
    azmit: { domain: 'it', hreflang: 'it-IT' },
    azmnl: { domain: 'nl', hreflang: 'nl-NL' },
    azmde: { domain: 'de', hreflang: 'de-DE' },
    azmdk: { domain: 'dk', hreflang: 'da-DK' },
    azmuk: { domain: 'uk', hreflang: 'en-GB' },
    azmpt: { domain: 'pt', hreflang: 'pt-PT' }
};

const generateAlternateLinks = () => {
    const currentDomain = window.location.hostname.split('.')[1]; // z.B. "de" von "example.de"
    const baseDomain = window.location.hostname.split('.')[0]; // z.B. "example"
    const alternateLinks = [];

    for (const [key, { domain, hreflang }] of Object.entries(countryDomains)) {
        if (domain !== currentDomain) {
            const alternateUrl = `https://${baseDomain}.${domain}${window.location.pathname}`;
            alternateLinks.push({ url: alternateUrl, hreflang });
        }
    }
    return alternateLinks;
};

const alternateLinks = generateAlternateLinks();
/* component for alternate links */

</script>

<template>
    <Head>
        <title> {{ $t('meta.product_detail_view.title.01', {tonnes: product.weight_capacity, country: productInfo[0].country }) }} </title>
        <link rel="canonical" :href="canonicalUrl" />
        <template v-for="link in alternateLinks" :key="link.url">
            <link rel="alternate" :href="link.url" :hreflang="link.hreflang" />
        </template>
        <meta name="keywords" :content="productInfo[1].dynamic_keywords" />
        <meta name="description" :content="$t(`${product.slug}.product_description`)" />
        <meta property="og:url" :content="canonicalUrl" />
        <meta property="og:title"
            :content="`${productInfo[2].country} ${productInfo[0].brand_name} ${productInfo[2].type} ${productInfo[0].operation}`" />
        <meta property="og:description"
            :content="$t(`${product.slug}.product_description`)" />
        <meta property="og:type" content="product" />
        <meta property="og:image" :content="`${url}${image}`" />
        <meta property="og:image:width" content="350" />
        <meta property="og:image:height" content="191" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:site_name" :content="ogSitename" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:price:amount" :content="productInfo[3].price" />
        <meta property="og:price:currency" content="EUR" />
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
        <meta property="twitter:url" :content="canonicalUrl" />
        <meta property="twitter:title"
            :content="`${productInfo[1].dynamic_keywords}`" />
        <meta property="twitter:description"
            :content="t(`${product.slug}.product_description`)" />
        <meta property="twitter:image" :content="`${url}${image}`" />
        <meta property="twitter:domain" :content="url" />
        <meta property="twitter:card" content="Summary Card" />
        <meta property="twitter:creator" content="@arnoa69" />
        <meta property="twitter:site" content="@JeromeGuiguet" />
    </Head>
    <Layout :product="product" :isDetailView="true">
        <div>
            <ProductDetail :product="product"></ProductDetail>
        </div>
    </Layout>
</template>
