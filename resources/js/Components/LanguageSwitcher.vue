<script setup>
import { ref } from 'vue';
import { useI18n } from 'vue-i18n';
import { usePage, router } from '@inertiajs/vue3';
import axios from 'axios';

const { availableLocales, locale, t } = useI18n();
const page = usePage();
const currentLocale = ref(locale.value);
const product = page.props.product;

// Translation mappings (this should match your PHP helper values)
const validTypes = {
    'en': { 'mobile': 'mobile-loading-ramp', 'static': 'static', 'container-access-ramps': 'container-access-ramps' },
    'de': { 'mobile': 'mobile-laderampe', 'static': 'fix', 'container-access-ramps': 'container-rampen' },
    'dk': { 'mobile': 'mobil-lasserampe', 'static': 'fast', 'container-access-ramps': 'container-adgangsramper' },
    "et": { 'mobile': 'mobiilne-laadimisramp', 'static': 'staatiline', 'container-access-ramps': 'konteiner-rampid' },
    'es': { 'mobile': 'rampa-de-carga-movil', 'static': 'estatico', 'container-access-ramps': 'rampas-de-acceso-a-contenedores' },
    'fi': { 'mobile': 'siirrettava-lastausramppi', 'static': 'staattinen', 'container-access-ramps': 'kontti-rampit' },
    'fr': { 'mobile': 'rampe-de-chargement-mobile', 'static': 'statique', 'container-access-ramps': 'rampes-access-container' },
    'it': { 'mobile': 'rampa-di-carico-mobile', 'static': 'statico', 'container-access-ramps': 'rampe-di-accesso-container' },
    "lb": { 'mobile': 'mobil-luedrampe', 'static': 'statique', 'container-access-ramps': 'container-zougangsrampen' },
    'nl': { 'mobile': 'mobiele-laadramp', 'static': 'statisch', 'container-access-ramps': 'container-toegangsrampen' },
    'no': { 'mobile': 'mobil-lasterampe', 'static': 'statisk', 'container-access-ramps': 'containeradgangsramper' },
    'pt': { 'mobile': 'rampa-de-carga-movel', 'static': 'estatico', 'container-access-ramps': 'rampas-de-acesso-a-conteineres' },
    'se': { 'mobile': 'mobil-lastningsramp', 'static': 'statisk', 'container-access-ramps': 'containerramper' }
};

const validVersions = {
    'en': { 'standard': 'standard-size', 'llo': 'long-leveler-off', 'xl': 'extra-large', 'llo-xl': 'long-leveler-off-extra-large' },
    'de': { 'standard': 'standard-groesse', 'llo': 'ausfahrende-verlaengerung', 'xl': 'extra-lang', 'llo-xl': 'ausfahrende-verlaengerung-extra-lang' },
    'dk': { 'standard': 'standard-storrelse', 'llo': 'lang-udfyldning', 'xl': 'ekstra-stor', 'llo-xl': 'lang-udfyldning-ekstra-stor' },
    "et": { 'standard': 'vaikimisi-suurus', 'llo': 'pikk-laiend-valja', 'xl': 'ekstra-suur', 'llo-xl': 'pikk-laiend-valja-ekstra-suur' },
    'es': { 'standard': 'tamano-estandar', 'llo': 'alargamiento-largo', 'xl': 'extra-grande', 'llo-xl': 'alargamiento-largo-extra-grande' },
    'fi': { 'standard': 'normaali-koko', 'llo': 'pidentavalennys', 'xl': 'ekstra-suuri', 'llo-xl': 'pidentavalennys-ekstra-suuri' },
    'fr': { 'standard': 'taille-standard', 'llo': 'extension-longue', 'xl': 'tres-grand', 'llo-xl': 'extension-longue-tres-grand' },
    'it': { 'standard': 'dimensione-standard', 'llo': 'allungamento-lunghezza', 'xl': 'extra-grande', 'llo-xl': 'allungamento-lunghezza-extra-grande' },
    "lb": { 'standard': 'normale-grossezza', 'llo': 'extension-longue', 'xl': 'extra-gros', 'llo-xl': 'extension-longue-extra-gros' },
    'nl': { 'standard': 'standaard-grootte', 'llo': 'lange-niveau-uit', 'xl': 'extra-groot', 'llo-xl': 'lange-niveau-uit-extra-groot' },
    'no': { 'standard': 'standard-storrelse', 'llo': 'lang-udfylding', 'xl': 'ekstra-stor', 'llo-xl': 'lang-udfylding-ekstra-stor' },
    'pt': { 'standard': 'tamanho-padrao', 'llo': 'alongamento-longo', 'xl': 'extra-grande', 'llo-xl': 'alongamento-longo-extra-grande' },
    'se': { 'standard': 'standard-storlek', 'llo': 'lang-utbyggnad', 'xl': 'extra-stor', 'llo-xl': 'lang-utbyggnad-extra-stor' }
};

