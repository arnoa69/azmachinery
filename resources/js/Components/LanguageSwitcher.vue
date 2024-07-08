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

function localizeSlug(locale, product) {
    if (!product) {
      return null; // Or handle the case where product is not defined
    }

    // Construct the slug key based on the provided locale
    const slugKey = locale === 'en' ? 'slug' : `slug_${locale}`;
    // Return the localized slug if it exists, otherwise fall back to the default slug

    return product[slugKey] || product.slug;
  }

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
      const localizedSlug = localizeSlug(newLocale, page.props.product);
      newPath = route('products.show', { locale: newLocale, slug: localizedSlug });
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

// const changeLanguage = (event) => {
//   const newLocale = event.target.value;
//   locale.value = newLocale;

//   // Store the selected locale in local storage
//   localStorage.setItem('locale', newLocale);

//   let newPath = `${newLocale}${page.url.replace(/^\/[a-z]{2}/, '') || '/'}`;

//   if ( product ) {
//     const localizedSlug = localizeSlug(newLocale, page.props.product);
//     newPath = `/${newLocale}/products/${localizedSlug}`;
//   }
//   Inertia.visit(newPath, { preserveState: false});

// };

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
