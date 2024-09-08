<script setup>
import HeaderSection from '@/Components/Layouts/Layout1/HeaderSection.vue';
import FooterSection from '@/Components/Layouts/Layout1/FooterSection.vue';
import { getProductImages } from '@/utils/imageUtil';
import { ref, computed, onMounted, onUnmounted } from 'vue';

const props = defineProps({
  product: Object, // Definiere den prop für das Produkt
  isDetailView: Boolean
});

const isMobileView = ref(false);
const updateMobileView = () => {
  isMobileView.value = window.innerWidth <= 767.98;
};

onMounted(() => {
  updateMobileView();
  window.addEventListener('resize', updateMobileView);
});

onUnmounted(() => {
  window.removeEventListener('resize', updateMobileView);
});

const isGalvanized = (slug) => {
    const galvanizedKeywords = ['gan', 'gal', 'gab', 'gap', 'gao'];
    return galvanizedKeywords.some(keyword => slug.includes(keyword));
};

const defaultImage = ref('/img/header/bg-header-products.jpg');
const mainDetailViewImage = computed(() => {
  if (props.isDetailView && props.product) {
    const { main } = getProductImages(props.product.base_name, isGalvanized(props.product.slug));
    return main;
  }
  return null; // Fallback, wenn nicht im Detailansicht
});

const backgroundStyle = computed(() => {
  const image = props.isDetailView
    ? mainDetailViewImage.value
    : defaultImage.value;

  return {
    backgroundImage: `url(${image})`
  };
});

</script>


<template>
    <HeaderSection />
    <!-- Page Title -->
    <div v-if="(isDetailView && isMobileView) || !isMobileView" class="page-title dark-background" :style="backgroundStyle">
      <div class="container position-relative">
        <!-- <h1>{{ $t('products.details.sidebar.category_list') }}</h1> -->
        <h1></h1>
      </div>
    </div><!-- End Page Title -->
    <main id="main">
        <slot />
    </main>
    <FooterSection />
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</template>

<style scoped>
#main {
    margin: auto;
    width: 100%;
    padding: 10px;
    background-color: #fbfbfb;
}

@media (max-width: 767.98px) {
  .page-title {
    height: 350px; /* Setze die Höhe des Elements */
    background-size: cover; /* Stelle sicher, dass das Hintergrundbild den gesamten Bereich abdeckt */
    background-position: center; /* Zentriere das Hintergrundbild */
    border-bottom-left-radius: 20px; /* Runde die untere linke Ecke */
    border-bottom-right-radius: 20px; /* Runde die untere rechte Ecke */
    display: flex; /* Flexbox verwenden, um den Inhalt zu zentrieren */
    align-items: center; /* Vertikale Zentrierung */
    justify-content: center; /* Horizontale Zentrierung */
}
.page-title:before {
        background-color: transparent;
    }
}
</style>