const validOptions = {
    'en': {
        'zr': 'zone-refuge',
        'rl1200': 'side-railings',
        'rl1200p': 'side-railings-prime-xs',
        'rl350': 'side-railings-350',
        'le': 'electric-lift',
        'be': 'electric-crutches',
        'ff': 'fork-slider',
        'ffd': 'double-fork-slider',
        'tt': 'traction-drawbar',
        'gan': 'full-galvanized',
        'gap': 'full-galvanized-prime',
        'gab': 'full-galvanized-bigfoot',
        'gao': 'full-galvanized-otc',
        'tb': 'tarpaulin-tunnel'
    },
    'de': {
        'zr': 'schutzbereich',
        'rl1200': 'seitenreling',
        'rl1200p': 'seitenreling-prime-xs',
        'rl350': 'seitenreling-350',
        'le': 'elektrischer-aufzug',
        'be': 'elektrische-vorschubbruecke',
        'ff': 'gabelschlitten',
        'ffd': 'doppelgabelschlitten',
        'tt': 'zugdeichsel',
        'gan': 'vollverzinkt',
        'gap': 'vollverzinkt-prime',
        'gab': 'vollverzinkt-bigfoot',
        'gao': 'vollverzinkt-otc',
        'tb': 'planentunnel'
    },
    'dk': {
        'zr': 'sikkerhedszone',
        'rl1200': 'sidegardiner',
        'rl1200p': 'sidegardiner-prime-xs',
        'rl350': 'sidegardiner-350',
        'le': 'elektrisk-lift',
        'be': 'elektriske-krykker',
        'ff': 'gaffel-slider',
        'ffd': 'dobbelt-gaffel-slider',
        'tt': 'trakkrog',
        'gan': 'fuld-galvaniseret-forzinket',
        'gap': 'fuld-galvaniseret-forzinket-prime',
        'gab': 'fuld-galvaniseret-forzinket-bigfoot',
        'gao': 'fuld-galvaniseret-forzinket-otc',
        'tb': 'presenning-tunnel'
    },
    "et": {
        'zr': 'turvapiirkond',
        'rl1200': 'poolkorvuti',
        'rl1200p': 'poolkorvuti-prime-xs',
        'rl350': 'poolkorvuti-350',
        'le': 'elektriline-tostuk',
        'be': 'elektrilised-karkud',
        'ff': 'katkestaja-liikumisliidur',
        'ffd': 'topelt-katkestaja-liikumisliidur',
        'tt': 'tombetost',
        'gan': 'taielik-verzinkitud',
        'gap': 'taielik-verzinkitud-prime',
        'gab': 'taielik-verzinkitud-bigfoot',
        'gao': 'taielik-verzinkitud-otc',
        'tb': 'kott-tunnel'
    },
    'es': {
        'zr': 'zona-refugio',
        'rl1200': 'barandillas-laterales',
        'rl1200p': 'barandillas-laterales-prime-xs',
        'rl350': 'barandillas-laterales-350',
        'le': 'elevador-electrico',
        'be': 'muletas-electricas',
        'ff': 'deslizador-de-horquilla',
        'ffd': 'deslizador-de-doble-horquilla',
        'tt': 'barra-de-traccion',
        'gan': 'totalmente-galvanizado',
        'gap': 'totalmente-galvanizado-prime',
        'gab': 'totalmente-galvanizado-bigfoot',
        'gao': 'totalmente-galvanizado-otc',
        'tb': 'tunel-tejado'
    },
    'fi': {
        'zr': 'suojausalue',
        'rl1200': 'sivuraidat',
        'rl1200p': 'sivuraidat-prime-xs',
        'rl350': 'sivuraidat-350',
        'le': 'sahkoinen-lift',
        'be': 'sahkoinen-kepit',
        'ff': 'haarukkaliukus',
        'ffd': 'kaksinkertainen-haarukkaliukus',
        'tt': 'vetotanko',
        'gan': 'taysiksiveroitu',
        'gap': 'taysiksiveroitu-prime',
        'gab': 'taysiksiveroitu-bigfoot',
        'gao': 'taysiksiveroitu-otc',
        'tb': 'paalattiatunnel'
    },
    'fr': {
        'zr': 'zone-refuge',
        'rl1200': 'garde-corps-lateraux',
        'rl1200p': 'garde-corps-lateraux-prime-xs',
        'rl350': 'garde-corps-lateraux-350',
        'le': 'elevateur-electrique',
        'be': 'bequilles-electrique',
        'ff': 'fourreaux-de-fourches-transversaux',
        'ffd': 'double-fourreaux-de-fourches-transversaux',
        'tt': 'barre-de-tirage',
        'gan': 'totalement-galvanise',
        'gap': 'totalement-galvanise-prime',
        'gab': 'totalement-galvanise-bigfoot',
        'gao': 'totalement-galvanise-otc',
        'tb': 'tunnel-toit'
    },
    'it': {
        'zr': 'zona-rifugio',
        'rl1200': 'parapetti-laterali',
        'rl1200p': 'parapetti-laterali-prime-xs',
        'rl350': 'parapetti-laterali-350',
        'le': 'ascensore-elettrico',
        'be': 'crutch-elettriche',
        'ff': 'slittino-a-forca',
        'ffd': 'doppio-slittino-a-forca',
        'tt': 'barra-di-trazione',
        'gan': 'completamente-galvanizzato',
        'gap': 'completamente-galvanizzato-prime',
        'gab': 'completamente-galvanizzato-bigfoot',
        'gao': 'completamente-galvanizzato-otc',
        'tb': 'tunnel-tetto'
    },
    "lb": {
        'zr': 'zone-refuge',
        'rl1200': 'barrieres-laterales',
        'rl1200p': 'barrieres-laterales-prime-xs',
        'rl350': 'barrieres-laterales-350',
        'le': 'ascenseur-electrique',
        'be': 'bequilles-electriques',
        'ff': 'glissiere-de-fourche',
        'ffd': 'double-glissiere-de-fourche',
        'tt': 'barre-de-tirage',
        'gan': 'totalement-galvanise',
        'gap': 'totalement-galvanise-prime',
        'gab': 'totalement-galvanise-bigfoot',
        'gao': 'totalement-galvanise-otc',
        'tb': 'tunnel-toit'
    },
    'nl': {
        'zr': 'zone-refuge',
        'rl1200': 'zijleuningen',
        'rl1200p': 'zijleuningen-prime-xs',
        'rl350': 'zijleuningen-350',
        'le': 'elektrische-lift',
        'be': 'elektrische-krukken',
        'ff': 'vork-slider',
        'ffd': 'dubbele-vork-slider',
        'tt': 'trekhaak',
        'gan': 'volledig-galvaniseerd',
        'gap': 'volledig-galvaniseerd-prime',
        'gab': 'volledig-galvaniseerd-bigfoot',
        'gao': 'volledig-galvaniseerd-otc',
        'tb': 'dak-tunnel'
    },
    'no': {
        'zr': 'sone-tilflukt',
        'rl1200': 'side-rekkverk',
        'rl1200p': 'side-rekkverk-prime-xs',
        'rl350': 'side-rekkverk-350',
        'le': 'elektrisk-heis',
        'be': 'elektriske-krykker',
        'ff': 'gaffel-skyve',
        'ffd': 'dobbel-gaffel-skyve',
        'tt': 'trekkstang',
        'gan': 'full-galvanisert',
        'gap': 'full-galvanisert-prime',
        'gab': 'full-galvanisert-bigfoot',
        'gao': 'full-galvanisert-otc',
        'tb': 'taggaller'
    },
    'pt': {
        'zr': 'zona-refugio',
        'rl1200': 'guardas-laterais',
        'rl1200p': 'guardas-laterais-prime-xs',
        'rl350': 'guardas-laterais-350',
        'le': 'elevador-eletrico',
        'be': 'muletas-eletricas',
        'ff': 'deslizante-de-garfos',
        'ffd': 'duplo-deslizante-de-garfos',
        'tt': 'barra-de-tracao',
        'gan': 'totalmente-galvanizado',
        'gap': 'totalmente-galvanizado-prime',
        'gab': 'totalmente-galvanizado-bigfoot',
        'gao': 'totalmente-galvanizado-otc',
        'tb': 'tunel-telhado'
    },
    'se': {
        'zr': 'zon-skydd',
        'rl1200': 'sidoracken',
        'rl1200p': 'sidoracken-prime-xs',
        'rl350': 'sidoracken-350',
        'le': 'elektrisk-hiss',
        'be': 'elektriska-kryckor',
        'ff': 'gaffel-skjutare',
        'ffd': 'dubbel-gaffel-skjutare',
        'tt': 'dragstang',
        'gan': 'helt-galvaniserad',
        'gap': 'helt-galvaniserad-prime',
        'gab': 'helt-galvaniserad-bigfoot',
        'gao': 'helt-galvaniserad-otc',
        'tb': 'takkup'
    }
};

