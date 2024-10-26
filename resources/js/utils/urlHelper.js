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
        'tb': 'tarpaulin-tunnel' },
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
        'tb': 'planentunnel' },
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
        'tb': 'presenning-tunnel' },
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
        'tb': 'kott-tunnel' },
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
        'tb': 'tunel-tejado' },
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
        'tb': 'paalattiatunnel' },
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
        'tb': 'tunnel-toit' },
    'it': {                 'zr': 'zona-rifugio',
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
        'tb': 'tunnel-tetto' },
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
        'tb': 'tunnel-toit' },
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
        'tb': 'dak-tunnel' },
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
        'tb': 'taggaller' },
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
        'tb': 'tunel-telhado' },
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
        'tb': 'takkup' }
};

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
    'en': { 'standard': 'standard-size', 'llo': 'long-leveler-off', 'xl': 'extra-large', 'lloxl': 'long-leveler-off-extra-large' },
    'de': { 'standard': 'standard-groesse', 'llo': 'ausfahrende-verlaengerung', 'xl': 'extra-lang', 'lloxl': 'ausfahrende-verlaengerung-extra-lang' },
    'dk': { 'standard': 'standard-storrelse', 'llo': 'lang-udfyldning', 'xl': 'ekstra-stor', 'lloxl': 'lang-udfyldning-ekstra-stor' },
    "et": { 'standard': 'vaikimisi-suurus', 'llo': 'pikk-laiend-valja', 'xl': 'ekstra-suur', 'lloxl': 'pikk-laiend-valja-ekstra-suur' },
    'es': { 'standard': 'tamano-estandar', 'llo': 'alargamiento-largo', 'xl': 'extra-grande', 'lloxl': 'alargamiento-largo-extra-grande' },
    'fi': { 'standard': 'normaali-koko', 'llo': 'pidentavalennys', 'xl': 'ekstra-suuri', 'lloxl': 'pidentavalennys-ekstra-suuri' },
    'fr': { 'standard': 'taille-standard', 'llo': 'extension-longue', 'xl': 'tres-grand', 'lloxl': 'extension-longue-tres-grand' },
    'it': { 'standard': 'dimensione-standard', 'llo': 'allungamento-lunghezza', 'xl': 'extra-grande', 'lloxl': 'allungamento-lunghezza-extra-grande' },
    "lb": { 'standard': 'normale-grossezza', 'llo': 'extension-longue', 'xl': 'extra-gros', 'lloxl': 'extension-longue-extra-gros' },
    'nl': { 'standard': 'standaard-grootte', 'llo': 'lange-niveau-uit', 'xl': 'extra-groot', 'lloxl': 'lange-niveau-uit-extra-groot' },
    'no': { 'standard': 'standard-storrelse', 'llo': 'lang-udfylding', 'xl': 'ekstra-stor', 'lloxl': 'lang-udfylding-ekstra-stor' },
    'pt': { 'standard': 'tamanho-padrao', 'llo': 'alongamento-longo', 'xl': 'extra-grande', 'lloxl': 'alongamento-longo-extra-grande' },
    'se': { 'standard': 'standard-storlek', 'llo': 'lang-utbyggnad', 'xl': 'extra-stor', 'lloxl': 'lang-utbyggnad-extra-stor' }
};


const regex = /^(?:[^-]+-){4}((?:standard|llo-xl|llo|xl))(?:$|-(.+))/;
function generateUrl(slug, version, type, locale, pdf=false) {

    const parts = slug.split('-');
    let path = '';

    // Find the index of the version in the parts array
    const versionIndex = parts.indexOf(version);

    // Extract options starting from the part after the version
    const options = versionIndex >= 0 ? parts.slice(versionIndex + 1) : [];
    // Überprüfen, ob der Typ "container" ist
    if (type === 'container-access-ramps') {
        const translatedType = validTypes[locale][type];

        if(pdf) {
            path = `/${translatedType}`;
        } else {
            path = `/${locale}/${translatedType}`;
        }

        // Add the version to the path
        path += `/${validVersions[locale]['standard']}`;

        // Überprüfen, ob "gal" im Slug enthalten ist
        if (slug.includes('-gal')) {
            path += `/${validOptions[locale]['gan']}`;
        } else {
            path += '/no-option';
        }

        // Add the full slug at the end
        path += `/${slug}`;
        return path;
    }

    const translatedType = validTypes[locale][type];

    if(pdf) {
        path = `/${translatedType}`;
    } else {
        path = `/${locale}/${translatedType}`;
    }

    // Add the version to the path
    path += `/${validVersions[locale][version] || version}`;

    // Add options to the path
    if (options.length > 0) {
        options.forEach(option => {
            path += `/${validOptions[locale][option] || option}`;
        });
    } else {
        path += '/no-option';
    }

    // Add the full slug at the end
    path += `/${slug}`;

    return path;
}



export default generateUrl;
