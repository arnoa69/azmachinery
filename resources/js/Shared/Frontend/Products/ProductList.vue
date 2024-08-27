<script setup>
import CategorySidebar from "../../../Components/Layouts/Layout1/Sidebar/CategorySidebar.vue";
import HelpSidebar from "../../../Components/Layouts/Layout1/Sidebar/HelpSidebar.vue";
import generateUrl from '@/utils/urlHelper';
import { ref, computed } from "vue";
import { useI18n } from 'vue-i18n';
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const { locale } = useI18n();

const regex = /\/products\/star{1,4}?$/;

const showFilter = regex.test(page.url) ? 1 : 0;

const page_or_slug = ref('product_list');
const selectedFilter = ref('standard');

const props = defineProps({
    products: {
        type: Object,
        required: true,
    },
});
const generateFreshUrl = (slug, version, type) => {
    return generateUrl(slug, version, type, locale.value);
}

// Function to set the filter
const setFilter = (filter) => {
    selectedFilter.value = filter;
}

const filteredProducts = computed(() => {
    if (!selectedFilter.value) {
        return props.products;
    }
    return props.products.filter(product => product.version === selectedFilter.value);
});

const getProductImage = (product) => {
    const options = product.slug.split('-').slice(5);
    if (options.includes('gan')) {
        return '/img/products/small/rampe-full-galvanized_thumb.jpg';
    }
    switch (product.version) {
        case 'lloxl':
            return '/img/products/small/star-llo-xl_thumb.jpg';
        case 'llo':
            return '/img/products/small/star-llo_thumb.jpg';
        case 'xl':
            return '/img/products/small/star-xl_thumb.jpg';
        default:
            return '/img/products/small/rampes-star_thumb.jpg';
    }
};

</script>

<template>
    <section id="about" class="about">
        <div class="container">
            <div class="section-title">
                <h1>{{ $t("products.list.title") }}</h1>
                <h2>{{ $t("products.details.title") }}</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch justify-content-center justify-content-lg-start">
                    <!-- BEGIN LEFT SIDBAR -->
                    <div class="row categories-list">
                        <div class="service-details">
                            <HelpSidebar :page_or_slug="page_or_slug"/>
                            <CategorySidebar />
                        </div>
                    </div>
                </div> <!-- END LEFT SIDBAR -->
                <div class="col-lg-8 d-flex flex-column align-items-stretch"> <!-- BEGIN RIGHT SIDBAR -->
                                <!-- Filter Links -->
                    <div v-if="showFilter" class="filter-links">
                        <div class="filter-links">
                            <a href="#" :class="{'active standard': selectedFilter === 'standard'}" @click.prevent="setFilter('standard')">Standard</a>
                            <a href="#" :class="{'active llo': selectedFilter === 'llo'}" @click.prevent="setFilter('llo')">LLO</a>
                            <a href="#" :class="{'active xl': selectedFilter === 'xl'}" @click.prevent="setFilter('xl')">XL</a>
                            <a href="#" :class="{'active lloxl': selectedFilter === 'lloxl'}" @click.prevent="setFilter('lloxl')">LLO XL</a>
                            <a href="#" class="hidden-columns" :class="{'active': selectedFilter === ''}" @click.prevent="setFilter('')">All</a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row table-head">
                            <div class="col-md-2 col-sm-6">
                            </div>
                            <div class="col-md-8 col-sm-6">
                                {{ $t('products.list.table.head.code') }}
                            </div>
                            <div class="col-md-2 col-sm-6">
                                {{ $t('products.list.table.head.price') }}
                            </div>
                        </div>
                        <div v-for="product in filteredProducts" :key="product.id" class="row striped">
                            <a :href="generateFreshUrl(product.slug, product.version, product.type)" class="product-link">
                            <div class="col-2 col-sm-2">
                                    <img class="circle-image" :src="getProductImage(product)" alt="test">
                            </div>
                            <div class="col-7 col-sm-8 mobile-text-size">
                                {{ product.name }}
                            </div>
                            <div class="mobile-text-size col-3 col-sm-2">{{ product.total_price }} &#8364;</div>
                             </a>
                        </div>
                    </div>
                </div> <!-- END RIGHT SIDBAR -->
            </div> <!-- END row -->
        </div> <!-- END Container -->
    </section>
</template>

<style scoped>
.circle-image {
    width: 35px;
    height: 35px;
    border-radius: 10%;
    object-fit: cover;
    object-position: center;
    margin-left: 10px;
}

.link {
    color: #141313;
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

    font-weight: 500;
    text-transform: uppercase;
}

.row.striped {
    padding: 0.1rem;
    border-bottom: solid 1px black;
}

.row.striped:hover{
    background: #1e1d1d;
    color: white !important;
}
.product-row {
    background-color: white;
}

.product-link {
    display: flex;
    align-items: center;
    width: 100%;
    text-decoration: none;
    color: black;
    padding: 0;
}

.product-link:hover {
    background-color: black;
    color: white;
}

@media (max-width: 767.98px) {
    .row.table-head {
        display: none;
    }

    .hidden-columns {
        display: none;
        visibility: hidden;
    }

    .mobile-text-size {
        font-size: 11px;
        margin-top: 3px;
        padding-left: 5px;
    }

}

.pds_phone {
    width: 100%;
    padding-left: 15px;
    padding-right: 15px;
    margin-top: -20px;
}

.submit-button {
    margin-top: 15px;
    width: 100%;
    border: none;
    height: 35px;
}

.form-check-label {
    font-size: 12px;
}

.form-check {
    margin-top: 10px;
}

.filter-links {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.filter-links a {
    display: block;
    padding: 10px 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background-color: #f8f9fa;
    color: #333;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
}

.filter-links a:hover {
    background-color: #e9ecef;
    color: #000;
}

.filter-links a.active.standard {
    background-color: red;
    color: #fff;
}

.filter-links a.active.llo {
    background-color: darkgreen;
    color: #fff;
}

.filter-links a.active.xl {
    background-color: turquoise;
    color: #fff;
}

.filter-links a.active.lloxl {
    background-color: darkblue;
    color: #fff;
}
</style>
