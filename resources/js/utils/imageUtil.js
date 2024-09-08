export const getProductImages = (baseName, isGalvanized) => {
    let images = {
        main: null,
        additional: []
    };

    const galvanizedImages = {
        'big-foot': [
            '/img/products/big-foot/galva/big-foot-galvanized.jpg',
            '/img/products/big-foot/galva/big-foot-galvanized-05.jpg',
            '/img/products/big-foot/galva/big-foot-galvanized-02.jpg',
            '/img/products/big-foot/galva/big-foot-galvanized-03.jpg',
            '/img/products/big-foot/galva/big-foot-galvanized-04.jpg',
        ],
        'star': [
            '/img/products/star/galva/star-galvanized.jpg',
            '/img/products/star/galva/star-galvanized-01.jpg',
            '/img/products/star/galva/star-galvanized-02.jpg',
            '/img/products/star/galva/star-galvanized-03.jpg',
            '/img/products/star/galva/star-galvanized-04.jpg',
        ],
        'star-otc': [
            '/img/products/galvanized/rampe_mobile_galvanized.png',
            '/img/products/star-otc/star-otc-1.jpg',
            '/img/products/star-otc/star-otc-2.jpg',
            '/img/products/star-otc/star-otc-3.jpg',
            '/img/products/star-otc/star-otc-4.jpg',
        ],
        'hcrn-06': [
            '/img/products/hcrn-06/galva/hcrn-06-galvanized.jpg',
            '/img/products/hcrn-06/hcrn-06-1.jpg',
            '/img/products/hcrn-06/hcrn-06-2.jpg',
            '/img/products/hcrn-06/hcrn-06-3.jpg',
            '/img/products/hcrn-06/hcrn-06-4.jpg',
        ],
        'hcrn-08': [
            '/img/products/hcrn-06/galva/hcrn-06-galvanized.jpg',
            '/img/products/hcrn-06/hcrn-06-1.jpg',
            '/img/products/hcrn-06/hcrn-06-2.jpg',
            '/img/products/hcrn-06/hcrn-06-3.jpg',
            '/img/products/hcrn-06/hcrn-06-4.jpg',
        ],
        'hcry-08': [
            '/img/products/hcry-08/hcry-08.jpg',
            '/img/products/hcry-08/hcry-08.jpg',
            '/img/products/hcry-08/hcry-08-2.jpg',
            '/img/products/hcry-08/hcry-08-3.jpg',
            '/img/products/hcry-08/hcry-08-1.jpg',
        ],
        'hcrn-065': [
            '/img/products/hcrn-065/galva/hcrn-065-galvanized.jpg',
            '/img/products/hcrn-065/hcrn-065.jpg',
            '/img/products/hcrn-065/hcrn-065-2.jpg',
            '/img/products/hcrn-065/hcrn-065-3.jpg',
            '/img/products/hcrn-065/hcrn-065-4.jpg',
        ],
        'prime-xs': [
            '/img/products/prime-xs/galva/prime-xs-galvanized.jpg',
            '/img/products/prime-xs/prime-xs-1.jpg',
            '/img/products/prime-xs/prime-xs-2.jpg',
            '/img/products/prime-xs/prime-xs-3.jpg',
            '/img/products/prime-xs/prime-xs-rl.jpg',
        ],
        'secu-dock': [
            '/img/products/secu-dock/secu-dock.jpg',
            '/img/products/secu-dock/secu-dock-1.jpg',
            '/img/products/secu-dock/secu-dock-2.jpg',
            '/img/products/secu-dock/secu-dock.jpg',
            '/img/products/secu-dock/secu-dock-3.jpg',
        ],
        'wlo': [
            '/img/products/wlo/galva/wlo-galvanized.jpg',
            '/img/products/wlo/galva/wlo-galvanized-01.jpg',
            '/img/products/wlo/galva/wlo-galvanized-02.jpg',
            '/img/products/wlo/galva/wlo-galvanized-03.jpg',
            '/img/products/wlo/galva/wlo-galvanized-04.jpg'
        ],
        'easy-xl': [
            '/img/products/easy-xl/easy-xl.jpg',
            '/img/products/easy-xl/easy-xl-1.jpg',
            '/img/products/easy-xl/easy-xl-2.jpg',
            '/img/products/easy-xl/easy-xl-3.jpg',
            '/img/products/easy-xl/easy-xl-4.jpg',
        ],
    };

    const normalImages = {
        'big-foot': [
            '/img/products/big-foot/big-foot.jpg',
            '/img/products/big-foot/big-foot-1.jpg',
            '/img/products/big-foot/big-foot-2.jpg',
            '/img/products/big-foot/big-foot-3.jpg',
            '/img/products/big-foot/big-foot-4.jpg',
        ],
        'star': [
            '/img/products/star/star.jpg',
            '/img/products/star/star-1.jpg',
            '/img/products/star/star-2.jpg',
            '/img/products/star/star-3.jpg',
            '/img/products/star/star-4.jpg',
        ],
        'star-otc': [
            '/img/products/star-otc/star-otc.jpg',
            '/img/products/star-otc/star-otc-1.jpg',
            '/img/products/star-otc/star-otc-2.jpg',
            '/img/products/star-otc/star-otc-3.jpg',
            '/img/products/star-otc/star-otc-4.jpg',
        ],
        'hcrn-06': [
            '/img/products/hcrn-06/hcrn-06.jpg',
            '/img/products/hcrn-06/hcrn-06-1.jpg',
            '/img/products/hcrn-06/hcrn-06-2.jpg',
            '/img/products/hcrn-06/hcrn-06-3.jpg',
            '/img/products/hcrn-06/hcrn-06-4.jpg',
        ],
        'hcrn-08': [
            '/img/products/hcrn-06/hcrn-06-1.jpg',
            '/img/products/hcrn-06/hcrn-06.jpg',
            '/img/products/hcrn-06/hcrn-06-2.jpg',
            '/img/products/hcrn-06/hcrn-06-3.jpg',
            '/img/products/hcrn-06/hcrn-06-4.jpg',
        ],
        'hcry-08': [
            '/img/products/hcry-08/hcry-08.jpg',
            '/img/products/hcry-08/hcry-08.jpg',
            '/img/products/hcry-08/hcry-08-2.jpg',
            '/img/products/hcry-08/hcry-08-3.jpg',
            '/img/products/hcry-08/hcry-08-1.jpg',
        ],
        'hcrn-065': [
            '/img/products/hcrn-065/hcrn-065-1.jpg',
            '/img/products/hcrn-065/hcrn-065.jpg',
            '/img/products/hcrn-065/hcrn-065-2.jpg',
            '/img/products/hcrn-065/hcrn-065-3.jpg',
            '/img/products/hcrn-065/hcrn-065-4.jpg',
        ],
        'prime-xs': [
            '/img/products/prime-xs/prime-xs.jpg',
            '/img/products/prime-xs/prime-xs-1.jpg',
            '/img/products/prime-xs/prime-xs-2.jpg',
            '/img/products/prime-xs/prime-xs-3.jpg',
            '/img/products/prime-xs/prime-xs-rl.jpg',
        ],
        'secu-dock': [
            '/img/products/secu-dock/secu-dock.jpg',
            '/img/products/secu-dock/secu-dock-1.jpg',
            '/img/products/secu-dock/secu-dock-2.jpg',
            '/img/products/secu-dock/secu-dock.jpg',
            '/img/products/secu-dock/secu-dock-3.jpg',
        ],
        'wlo': [
            '/img/products/wlo/wlo-main.jpg',
            '/img/products/wlo/wlo-1.jpg',
            '/img/products/wlo/wlo-2.jpg',
            '/img/products/wlo/wlo-3.jpg',
            '/img/products/wlo/wlo-4.jpg',
        ],
        'easy-xl': [
            '/img/products/easy-xl/easy-xl.jpg',
            '/img/products/easy-xl/easy-xl-1.jpg',
            '/img/products/easy-xl/easy-xl-2.jpg',
            '/img/products/easy-xl/easy-xl-3.jpg',
            '/img/products/easy-xl/easy-xl-4.jpg',
        ],
    };


    if (isGalvanized) {
        images.main = galvanizedImages[baseName] ? galvanizedImages[baseName][0] : null;
        images.additional = galvanizedImages[baseName] || [];
    } else {
        images.main = normalImages[baseName] ? normalImages[baseName][0] : null;
        images.additional = normalImages[baseName] || [];
    }

    return images;
}
