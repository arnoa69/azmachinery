<script setup>
import LanguageSwitcher from '@/Components/LanguageSwitcher.vue';
import { useI18n } from 'vue-i18n';

const { locale } = useI18n();
</script>

<template>
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <div class="logo d-flex align-items-center">
        <a  href="/"><img src="../../../../../public/img/az-machinery-logo.png" alt="" class="img-fluid"></a>
        <h1 class="sitename">AZ Machinery</h1> <span>.</span>
      </div>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/#about">{{ $t('header.about') }}</a></li>
          <li class="dropdown"><a href="#"><span>{{ $t('header.products') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a :href="`/${locale}/products`">{{ $t('header.menu.productList') }}</a></li>
              <li class="dropdown"><a :href="`/${locale}/categories`"><span>{{ $t('header.menu.types') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a :href="`/${locale}/category/mobile`">{{ $t("categories.main.mobile_ramp_label") }}</a></li>
                  <li><a :href="`/${locale}/category/static`">{{ $t("categories.main.static_ramp_label") }}</a></li>
                  <li><a :href="`/${locale}/category/station`">{{ $t("categories.main.station_ramp_label") }}</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="/#features">{{ $t('header.features') }}</a></li>
          <li><a href="/#gallery">{{ $t('header.gallery') }}</a></li>
          <li><a href="/#testimonials">{{ $t('header.testimonials') }}</a></li>
          <li><a href="/#contact">{{ $t('header.contact') }}</a></li>
          <li>
            <LanguageSwitcher />
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

</template>

<style scoped>


</style>
