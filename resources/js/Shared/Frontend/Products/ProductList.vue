<script setup>
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

const extractedType = page.url.split('products/')[1].split('/')[0];

const props = defineProps({
    products: {
        type: Object,
        required: true,
    },
});

const isContainerRamp = props.products.some(product => product.type === 'container-access-ramps');
const selectedFilter = ref(isContainerRamp ? '' : 'standard');

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

</script>

<template>
    <section id="about" class="about">
        <div class="container">
            <div class="section-title">
                <h1>{{ $t("products.list.title", { base_name: extractedType.toUpperCase() }) }}</h1>
                <h2>{{ $t("products.details.title") }}</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch justify-content-center justify-content-lg-start">
                    <!-- BEGIN LEFT SIDBAR -->
                    <div class="row categories-list">
                        <div class="service-details">
                            <HelpSidebar :page_or_slug="page_or_slug" />
                        </div>
                    </div>
                </div> <!-- END LEFT SIDBAR -->
                <div class="col-lg-8 d-flex flex-column align-items-stretch"> <!-- BEGIN RIGHT SIDBAR -->
                    <!-- Filter Links -->
                    <div v-if="showFilter" class="filter-links">
                        <div class="filter-links">
                            <a href="#" :class="{ 'active standard': selectedFilter === 'standard' }"
                                @click.prevent="setFilter('standard')">Standard</a>
                            <a href="#" :class="{ 'active llo': selectedFilter === 'llo' }"
                                @click.prevent="setFilter('llo')">LLO</a>
                            <a href="#" :class="{ 'active xl': selectedFilter === 'xl' }"
                                @click.prevent="setFilter('xl')">XL</a>
                            <a href="#" :class="{ 'active lloxl': selectedFilter === 'lloxl' }"
                                @click.prevent="setFilter('lloxl')">LLO XL</a>
                            <a href="#" class="hidden-columns" :class="{ 'active': selectedFilter === '' }"
                                @click.prevent="setFilter('')">All</a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row table-head">
                            <div class="col-md-2 col-sm-6">
                                {{ $t('products.list.table.head.availability') }}
                            </div>
                            <div class="col-md-8 col-sm-6">
                                {{ $t('products.list.table.head.name') }}
                            </div>
                            <div class="col-md-2 col-sm-6 text-end">
                                {{ $t('products.list.table.head.price') }}
                            </div>
                        </div>
                        <div v-for="product in filteredProducts" :key="product.id" class="row striped">
                            <a :href="generateFreshUrl(product.slug, product.version, product.type)"
                                class="product-link">
                                <div class="col-2 col-sm-2">
                                    <span v-if="product.weight_capacity >= 6 && product.weight_capacity < 15"
                                        class="badge badge-pill bg-success text-white d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill me-1"></i>
                                        <span class="d-none d-md-inline">{{ $t('products.list.available') }}</span>
                                    </span>

                                    <!-- Not stock -->
                                    <span v-else
                                        class="badge badge-pill bg-warning text-dark d-flex align-items-center">
                                        <i class="bi bi-hourglass-split me-1"></i>
                                        <span class="d-none d-md-inline">{{ $t('products.list.not-available') }}</span>
                                    </span>
                                </div>
                                <div class="col-7 col-sm-8 mobile-text-size">
                                    {{ product.name }}
                                </div>
                                <div class="mobile-text-size col-3 col-sm-2 text-end">{{ product.total_price }} &#8364;</div>
                            </a>
                        </div>
                    </div>
                </div> <!-- END RIGHT SIDBAR -->
            </div> <!-- END row -->
        </div> <!-- END Container -->
    </section>
</template>

<style scoped>
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

.row.striped:hover {
    background: #1e1d1d;
    color: white !important;
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

/* Flexbox layout for columns */
.row.striped .col-2 {
  flex: 0 0 60px; /* Ensures the badge column is as wide as needed */
  max-width: 110px;
}

.row.striped .col-7 {
  flex: 1; /* Allows the product name to take up the remaining space */
  margin-left: 20px;
}

.row.striped .col-3 {
  flex: 0 0 auto;
  max-width: 90px; /* Ensures the price column doesn't take too much space */
}

.text-end {
  text-align: right;
}

/* Mobile adjustments */
@media (max-width: 767.98px) {
  .row.table-head {
    display: none;
  }
  .section-title h1 {
       font-size: 24px !important;
}

  .hidden-columns {
    display: none;
    visibility: hidden;
  }

  /* Mobile text size adjustments */
  .mobile-text-size {
    font-size: 11px;
    margin-top: 3px;
    padding-left: 5px;
  }

  /* Adjust flexbox for narrow screens */
  .row.striped .col-2 {
    flex: 0 0 50px; /* Make the badge column narrower on mobile */
    max-width: 28px;
  }

  .row.striped .col-7 {
    margin-left: 2px;
  }

  .row.striped .col-3 {
    max-width: 70px; /* Reduce max width for the price column */
  }
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
