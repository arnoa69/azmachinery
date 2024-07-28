<script setup>
import { ref } from 'vue';
import { useI18n } from 'vue-i18n';
import { Inertia } from '@inertiajs/inertia';
import { usePage, router } from '@inertiajs/vue3';
import axios from 'axios';

const { availableLocales, locale } = useI18n();
const page = usePage();
const currentLocale = ref(locale.value);
const product = page.props.product;

// Translation mappings (this should match your PHP helper values)
const validTypes = {
    'en': { 'mobile': 'mobile-loading-ramp', 'static': 'static', 'container': 'container' },
    'de': { 'mobile': 'mobile-laderampe', 'static': 'fix', 'container': 'container' },
    'dk': { 'mobile': 'mobil-lasserampe', 'static': 'fast', 'container': 'container' },
    'ee': { 'mobile': 'mobiilne-laadimisramp', 'static': 'staatiline', 'container': 'container' },
    'es': { 'mobile': 'rampa-de-carga-movil', 'static': 'estatico', 'container': 'container' },
    'fi': { 'mobile': 'siirrettava-lastausramppi', 'static': 'staattinen', 'container': 'container' },
    'fr': { 'mobile': 'rampe-de-chargement-mobile', 'static': 'statique', 'container': 'container' },
    'it': { 'mobile': 'rampa-di-carico-mobile', 'static': 'statico', 'container': 'container' },
    'lu': { 'mobile': 'mobil-luedrampe', 'static': 'statique', 'container': 'container' },
    'ne': { 'mobile': 'mobiele-laadramp', 'static': 'statisch', 'container': 'container' },
    'no': { 'mobile': 'mobil-lasterampe', 'static': 'statisk', 'container': 'container' },
    'pt': { 'mobile': 'rampa-de-carga-movel', 'static': 'estatico', 'container': 'container' },
    'se': { 'mobile': 'mobil-lastningsramp', 'static': 'statisk', 'container': 'container' }
};

const validVersions = {
  'en': { 'standard': 'standard-size', 'llo': 'long-leveler-off', 'xl': 'extra-large', 'llo-xl': 'long-leveler-off-extra-large' },
  'de': { 'standard': 'standard-groesse', 'llo': 'ausfahrende-verlaengerung', 'xl': 'extra-lang', 'llo-xl': 'ausfahrende-verlaengerung-extra-lang' },
  'dk': { 'standard': 'standard-storrelse', 'llo': 'lang-udfyldning', 'xl': 'ekstra-stor', 'llo-xl': 'lang-udfyldning-ekstra-stor' },
  'ee': { 'standard': 'vaikimisi-suurus', 'llo': 'pikk-laiend-valja', 'xl': 'ekstra-suur', 'llo-xl': 'pikk-laiend-valja-ekstra-suur' },
  'es': { 'standard': 'tamano-estandar', 'llo': 'alargamiento-largo', 'xl': 'extra-grande', 'llo-xl': 'alargamiento-largo-extra-grande' },
  'fi': { 'standard': 'normaali-koko', 'llo': 'pidentavalennys', 'xl': 'ekstra-suuri', 'llo-xl': 'pidentavalennys-ekstra-suuri' },
  'fr': { 'standard': 'taille-standard', 'llo': 'extension-longue', 'xl': 'tres-grand', 'llo-xl': 'extension-longue-tres-grand' },
  'it': { 'standard': 'dimensione-standard', 'llo': 'allungamento-lunghezza', 'xl': 'extra-grande', 'llo-xl': 'allungamento-lunghezza-extra-grande' },
  'lu': { 'standard': 'normale-grossezza', 'llo': 'extension-longue', 'xl': 'extra-gros', 'llo-xl': 'extension-longue-extra-gros' },
  'ne': { 'standard': 'standaard-grootte', 'llo': 'lange-niveau-uit', 'xl': 'extra-groot', 'llo-xl': 'lange-niveau-uit-extra-groot' },
  'no': { 'standard': 'standard-storrelse', 'llo': 'lang-udfylding', 'xl': 'ekstra-stor', 'llo-xl': 'lang-udfylding-ekstra-stor' },
  'pt': { 'standard': 'tamanho-padrao', 'llo': 'alongamento-longo', 'xl': 'extra-grande', 'llo-xl': 'alongamento-longo-extra-grande' },
  'se': { 'standard': 'standard-storlek', 'llo': 'lang-utbyggnad', 'xl': 'extra-stor', 'llo-xl': 'lang-utbyggnad-extra-stor' }
};

