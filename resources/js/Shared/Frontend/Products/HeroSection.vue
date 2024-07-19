<script setup>
import { onMounted, ref } from "vue";
import { useI18n } from "vue-i18n";

const { t } = useI18n();
const heroImage = "../../../../public/img/hero-img.png";
const heroTitle = t("hero.title.start") + " <span>" + t("hero.title.end") + "</span>";

onMounted(() => {
  // Load Google Analytics script
  const script = document.createElement("script");
  script.src = "https://www.googletagmanager.com/gtag/js?id=G-8HZRGE0NZ8";
  script.async = true;
  document.head.appendChild(script);

  // Initialize Google Analytics
  window.dataLayer = window.dataLayer || [];
  function gtag() {
    dataLayer.push(arguments);
  }
  gtag("js", new Date());
  gtag("config", "G-8HZRGE0NZ8");
});
</script>

<template>
  <!-- Existing hero section content here -->
  <section id="hero">
    <div class="container">
      <div class="row justify-content-between">
        <div
          class="col-lg-12 order-1 pt-5 pt-lg-0 order-lg-1 d-flex align-items-center"
        >
          <h1 class="hero-title" v-html="heroTitle"></h1>
        </div>
      </div>
    </div>
  </section>


</template>

<style scoped>

#hero {
  position: relative;
  z-index: 1;
  height: 200px;
  display: flex;
  text-align: center; /* Center the heroTitle horizontally */
}

h1.hero-title {
  font-size: 48px;
  font-weight: 700;
  color: #291ea5;
  margin-bottom: 10px;
  width: 100% !important; /* Set the width to 100% for centering */
  text-align: center;
  white-space: nowrap; /* Prevent the span from breaking to the next row */
  display: inline-block; /* Set the display to inline-block */
  z-index: 20;
  padding-top: 50px;
}

@media (max-width: 991px) {
  #hero {
    height: 150px;
    padding-top:36px !important;
    }
  }

/* Desktop (XL) */
@media (min-width: 1255px) {
  .col-inner {
    margin-top: -300px;
  }
}

/* Add any additional styling as needed */
</style>
