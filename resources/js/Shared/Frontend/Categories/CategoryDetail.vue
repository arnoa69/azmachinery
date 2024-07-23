<script setup>
import CategorySidebar from "../../../Components/Layouts/Layout1/Sidebar/CategorySidebar.vue";
import HelpSidebar from "../../../Components/Layouts/Layout1/Sidebar/HelpSidebar.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import { useI18n } from "vue-i18n";
import { getLocalizedCountry } from '../../../utils/localizedSlugMixin';

const { locale, t } = useI18n();

const country = ref(getLocalizedCountry());
const type = ref('');
const phone_number = ref('');
const props = defineProps({
    products: {
        type: Object,
        required: true,
    },
});
const canonicalUrl = ref('');
let windowLocation = window.location.pathname;
canonicalUrl.value = window.location.origin + windowLocation;

if (windowLocation == '/category/mobile') {
    type.value = t('categories.main.mobile_ramp_label');
} else if ( windowLocation == '/category/static') {
    type.value = t('categories.main.static_ramp_label');
} else if ( windowLocation == '/category/station') {
    type.value = t('categories.main.station_ramp_label');
}
</script>

<template>
    <Head>
        <title>{{ $t('categories.category_product_lists', { country: country, type: type}) }}</title>
        <link rel="canonical" :href="canonicalUrl" />
    </Head>
    <section id="category-detail" class="about">
        <div class="container">
            <div class="section-title">
                <h1 v-if="route().params.type == 'static'">{{ $t("categories.main.static_ramp_label") }}</h1>
                <h1 v-if="route().params.type == 'mobile'">{{ $t("categories.main.mobile_ramp_label") }}</h1>
                <h1 v-if="route().params.type == 'station'">{{ $t("categories.main.station_ramp_label") }}</h1>
                <h2>{{ $t("products.details.title") }}</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch justify-content-center justify-content-lg-start">
                    <!-- BEGIN LEFT SIDBAR -->

                    <div class="row categories-list">
                        <div class="service-details">
                            <CategorySidebar />
                            <HelpSidebar :phone_number="phone_number"/>
                        </div>
                    </div>
                </div> <!-- END LEFT SIDBAR -->
                <div class="col-lg-8 d-flex flex-column align-items-stretch"> <!-- BEGIN RIGHT SIDBAR -->
                    <div class="container">
                        <div class="row table-head">
                            <div class="col-md-3 col-sm-6">
                                {{ $t('products.list.table.head.image') }}
                            </div>
                            <div class="col-md-3 col-sm-6">
                                {{ $t('products.list.table.head.code') }}
                            </div>
                            <div class="col-md-3 col-sm-6">
                                {{ $t('products.list.table.head.handle_modus') }}
                            </div>
                            <div class="col-md-3 col-sm-6">
                                {{ $t('products.list.table.head.price') }}
                            </div>
                        </div>
                        <div v-for="product in products" :key="product.id" class="row striped">

                            <div class="col-4 col-sm-3">
                                <a class="link" :href="`/${locale}/products/${product.slug}`">
                                <img class="circle-image" :src="`/img/products/small/${product.product_image}thumb.jpg`" :alt="$t(`products.${product.product_code}.layout1.product_name`)">
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 small-text">
                                <a class="link" :href="`/${locale}/products/${product.slug}`">
                                    {{ product.product_code }}
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 hidden-columns">
                                <a class="link" :href="`/${locale}/products/${product.slug}`">
                                {{ product.operation }}
                                </a>
                            </div>
                            <div class="col-4 col-sm-3">
                                {{ product.product_price }}
                            </div>

                        </div>
                    </div>
                </div> <!-- END RIGHT SIDBAR -->
            </div> <!-- END row -->
        </div> <!-- END Container -->
    </section>
</template>

<style scoped>
.circle-image {
    width: 65px;
    height: 65px;
    border-radius: 50%;
    object-fit: cover;
    object-position: center;
}

.link {
    color: #f7f0f0;
    text-decoration: none;
}