const languageNames = {
    'de': t('lang.de'),
    'dk': t('lang.dk'),
    'et': t('lang.et'),
    'en': t('lang.en'),
    'es': t('lang.es'),
    'fi': t('lang.fi'),
    'fr': t('lang.fr'),
    'it': t('lang.it'),
    'lb': t('lang.lb'),
    'nl': t('lang.nl'),
    'no': t('lang.no'),
    'pt': t('lang.pt'),
    'se': t('lang.se')
};

const changeLang = (locale) => {
    return languageNames[locale] || locale;
}

const translateSlug = (base_name, type, slug, currentLocale, newLocale) => {

    if (type === 'container-access-ramps') {
        const translatedType = validTypes[newLocale][type];
        let path = `/${newLocale}/${translatedType}`;

        // Füge die Version zur URL hinzu
        path += `/${validVersions[newLocale]['standard']}`;

        // Überprüfen, ob "gal" im Slug enthalten ist
        if (slug.includes('-gal')) {
            path += `/${validOptions[newLocale]['gan']}`;
        } else {
            path += '/no-option';
        }

        // Füge den vollständigen Slug am Ende hinzu
        path += `/${slug}`;
        return path;
    }

    let regex;
    if (base_name === 'easy-xl' || base_name === 'prime-xs' || base_name === 'big-foot' || base_name === 'star-otc') {
        regex = /^(?:[^-]+-){5}((?:standard|llo-xl|llo|xl))(?:$|-(.+))/;
    } else {
        regex = /^(?:[^-]+-){4}((?:standard|llo-xl|llo|xl))(?:$|-(.+))/;
    }

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
            newPath = translateSlug(page.props.product.base_name, page.props.product.type, page.props.product.slug, currentLocale.value, newLocale);
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
            <option v-for="locale in availableLocales" :key="locale" :value="locale">{{ changeLang(locale) }}</option>
        </select>
    </div>
</template>

<style scoped>
.language-switcher select {
    margin-left: 1rem;
}
</style>
