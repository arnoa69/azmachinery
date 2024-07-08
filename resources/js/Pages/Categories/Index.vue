<script setup>
import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import Layout from "../../Layouts/ProductLayout.vue";
import { useI18n } from "vue-i18n";
import CookieBanner from '@/Shared/Cookiebanner/CookieBanner.vue';
import ManageCookieBanner from '@/Shared/Cookiebanner/ManageCookieBanner.vue';
import PolicyBanner from '@/Shared/Cookiebanner/PolicyBanner.vue';
import { posthogModule } from '@/plugins/posthog'

const { locale, t } = useI18n();
const ogTitle = ref(t("categories.main.head.og:title"));


const categoryImage01 = "/img/category/category-mobile.jpg";
const categoryImage03 = "/img/category/category-static.jpg";
const categoryImage02 = "/img/category/category-station.jpg";
const url = ref(window.location.origin);

const canonicalUrl = ref('');
        canonicalUrl.value = window.location.origin + window.location.pathname;

const products = ref([]);
const { props } = usePage();

products.value = props.products;

// show banner depending on posthog opt in or out
const showBanner = ref(!(posthogModule.posthog.has_opted_out_capturing() || posthogModule.posthog.has_opted_in_capturing()));

const showConfigBanner = ref(false)

const showPolicyBanner = ref(false)

</script>

<template>
  <Head>
    <title>{{ $t('categories.main.head.title') }}</title>
    <link rel="canonical" :href="canonicalUrl" />
    <meta name="keywords" :content="$t('meta.category_list_mobile.keywords')" />
    <meta name="description" :content="$t('meta.category_list_mobile.description')" />
    <meta property="og:title" :content="ogTitle" />
    <meta property="og:url" :content="canonicalUrl" />
    <meta property="og:description" :content="$t('meta.category_list_mobile.description')" />
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
    <meta property="twitter:description" :content="$t('meta.category_list_mobile.description')" />
    <meta property="twitter:domain" :content="url" />
    <meta property="twitter:card" content="Summary Card" />
    <meta property="twitter:creator" content="@arnoa69" />
    <meta property="twitter:site" content="@JeromeGuiguet" />
  </Head>
  <Layout>
    <div class="pagetitle">
      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container" data-aos="fade-up">
          <div class="section-header">
            <h2>{{ $t('categories.main.title') }}</h2>
            <p>
                {{ $t('categories.main.description') }}
            </p>
          </div>

          <div class="row gy-5">
            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
              <div class="service-item">
                <div class="img">
                  <img :src="categoryImage01" class="img-fluid" alt="" />
                </div>
                <div class="details position-relative">
                  <div class="icon">
                    <i class="bi bi-box-arrow-up-right"></i>
                  </div>
                  <a :href="`/${locale}/category/mobile`" class="stretched-link">
                    <h3>{{ $t('categories.main.mobile_ramp_label') }}</h3>
                  </a>
                  <p>
                    {{ $t('categories.main.mobile_ramp_description') }}
                  </p>
                </div>
              </div>
            </div>
            <!-- End Service Item -->

            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
              <div class="service-item">
                <div class="img">
                  <img :src="categoryImage02" class="img-fluid" alt="" />
                </div>
                <div class="details position-relative">
                  <div class="icon">
                    <i class="bi bi-box-arrow-up-right"></i>
                  </div>
                  <a :href="`/${locale}/category/station`" class="stretched-link">
                    <h3>{{ $t('categories.main.station_ramp_label') }}</h3>
                  </a>
                  <p>
                    {{ $t('categories.main.station_ramp_description') }}
                  </p>
                </div>
              </div>
            </div>
            <!-- End Service Item -->

            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
              <div class="service-item">
                <div class="img">
                  <img :src="categoryImage03" class="img-fluid" alt="" />
                </div>
                <div class="details position-relative">
                  <div class="icon">
                    <i class="bi bi-box-arrow-up-right"></i>
                  </div>
                  <a :href="`/${locale}/category/static`" class="stretched-link">
                    <h3>{{ $t('categories.main.static_ramp_label') }}</h3>
                  </a>
                  <p>
                    {{ $t('categories.main.static_ramp_description') }}
                  </p>
                </div>
              </div>
            </div>
            <!-- End Service Item -->
          </div>
        </div>
      </section>
      <!-- End Services Section -->
    </div>
    <!-- End Page Title -->
    <CookieBanner v-if="showBanner" @hideBanner="showBanner = false" @showManageBanner="showConfigBanner = true"
        @showPolicyBanner="showPolicyBanner = true" />

    <ManageCookieBanner v-if="showConfigBanner" @hideConfigBanner="showConfigBanner = false"
        @hideBothBanner="showBanner = false, showConfigBanner = false" />

    <PolicyBanner v-if="showPolicyBanner" @hide-policy-banner="showPolicyBanner = false" />
  </Layout>
</template>

<style scoped>
.section-header {
    text-align: justify;
}
.stretched-link {
  text-decoration: none;
}
.services .img {
  border-radius: 8px;
  overflow: hidden;
  border: 3px solid #000;
}

.services .img img {
  transition: 0.6s;
}

.services .details {
  padding: 50px 30px;
  margin: -45px 30px 0 30px;
  transition: all ease-in-out 0.3s;
  background: #ebe9e9;
  opacity: 0.8;
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
