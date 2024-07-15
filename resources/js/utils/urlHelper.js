const validOptions = {
    en: {
        zr: 'zone-refuge',
        rl: 'side-railings',
        e: 'electric',
        ff: 'fork-slider',
        gal: 'full-galvanized',
        tb: 'tarpaulin-tunnel'
    },
    de: {
        zr: 'sicherheitszone',
        rl: 'seitengelaender',
        e: 'elektrisch',
        ff: 'gabelschieber',
        gal: 'vollverzinkt',
        tb: 'planendach'
    }
};

const validTypes = {
    en: {
        mobile: 'mobile',
        static: 'static',
        container: 'container',
    },
    de: {
        mobile: 'mobil',
        static: 'fix',
        container: 'container',
    }
};

const validVersions = {
    en: {
        standard: 'standard-size',
        llo: 'long-leveler-off',
        xl: 'extra-large',
        llo_xl: 'long-leveler-off-extra-large'
    },
    de: {
        standard: 'standard-groesse',
        llo: 'ausfahrende-verlaengerung',
        xl: 'extra-lang',
        llo_xl: 'ausfahrende-verlaengerung-extra-lang'
    }
};


const regex = /^(?:[^-]+-){4}((?:standard|llo-xl|llo|xl))(?:$|-(.+))/;
function generateUrl(slug, type, locale) {
    const match = slug.match(regex);
    if (!match) return null;

    const version = match[1];
    const options = match[2] ? match[2].split('-') : [];

    // Add the translated type to the path
    const translatedType = validTypes[locale][type];
    let path = `/${locale}/${translatedType}`;

    let versionKey = version.replace('-', '_');
    path += `/${validVersions[locale][versionKey] || version}`;

    // Add options to the path, excluding those that are part of the version
    options.forEach(option => {
        if (version !== 'llo-xl' || (option !== 'llo' && option !== 'xl')) {
            path += `/${validOptions[locale][option] || option}`;
        }
    });

    // Add the full slug at the end
    path += `/${slug}`;

    return path;
}



export default generateUrl;
