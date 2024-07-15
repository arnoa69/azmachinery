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
  'en': { 'mobile': 'mobile', 'static': 'static', 'container': 'container' },
  'de': { 'mobile': 'mobil', 'static': 'fix', 'container': 'container' }
};

const validVersions = {
  'en': { 'standard': 'standard-size', 'llo': 'long-leveler-off', 'xl': 'extra-large', 'llo-xl': 'long-leveler-off-extra-large' },
  'de': { 'standard': 'standard-groesse', 'llo': 'ausfahrende-verlaengerung', 'xl': 'extra-lang', 'llo-xl': 'ausfahrende-verlaengerung-extra-lang' }
};

const validOptions = {
  'en': { 'zr': 'zone-refuge', 'rl': 'side-railings', 'e': 'electric', 'ff': 'fork-slider', 'gal': 'full-galvanized', 'tb': 'tarpaulin-tunnel' },
  'de': { 'zr': 'sicherheitszone', 'rl': 'seitengelaender', 'e': 'elektrisch', 'ff': 'gabelschieber', 'gal': 'vollverzinkt', 'tb': 'planendach' }
};

const translateUrlComponent = (component, translations) => {
  const entry = Object.entries(translations).find(([key, value]) => key === component || value === component);
  return entry ? entry[0] : component;
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
  const translatedOptions = options.map(opt => validOptions[newLocale][opt]).join('/');

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
