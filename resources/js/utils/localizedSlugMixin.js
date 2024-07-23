//localizedSlugMixin.js
import { useI18n } from 'vue-i18n';


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
      } else if (locale.value === 'nl') {
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
