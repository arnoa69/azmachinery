//localizedSlugMixin.js
import { useI18n } from 'vue-i18n';


export function getLocalizedCountry() {
    const { locale, t } = useI18n();
    let countryName = '';

    if (locale.value === 'en') {
        countryName = t('meta.product_detail_view.countries.great-britain');
      } else if (locale.value === 'de') {
        countryName = t('meta.product_detail_view.countries.germany');
      } else if (locale.value === 'dk') {
        countryName = t('meta.product_detail_view.countries.denmark');
      } else if (locale.value === 'ee') {
        countryName = t('meta.product_detail_view.countries.estonia');
      } else if (locale.value === 'es') {
        countryName = t('meta.product_detail_view.countries.spain');
      } else if (locale.value === 'fi') {
        countryName = t('meta.product_detail_view.countries.finland');
      } else if (locale.value === 'fr') {
        countryName = t('meta.product_detail_view.countries.france');
      } else if (locale.value === 'it') {
        countryName = t('meta.product_detail_view.countries.italy');
      } else if (locale.value === 'lu') {
        countryName = t('meta.product_detail_view.countries.luxembourg');
      } else if (locale.value === 'nl') {
        countryName = t('meta.product_detail_view.countries.netherlands');
      } else if (locale.value === 'no') {
        countryName = t('meta.product_detail_view.countries.norway');
      } else if (locale.value === 'pt') {
        countryName = t('meta.product_detail_view.countries.portugal');
      } else if (locale.value === 'se') {
        countryName = t('meta.product_detail_view.countries.sweden');
      } else {
        countryName = 'whole World';
      }
      return countryName;
}