const validOptions = {
  'en': { 'zr': 'zone-refuge', 'rl': 'side-railings', 'e': 'electric', 'ff': 'fork-slider', 'gal': 'full-galvanized', 'tb': 'tarpaulin-tunnel' },
  'de': { 'zr': 'sicherheitszone', 'rl': 'seitengelaender', 'e': 'elektrisch', 'ff': 'gabelschieber', 'gal': 'vollverzinkt', 'tb': 'planendach' },
  'dk': { 'zr': 'sikkerhedszone', 'rl': 'sidegardiner', 'e': 'elektrisk', 'ff': 'skiftebærer', 'gal': 'fuld-forzinket', 'tb': 'tagtunnel' },
  'ee': { 'zr': 'tervitsi-aladus', 'rl': 'poolkorvuti', 'e': 'elektriksne', 'ff': 'katkestaja-liikumisliidur', 'gal': 'taielik-verzinkitud', 'tb': 'tagukoog' },
  'es': { 'zr': 'zona-refugio', 'rl': 'railes-laterales', 'e': 'electrico', 'ff': 'deslizador-de-bastidor', 'gal': 'totalmente-galvanizado', 'tb': 'tunel-tejado' },
  'fi': { 'zr': 'suojausalue', 'rl': 'sivuseitit', 'e': 'sahkoinen', 'ff': 'kaaripistooli', 'gal': 'taysiksiveroitu', 'tb': 'paalattiatunnel' },
  'fr': { 'zr': 'zone-refuge', 'rl': 'parapets-lateraux', 'e': 'electrique', 'ff': 'glissiere-baton', 'gal': 'totalement-galvanise', 'tb': 'tunnel-toit' },
  'it': { 'zr': 'zona-rifugio', 'rl': 'parapetti-laterali', 'e': 'elettrico', 'ff': 'cambia-slittamento', 'gal': 'totalmente-galvanizzato', 'tb': 'tunnel-tetto' },
  'lu': { 'zr': 'zone-refuge', 'rl': 'parapets-lateraux', 'e': 'electrique', 'ff': 'glissiere-baton', 'gal': 'totalement-galvanise', 'tb': 'tunnel-toit' },
  'ne': { 'zr': 'zone-refugie', 'rl': 'rail-laterale', 'e': 'electrisch', 'ff': 'schuifbalk', 'gal': 'volledig-verzinkt', 'tb': 'dak-tunnel' },
  'no': { 'zr': 'sikkerhetszone', 'rl': 'sidekanter', 'e': 'elektisk', 'ff': 'skifteskytter', 'gal': 'fullt-verzinket', 'tb': 'taggaller' },
  'pt': { 'zr': 'zona-refugio', 'rl': 'parede-lateral', 'e': 'eletrico', 'ff': 'deslizador-do-eixo', 'gal': 'totalmente-galvanizado', 'tb': 'tunel-telhado' },
  'se': { 'zr': 'sakerhetszon', 'rl': 'sidokanter', 'e': 'elektrisk', 'ff': 'vaxelskytt', 'gal': 'fullt-galvaniserad', 'tb': 'takkup' }
};

const translateSlug = (type, slug, currentLocale, newLocale) => {
  // Define your regex pattern to extract version and options
  const regex = /^(?:[^-]+-){4}((?:standard|llo-xl|llo|xl))(?:$|-(.+))/;

  // Extract version and options using regex
  const match = slug.match(regex);
  if (!match) {
    throw new Error('Invalid slug format');
  }

  const version = match[1];
  const options = match[2] ? match[2].split('-') : [];

  // Translate version and options to new locale
  const translatedType = validTypes[newLocale][type];
  const translatedVersion = validVersions[newLocale][version];
  const translatedOptions = options.length === 0 ? 'no-option' : options.map(opt => validOptions[newLocale][opt]).join('/');


  // Construct the new URL
  return `/${newLocale}/${translatedType}/${translatedVersion}/${translatedOptions}/${slug}`;
};

const changeLanguage = async (event) => {
  const newLocale = event.target.value;

  try {
    // First, update the locale on the server
    const response = await axios.post(`/change-locale/${newLocale}`);

    if (response.status !== 200) {
      throw new Error('Failed to change locale');
    }

    // If successful, update local state
    locale.value = newLocale;
    localStorage.setItem('locale', newLocale);

    let newPath;

    if (route().current('products.show') && page.props.product) {
      newPath = translateSlug(page.props.product.type, page.props.product.slug, currentLocale.value, newLocale);
    } else if (route().current('home')) {
      newPath = route('home', { locale: newLocale });
    } else {
      // For any other route, replace the locale in the current URL
      let currentPath = window.location.pathname;
      const localeRegex = /^\/[a-z]{2}\//;
      if (localeRegex.test(currentPath)) {
        newPath = '/' + newLocale + currentPath.substring(3);
      } else {
        newPath = '/' + newLocale + currentPath;
      }
    }
    // Use Inertia to navigate to the new path
    router.visit(newPath, { preserveState: false });

  } catch (error) {
    console.error('Error changing locale:', error);
  }
};
</script>

<template>
  <div class="language-switcher">
    <select @change="changeLanguage" v-model="currentLocale">
      <option v-for="locale in availableLocales" :key="locale" :value="locale">{{ locale }}</option>
    </select>
  </div>
</template>

<style scoped>
.language-switcher select {
  margin-left: 1rem;
}
</style>
