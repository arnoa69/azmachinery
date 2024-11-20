import { ref, watchEffect } from 'vue';

const cookieConsent = ref(null);

const getCookieConsent = () => {
    if (typeof window === 'undefined') return null; // Umkehren der Bedingung
    try {
        const stored = localStorage.getItem('cookie_consent');
        return stored ? JSON.parse(stored) : null;
    } catch (error) {
        console.error('Error accessing localStorage:', error);
        return null;
    }
}

const setCookieConsent = (consent) => {
    try {
        localStorage.setItem('cookie_consent', JSON.stringify(consent));
        cookieConsent.value = consent;
    } catch (error) {
        console.error('Error setting cookie consent:', error);
    }
}

const hasConsentBeenGiven = () => {
    const consent = getCookieConsent();
    return !!consent;
}

watchEffect(() => {
    cookieConsent.value = getCookieConsent();
})

export {
    cookieConsent,
    getCookieConsent,
    setCookieConsent,
    hasConsentBeenGiven
}
