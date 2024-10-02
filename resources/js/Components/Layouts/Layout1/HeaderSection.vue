<script setup>
import LanguageSwitcher from '@/Components/LanguageSwitcher.vue';
import { useI18n } from 'vue-i18n';
import { getCountryName } from '@/utils/localizedSlugMixin';

const { locale } = useI18n();

const country = getCountryName();
</script>

<template>
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <div class="logo d-flex align-items-center">
        <a  href="/"><img src="../../../../../public/img/az-machinery-logo.png" alt="" class="img-fluid"></a>
        <h1 class="sitename">AZ Machinery {{ country }}</h1>
      </div>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/#about">{{ $t('header.about') }}</a></li>
          <li class="dropdown"><a :href="`/${locale}/products`"><span>{{ $t('header.products') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li class="dropdown"><a :href="`/${locale}/products/?type=mobile`"><span>{{ $t('header.menu.type-mobile') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a :href="`/${locale}/products/star`">{{ $t("header.menu.star") }}</a></li>
                  <li><a :href="`/${locale}/products/prime-xs`">{{ $t("header.menu.prime-xs") }}</a></li>
                  <li><a :href="`/${locale}/products/easy-xl`">{{ $t("header.menu.easy-xl") }}</a></li>
                  <li><a :href="`/${locale}/products/wlo`">{{ $t("header.menu.wlo") }}</a></li>
                  <li><a :href="`/${locale}/products/star-otc`">{{ $t("header.menu.star-otc") }}</a></li>
                  <li><a :href="`/${locale}/products/big-foot`">{{ $t("header.menu.big-foot") }}</a></li>
                </ul>
              </li>
              <li class="dropdown"><a :href="`/${locale}/products/?type=container`"><span>{{ $t('header.menu.type-container') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a :href="`/${locale}/products/hcrn-06`">{{ $t("header.menu.hcrn-06") }}</a></li>
                  <li><a :href="`/${locale}/products/hcrn-065`">{{ $t("header.menu.hcrn-065") }}</a></li>
                  <li><a :href="`/${locale}/products/hcrn-08`">{{ $t("header.menu.hcrn-08") }}</a></li>
                  <li><a :href="`/${locale}/products/hcry-08`">{{ $t("header.menu.hcry-08") }}</a></li>
                  <li><a :href="`/${locale}/products/secu-dock`">{{ $t("header.menu.secu-dock") }}</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a :href="`/${locale}/contact`">{{ $t('header.contact') }}</a></li>
          <li><hr class="divider"/></li>
          <li>
            <LanguageSwitcher class="language" />
          </li>
          <li> <a class="btn-getstarted" :href="`/${locale}/get-a-quote`">{{ $t('header.getQuote') }}</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

</template>

<style scoped>
@media screen and (max-width: 768px) {
    .divider {
        border: 1px solid #000;
    }
    .language {
        float: right;
        margin-top: 35px;
        margin-right: 20px;
    }
}
</style>
