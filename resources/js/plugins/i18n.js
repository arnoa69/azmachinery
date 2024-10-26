import { createI18n } from 'vue-i18n';
import messages from '@intlify/unplugin-vue-i18n/messages';

const userLanguage = localStorage.getItem('locale') || window.navigator.language.substring(0, 2);
const availableLocales = ['de', 'dk', 'et', 'en', 'es', 'fi', 'fr', 'it', 'lb', 'nl', 'no', 'pt', 'se'];

export const i18n = createI18n({
    legacy: false,
    globalInjection: true,
    locale: getLocaleFromUrl() || userLanguage,
    fallbackLocale: 'en',
    availableLocales: availableLocales,
    messages: messages,
})

function getLocaleFromUrl() {
    const url = new URL(window.location.href);
    const pathSegments = url.pathname.split('/');

    // Check if the second segment of the path matches an available locale
    if (pathSegments.length > 1 && availableLocales.includes(pathSegments[1])) {
      return pathSegments[1];
    }

    return null;
}