.categories-list {
    margin-top: 10px;
    margin-bottom: 20px;
}

.service-details .service-box {
    padding: 20px;
    box-shadow: 0px 2px 20px rgba(194, 193, 193, 0.6);
}

.service-details .service-box+.service-box {
    margin-top: 30px;
}

.service-details .service-box h4 {
    font-size: 20px;
    font-weight: 700;
    border-bottom: 2px solid rgba(235, 233, 233, 0.9);
    padding-bottom: 15px;
    margin-bottom: 15px;
}

.service-details .services-list a {
    color: rgba(47, 49, 51, 0.8);
    background-color: rgba(244, 244, 244, 0.9);
    display: flex;
    align-items: center;
    padding: 12px 15px;
    margin-top: 15px;
    transition: 0.3s;
    text-decoration: none;
}

.service-details .services-list .form-check {
    color: rgba(47, 49, 51, 0.8);
    background-color: rgba(244, 244, 244, 0.9);
    display: flex;
    align-items: center;
    padding: 8px 40px;
    margin-top: 15px;
    transition: 0.3s;
    text-decoration: none;
}

.form-check-label {
    padding-left: 10px;
    margin-top: 5px;
}

.service-details .services-list a:first-child {
    margin-top: 0;
}

.service-details .services-list a i {
    font-size: 16px;
    margin-right: 8px;
    color: var(--accent-color);
}

.service-details .services-list a.active {
    color: #fff;
    background-color: rgba(232, 69, 69, 0.9);
}

.service-details .services-list a.active i {
    color: var(--contrast-color);
}

.service-details .services-list a:hover {
    color: #fff;
    background-color: rgba(232, 69, 69, 0.9);
}

.service-details .download-catalog a {
    color: var(--default-color);
    display: flex;
    align-items: center;
    padding: 10px 0;
    transition: 0.3s;
    border-top: 1px solid rgba(var(--default-color-rgb), 0.1);
}

.service-details .download-catalog a:first-child {
    border-top: 0;
    padding-top: 0;
}

.service-details .download-catalog a:last-child {
    padding-bottom: 0;
}

.service-details .download-catalog a i {
    font-size: 24px;
    margin-right: 8px;
    color: var(--accent-color);
}

.service-details .download-catalog a:hover {
    color: var(--accent-color);
}

.service-details .help-box {
    background-color: rgba(232, 69, 69, 0.9);
    color: #fff;
    margin-top: 30px;
    padding: 30px 15px;
}

.service-details .help-box .help-icon {
    font-size: 48px;
}

.service-details .help-box h4,
.service-details .help-box a {
    color: var(--contrast-color);
}

.service-details .services-img {
    margin-bottom: 20px;
}

.service-details h3 {
    font-size: 26px;
    font-weight: 700;
}

.service-details p {
    font-size: 15px;
}

.service-details ul {
    list-style: none;
    padding: 0;
    font-size: 15px;
}

.service-details ul li {
    padding: 5px 0;
    display: flex;
    align-items: center;
}

.service-details ul i {
    font-size: 20px;
    margin-right: 8px;
    color: var(--accent-color);
}

/* The table as div layers */
.row.table-head {
    color: #fff;
    background: #1c1a1a;
    padding: 1rem;
    font-weight: 500;
    text-transform: uppercase;
}

.row.striped {
    color: #ffffff;
    padding: 1rem;
    background: #e34040;
}

.row.striped:nth-child(odd) {
    background: #b83939;
}

.row.striped:focus,
.row.striped:hover {
    background: #c32115;
}

.row.striped .col-4.col-sm-3:nth-child(2),
.row.striped .col-4.col-sm-3:nth-child(3),
.row.striped .col-4.col-sm-3:nth-child(4) {
    font-weight: 600;
    padding-top: 18px;
}

@media (max-width: 767.98px) {
    .row.table-head {
        display: none;
    }

    .hidden-columns {
        display: none;
        visibility: hidden;
    }

    .small-text {
        font-size: 12px;
    }
}
</style>
