<script setup>
import HeaderSection from '@/Components/Layouts/Layout1/HeaderSection.vue';
import FooterSection from '@/Components/Layouts/Layout1/FooterSection.vue';
import { ref, computed } from 'vue'

const props = defineProps({
  product: Object, // Definiere den prop für das Produkt
  isDetailView: Boolean
});
console.log('product detailsss ', props.product)
const imagePath = ref('/../../../img/header/bg-header-products2.jpg');
const randomImages = [
  '/../../../img/products/normal/test1.jpg',
  '/../../../img/products/normal/test1.jpg',
  '/../../../img/products/normal/test1.jpg'
];

const backgroundStyle = computed(() => {
  const image = props.isDetailView
    ? randomImages[Math.floor(Math.random() * randomImages.length)]
    : imagePath.value;

  return {
    backgroundImage: `url(${image})`
  };
});

</script>


<template>
    <HeaderSection />
    <!-- Page Title -->
    <div class="page-title dark-background" :style="backgroundStyle">
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
    }
    @media (min-width: 767.98px) {
      .page-title {
    color: var(--default-color);
    background-color: var(--background-color);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 160px 0 60px 0;
    text-align: center;
    position: relative;
  }
  .page-title:before {
    content: "";
    background-color: color-mix(in srgb, var(--background-color), transparent 40%);
    position: absolute;
    inset: 0;
  }
    }




  .page-title h1 {
    font-size: 36px;
    font-weight: 500;
    margin-bottom: 10px;
  }

  .page-title .breadcrumbs ol {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    justify-content: center;
    padding: 0;
    margin: 0;
    font-size: 16px;
    font-weight: 500;
  }

  .page-title .breadcrumbs ol li+li {
    padding-left: 10px;
  }

  .page-title .breadcrumbs ol li+li::before {
    content: "/";
    display: inline-block;
    padding-right: 10px;
    color: color-mix(in srgb, var(--default-color), transparent 20%);
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
}
</style>
