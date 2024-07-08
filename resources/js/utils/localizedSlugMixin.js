//localizedSlugMixin.js
import { useI18n } from 'vue-i18n';

export function getLocalizedSlug(product) {
    const { locale } = useI18n();
    let localizedSlug = '';

    if (locale.value === 'en') {
        localizedSlug = product.slug;
      } else if (locale.value === 'de') {
        localizedSlug = product.slug_de;
      } else if (locale.value === 'dk') {
        localizedSlug = product.slug_dk;
      } else if (locale.value === 'ee') {
        localizedSlug = product.slug_ee;
      } else if (locale.value === 'es') {
        localizedSlug = product.slug_es;
      } else if (locale.value === 'fi') {
        localizedSlug = product.slug_fi;
      } else if (locale.value === 'fr') {
        localizedSlug = product.slug_fr;
      } else if (locale.value === 'it') {
        localizedSlug = product.slug_it;
      } else if (locale.value === 'lu') {
        localizedSlug = product.slug_lu;
      } else if (locale.value === 'ne') {
        localizedSlug = product.slug_ne;
      } else if (locale.value === 'no') {
        localizedSlug = product.slug_no;
      } else if (locale.value === 'pt') {
        localizedSlug = product.slug_pt;
      } else if (locale.value === 'se') {
        localizedSlug = product.slug_se;
      } else {
        localizedSlug = product.slug;
      }

      return localizedSlug;
}

export function getLocalizedCountry() {
    const { locale } = useI18n();
    let countryName = '';

    if (locale.value === 'en') {
        countryName = 'England';
      } else if (locale.value === 'de') {
        countryName = 'Deutschland';
      } else if (locale.value === 'dk') {
        countryName = 'Danmark';
      } else if (locale.value === 'ee') {
        countryName = 'Eesti';
      } else if (locale.value === 'es') {
        countryName = 'España';
      } else if (locale.value === 'fi') {
        countryName = 'Suomen';
      } else if (locale.value === 'fr') {
        countryName = 'France';
      } else if (locale.value === 'it') {
        countryName = 'Italia';
      } else if (locale.value === 'lu') {
        countryName = 'Lëtzebuerg';
      } else if (locale.value === 'ne') {
        countryName = 'Nederland';
      } else if (locale.value === 'no') {
        countryName = 'Norge';
      } else if (locale.value === 'pt') {
        countryName = 'Portugal';
      } else if (locale.value === 'se') {
        countryName = 'Sverige';
      } else {
        countryName = 'whole World';
      }
      return countryName;
}
