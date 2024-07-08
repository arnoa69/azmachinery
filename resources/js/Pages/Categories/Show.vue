<script setup>
import CategoryDetail from "../../Shared/Frontend/Categories/CategoryDetail.vue";
import Layout from "../../Layouts/ProductLayout.vue";
import { ref } from 'vue';
import { usePage } from "@inertiajs/vue3";
import { useI18n } from "vue-i18n";
import { getLocalizedCountry } from '@/utils/localizedSlugMixin';
import CookieBanner from '@/Shared/Cookiebanner/CookieBanner.vue';
import ManageCookieBanner from '@/Shared/Cookiebanner/ManageCookieBanner.vue';
import PolicyBanner from '@/Shared/Cookiebanner/PolicyBanner.vue';
import { posthogModule } from '@/plugins/posthog'

const { locale, t } = useI18n();
const country = ref(getLocalizedCountry());
const type = ref('');
const products = ref([]);
const { props } = usePage();
products.value = props.products;

const canonicalUrl = ref('');
let windowLocation = window.location.pathname;
canonicalUrl.value = window.location.origin + windowLocation;
const url = ref(window.location.origin);

if (windowLocation == locale + '/category/mobile') {
    type.value = t('categories.main.mobile_ramp_label');
} else if ( windowLocation == locale + '/category/static') {
    type.value = t('categories.main.static_ramp_label');
} else if ( windowLocation == locale + '/category/station') {
    type.value = t('categories.main.station_ramp_label');
}
// show banner depending on posthog opt in or out
const showBanner = ref(!(posthogModule.posthog.has_opted_out_capturing() || posthogModule.posthog.has_opted_in_capturing()));

const showConfigBanner = ref(false)

const showPolicyBanner = ref(false)
</script>

<template>
    <Head>
        <title>{{ $t('categories.category_product_lists', { country: country, type: type}) }}</title>
        <link rel="canonical" :href="canonicalUrl" />
        <meta name="keywords" :content="$t('meta.category_list_station.keywords')" />
        <meta name="description" :content="$t('meta.category_list_station.description')" />
        <meta property="og:url" :content="canonicalUrl" />
        <meta property="og:title" :content="$t('meta.product_list.og:title')" />
        <meta property="og:description" :content="$t('meta.category_list_station.description')" />
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
        <meta property="twitter:description" :content="t('meta.category_list_station.description')" />
        <meta property="twitter:domain" :content="url" />
        <meta property="twitter:card" content="Summary Card" />
        <meta property="twitter:creator" content="@arnoa69" />
        <meta property="twitter:site" content="@JeromeGuiguet" />
    </Head>
    <Layout>
        <div>
            <CategoryDetail :products="products"></CategoryDetail>
        </div>
        <CookieBanner v-if="showBanner" @hideBanner="showBanner = false" @showManageBanner="showConfigBanner = true"
        @showPolicyBanner="showPolicyBanner = true" />

    <ManageCookieBanner v-if="showConfigBanner" @hideConfigBanner="showConfigBanner = false"
        @hideBothBanner="showBanner = false, showConfigBanner = false" />

    <PolicyBanner v-if="showPolicyBanner" @hide-policy-banner="showPolicyBanner = false" />
    </Layout>

</template>
