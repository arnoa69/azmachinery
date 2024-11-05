<script setup>
import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import Layout from "../../Layouts/ProductLayout.vue";
import ProductList from "../../Shared/Frontend/Products/ProductList.vue";
import CookieBanner from '@/Shared/Cookiebanner/CookieBanner.vue';
import ManageCookieBanner from '@/Shared/Cookiebanner/ManageCookieBanner.vue';
import PolicyBanner from '@/Shared/Cookiebanner/PolicyBanner.vue';
import { posthogModule } from '@/plugins/posthog'

const products = ref([]);
const { props } = usePage();
products.value = props.products;

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
    <meta property="og:title"
        :content="$t('meta.product_list.og:title')" />
    <meta property="og:description"
        :content="$t('meta.product_list.description')" />
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
    <meta property="twitter:title"
        :content="$t('meta.product_list_view_title')" />
    <meta property="twitter:description"
        :content="$t('meta.product_list.description')" />
    <meta property="twitter:domain" :content="url" />
    <meta property="twitter:card" content="Summary Card" />
    <meta property="twitter:creator" content="@arnoa69" />
    <meta property="twitter:site" content="@JeromeGuiguet" />

  </Head>
  <Layout>

    <div class="pagetitle">
        <ProductList :products="products"></ProductList>
    </div> <!-- End Page Title -->
    <CookieBanner v-if="showBanner" @hideBanner="showBanner = false" @showManageBanner="showConfigBanner = true"
        @showPolicyBanner="showPolicyBanner = true" />

    <ManageCookieBanner v-if="showConfigBanner" @hideConfigBanner="showConfigBanner = false"
        @hideBothBanner="showBanner = false, showConfigBanner = false" />

    <PolicyBanner v-if="showPolicyBanner" @hide-policy-banner="showPolicyBanner = false" />
  </Layout>
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</template>

<style scoped>
.services .img {
  border-radius: 8px;
  overflow: hidden;
}

.services .img img {
  transition: 0.6s;
}

.services .details {
  padding: 50px 30px;
  margin: -100px 30px 0 30px;
  transition: all ease-in-out 0.3s;
  background: #fff;
  opacity: 0.9;
  position: relative !important;
  text-align: center;
  border-radius: 8px;
  box-shadow: 0px 0 25px rgba(var(--color-black-rgb), 0.1);
}

.services .details .icon {
  margin: 0;
  width: 72px;
  height: 72px;
  background: #ff0000;
  border-radius: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
  color: #fff;
  font-size: 28px;
  transition: ease-in-out 0.3s;
  position: absolute;
  top: -36px;
  left: calc(50% - 36px);
  border: 6px solid #fff;
}

.services .details h3 {
  color: #000;
  font-weight: 700;
  margin: 10px 0 15px 0;
  font-size: 22px;
  transition: ease-in-out 0.3s;
}

.services .details p {
  line-height: 24px;
  font-size: 14px;
  margin-bottom: 0;
}

.services .service-item:hover .details h3 {
  color: #999;
}

.services .service-item:hover .details .icon {
  background: #000;
  border: 2px solid #fff;
}

.services .service-item:hover .details .icon i {
  color: #fff;
}

.services .service-item:hover .img img {
  transform: scale(1.2);
}
</style>
