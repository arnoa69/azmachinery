<script setup>
import ProductDetail from "../../Shared/Frontend/Products/ProductDetail.vue";
import Layout from "../../Layouts/ProductLayout.vue";
import { ref, computed } from 'vue';
import { usePage } from "@inertiajs/vue3";
import { useI18n } from 'vue-i18n';
import { getLocalizedCountry } from '@/utils/localizedSlugMixin';

const { t } = useI18n();

const product = ref([]);
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

const { props } = usePage();
product.value = props.product;

const productInfo = computed(() => {
    const info = [];

    const match = product.value.product_name.match(/AZ\s+[A-Z\s0-9-]+/);
    const brandName = match ? match[0] : '';
    const numberOnly = product.value.product_code.match(/\d+/g);
    info.push({ brand_name: brandName });

    let keywords;
    let operation;
    switch (product.value.operation) {
        case 'pps':
            operation = t('meta.product_detail_view.title.gas');
            keywords = t('meta.product_detail_view.keywords.keyword_gas');
            break;
        case 'hydraulic':
            operation = t('meta.product_detail_view.title.hydraulic');
            keywords = t('meta.product_detail_view.keywords.keyword_hydraulic');
            break;
        case 'leveler':
            operation = t('meta.product_detail_view.title.leveler');
            keywords = t('meta.product_detail_view.keywords.keyword_leveler');
            break;
        case 'electric':
            operation = t('meta.product_detail_view.title.electric');
            keywords = t('meta.product_detail_view.keywords.keyword_electric');
            break;
        default:
            operation = product.value.operation;
    }

    info.push({ operation })

    let type;
    switch (product.value.type) {
        case 'fix_ramp':
            type = t('meta.product_detail_view.title.static_ramp');
            keywords += t('meta.product_detail_view.keywords.keyword_static');
            break;
        case 'mobile_ramp':
            type = t('meta.product_detail_view.title.mobile_ramp');
            keywords += t('meta.product_detail_view.keywords.keyword_mobile');
            break;
        case 'platform':
            type = t('meta.product_detail_view.title.platform_ramp');
            keywords += t('meta.product_detail_view.keywords.keyword_platform');
            break;
        default:
            type = '';
    }
    info.push({ type });

    let country = getLocalizedCountry();
    info.push({ country })
    info.push({ product_code: product.value.product_code })

    keywords += country + ",";
    keywords += t('meta.product_detail_view.keywords.keyword_tonnes', { tonnes: numberOnly[0] });
    keywords += brandName + ",";
    keywords += t('meta.product_detail_view.keywords.keyword_stock') + ",";
    keywords += t('meta.product_detail_view.keywords.keyword_buy_and_rent');
    info.push({ dynamic_keywords: keywords })
    info.push({ price: product.value.product_price })

    return info;
});
</script>

<template>
    <Head>
        <title> {{ productInfo[3].country }} {{ productInfo[0].brand_name }}
            {{ productInfo[2].type }} {{ productInfo[1].operation }}
        </title>
        <link rel="canonical" :href="canonicalUrl" />
        <meta name="keywords" :content="productInfo[5].dynamic_keywords" />
        <meta name="description" :content="$t(`products.${productInfo[4].product_code}.layout1.product_description`)" />
        <meta property="og:url" :content="canonicalUrl" />
        <meta property="og:title"
            :content="`${productInfo[3].country} ${productInfo[0].brand_name} ${productInfo[2].type} ${productInfo[1].operation}`" />
        <meta property="og:description"
            :content="$t(`products.${productInfo[4].product_code}.layout1.product_description`)" />
        <meta property="og:type" content="product" />
        <meta property="og:image" :content="`${url}/img/products/small/${product.product_image}thumb.jpg`" />
        <meta property="og:image:width" content="350" />
        <meta property="og:image:height" content="191" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:site_name" :content="ogSitename" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:price:amount" :content="productInfo[6].price" />
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
            :content="`${productInfo[3].country} ${productInfo[0].brand_name} ${productInfo[2].type} ${productInfo[1].operation}`" />
        <meta property="twitter:description"
            :content="$t(`products.${productInfo[4].product_code}.layout1.product_description`)" />
        <meta property="twitter:image" :content="`${url}/img/products/small/${product.product_image}thumb.jpg`" />
        <meta property="twitter:domain" :content="url" />
        <meta property="twitter:card" content="Summary Card" />
        <meta property="twitter:creator" content="@arnoa69" />
        <meta property="twitter:site" content="@JeromeGuiguet" />
    </Head>
    <Layout>
        <div>
            <ProductDetail :product="product"></ProductDetail>
        </div>
    </Layout>
</template>
