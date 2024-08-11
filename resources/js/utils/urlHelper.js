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
    'nl': { 'zr': 'zone-refugie', 'rl': 'rail-laterale', 'e': 'electrisch', 'ff': 'schuifbalk', 'gal': 'volledig-verzinkt', 'tb': 'dak-tunnel' },
    'no': { 'zr': 'sikkerhetszone', 'rl': 'sidekanter', 'e': 'elektisk', 'ff': 'skifteskytter', 'gal': 'fullt-verzinket', 'tb': 'taggaller' },
    'pt': { 'zr': 'zona-refugio', 'rl': 'parede-lateral', 'e': 'eletrico', 'ff': 'deslizador-do-eixo', 'gal': 'totalmente-galvanizado', 'tb': 'tunel-telhado' },
    'se': { 'zr': 'sakerhetszon', 'rl': 'sidokanter', 'e': 'elektrisk', 'ff': 'vaxelskytt', 'gal': 'fullt-galvaniserad', 'tb': 'takkup' }
};

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
    'nl': { 'mobile': 'mobiele-laadramp', 'static': 'statisch', 'container': 'container' },
    'no': { 'mobile': 'mobil-lasterampe', 'static': 'statisk', 'container': 'container' },
    'pt': { 'mobile': 'rampa-de-carga-movel', 'static': 'estatico', 'container': 'container' },
    'se': { 'mobile': 'mobil-lastningsramp', 'static': 'statisk', 'container': 'container' }
};

const validVersions = {
    'en': { 'standard': 'standard-size', 'llo': 'long-leveler-off', 'xl': 'extra-large', 'lloxl': 'long-leveler-off-extra-large' },
    'de': { 'standard': 'standard-groesse', 'llo': 'ausfahrende-verlaengerung', 'xl': 'extra-lang', 'lloxl': 'ausfahrende-verlaengerung-extra-lang' },
    'dk': { 'standard': 'standard-storrelse', 'llo': 'lang-udfyldning', 'xl': 'ekstra-stor', 'lloxl': 'lang-udfyldning-ekstra-stor' },
    'ee': { 'standard': 'vaikimisi-suurus', 'llo': 'pikk-laiend-valja', 'xl': 'ekstra-suur', 'lloxl': 'pikk-laiend-valja-ekstra-suur' },
    'es': { 'standard': 'tamano-estandar', 'llo': 'alargamiento-largo', 'xl': 'extra-grande', 'lloxl': 'alargamiento-largo-extra-grande' },
    'fi': { 'standard': 'normaali-koko', 'llo': 'pidentavalennys', 'xl': 'ekstra-suuri', 'lloxl': 'pidentavalennys-ekstra-suuri' },
    'fr': { 'standard': 'taille-standard', 'llo': 'extension-longue', 'xl': 'tres-grand', 'lloxl': 'extension-longue-tres-grand' },
    'it': { 'standard': 'dimensione-standard', 'llo': 'allungamento-lunghezza', 'xl': 'extra-grande', 'lloxl': 'allungamento-lunghezza-extra-grande' },
    'lu': { 'standard': 'normale-grossezza', 'llo': 'extension-longue', 'xl': 'extra-gros', 'lloxl': 'extension-longue-extra-gros' },
    'nl': { 'standard': 'standaard-grootte', 'llo': 'lange-niveau-uit', 'xl': 'extra-groot', 'lloxl': 'lange-niveau-uit-extra-groot' },
    'no': { 'standard': 'standard-storrelse', 'llo': 'lang-udfylding', 'xl': 'ekstra-stor', 'lloxl': 'lang-udfylding-ekstra-stor' },
    'pt': { 'standard': 'tamanho-padrao', 'llo': 'alongamento-longo', 'xl': 'extra-grande', 'lloxl': 'alongamento-longo-extra-grande' },
    'se': { 'standard': 'standard-storlek', 'llo': 'lang-utbyggnad', 'xl': 'extra-stor', 'lloxl': 'lang-utbyggnad-extra-stor' }
};


const regex = /^(?:[^-]+-){4}((?:standard|llo-xl|llo|xl))(?:$|-(.+))/;
function generateUrl(slug, version, type, locale) {

    const parts = slug.split('-');

    // Find the index of the version in the parts array
    const versionIndex = parts.indexOf(version);

    // Extract options starting from the part after the version
    const options = versionIndex >= 0 ? parts.slice(versionIndex + 1) : [];

    const translatedType = validTypes[locale][type];
    let path = `/${locale}/${translatedType}`;

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
