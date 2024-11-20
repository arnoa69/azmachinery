<script setup>
    import { useI18n } from 'vue-i18n';
    import { posthogModule } from '../../plugins/posthog';
    import { defineEmits, ref, computed } from 'vue';
    import { getCookieConsent, setCookieConsent } from '@/services/cookieConsentService';

    const  { t, locale } = useI18n();
    const emit = defineEmits(['hideConfigBanner', 'hideBothBanner']);
   // const { getCookieConsent, setCookieConsent } = useCookieConsent();

    const consent = ref({
        ad_storage: 'denied',
        ad_personalization: 'denied',
        ad_user_data: 'denied',
        analytics_storage: 'denied',
        ...getCookieConsent()
    })

    const savePreferences = () => {
        setCookieConsent(consent.value)
        if (consent.value.analytics_storage === 'granted') {
            posthogModule.posthog.opt_in_capturing()
        } else {
            posthogModule.posthog.opt_out_capturing()
        }
        emit('hideBothBanner')
    }

    const cookies = ref([
    { name: t('cookiebanner.manage.necessary_title'), description: t('cookiebanner.manage.necessary_description') },
    { name: t('cookiebanner.manage.preferences_title'), description: t('cookiebanner.manage.preferences_description') },
    { name: t('cookiebanner.manage.statistics_title'), description: t('cookiebanner.manage.statistics_description') },
    { name: t('cookiebanner.manage.marketing_title'), description: t('cookiebanner.manage.marketing_description') }
    ]);

    const groupedCookies = computed(() => {
    return cookies.value.slice().reduce((groups, cookie, index) => {
        if (index % 4 === 0) {
        groups.push([]);
        }
        groups[groups.length - 1].push(cookie);
        return groups;
    }, []);
    });
</script>


<template>
    <div class="cookie-banner">
      <div class="cookie-title">
        <span @click="hideConfigBanner" class="arrow-icon" id="arrow-icon">&#9664;</span>{{ $t('cookiebanner.manage.title') }}
      </div>
      <div class="cookie-group" v-for="(group, index) in groupedCookies" :key="index">
        <div v-for="cookie in group" :key="cookie.name">
          <div class="cookie-item">
            <div class="cookie-label">
              <label class="label">{{ cookie.name }}</label>
              <input
                type="checkbox"
                :id="cookie.name.toLowerCase()"
                :checked="cookie.name.toLowerCase() === t('cookiebanner.manage.necessary_title').toLowerCase()"
                :disabled="cookie.name.toLowerCase() == t('cookiebanner.manage.necessary_title').toLowerCase()"
              />
              <label :for="cookie.name.toLowerCase()" class="toggle-button"></label>
            </div>
            <div class="cookie-description">{{ cookie.description }}</div>
          </div>
        </div>
      </div>
      <div class="button-group">
        <button @click="savePreferences" class="allow-button">{{ $t('cookiebanner.manage.buttonAllow') }}</button>
        <button @click="savePreferences" class="confirm-button">{{ $t('cookiebanner.manage.buttonAccept') }}</button>
        <button @click="savePreferences" class="reject-button">{{ $t('cookiebanner.manage.buttonDisallow') }}</button>
      </div>
      <div class="link-group">
        <a :href="`/${locale}/cookie-policy`" class="policy-link" >{{ $t("footer.links.cookie-policy") }}</a>
        <a :href="`/${locale}/privacy-policy`" class="policy-link" >{{ $t("footer.links.privacy-policy") }}</a>
        <a :href="`/${locale}/terms-and-conditions`" class="policy-link" >{{ $t("footer.links.terms-and-conditions") }}</a>
      </div>
    </div>
</template>

<style scoped>
  .cookie-banner {
    position: fixed;
    bottom: 10px;
    right: 10px;
    max-width: 570px;
    min-height: 516px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: #dc3545 #1a1a1a;
    z-index: 9999; /* Ensure the banner is on top of other content */
  }

  .cookie-title {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
  }

  .cookie-item {
    position: relative;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    margin-bottom: 20px;
  }

  .label {
    font-weight: bold;
  }

  .cookie-description {
    margin-top: -3px;
    font-size: 12px;
  }
  .cookie-item label {
    width: 290px;
    text-align: left;
  }

  /* Hide the checkbox */
  .cookie-item input[type="checkbox"] {
    display: none;
  }

  /* Style the label as the toggle button */
  .cookie-item label.toggle-button {
    display: inline-block;
    width: 40px;
    height: 20px;
    background-color: #ddd;
    border-radius: 20px;
    position: relative;
    transition: background-color 0.3s;
    cursor: pointer;
  }

  /* Style the label as the toggle button when checked */
  .cookie-item input[type="checkbox"]:checked + label.toggle-button {
    background-color: #cc0626;
  }

  /* Style the circle inside the toggle button */
  .cookie-item input[type="checkbox"] + label.toggle-button:before {
    content: '';
    position: absolute;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #fff;
    top: 20%;
    transform: translateY(-15px);
    transform: translateX(6px);
    transition: transform 0.3s;
  }

  /* Position the circle inside the toggle button when checked */
  .cookie-item input[type="checkbox"]:checked + label.toggle-button:before {
    transform: translateY(5px);
    transform: translateX(-2px);
  }

  .button-group {
    display: flex;
    justify-content: space-between;
    gap: 5px;
    width: 100%;
  }

  .reject-button,
  .confirm-button,
  .allow-button {
    padding: 10px 10px;
    border-radius: 8px;
    border: none;
    min-width: 100px;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    color: #fff;
    text-transform: uppercase;
  }

  .allow-button {
    background-color: #be0a13;
  }
  .reject-button,
  .confirm-button {
    border-radius: 10px;
    cursor: pointer;
    color: #000;
    background-color: transparent;
  }

  .reject-button:hover,
  .confirm-button:hover {
    background-color: #be0a13;
    color: #fff;
  }

  .link-group {
    padding-top: 15px;
  }
  .policy-link {
    color: #a70d0d;
    text-decoration: underline;
    cursor: pointer;
    padding-right: 10px;
    font-size: 12px;
  }

  .toggle-label {
    margin-bottom: 10px;
    font-size: 20px;
  }

  input[type="checkbox"] + label:before {
    content: '';
    position: absolute;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background-color: #ddd;
    left: 0;
    transition: background-color 0.3s, left 0.3s;
  }

  input[type="checkbox"]:checked + label:before {
    background-color: #8BC34A;
    left: calc(100% - 15px);
  }

  .cookie-label {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    margin-bottom: 10px;
  }

  .cookie-group {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }

  /* Style the arrow icon */
  .cookie-title .arrow-icon {
    cursor: pointer;
    margin-right: 10px;
    color: #cc0626;
  }

  /* Rotate the arrow icon when the ManageCookieBanner is open */
  .cookie-title.opened .arrow-icon {
    transform: rotate(-90deg);
  }

  @media screen and (max-width: 768px) {
    .cookie-banner{
      left:2px;
      width: 99%;
    }
    .button-group {
        width: 100%;
        display: inline;
    }
    .reject-button,
    .confirm-button,
    .allow-button {
        width: 100%;
    }
    .cookie-banner {
        min-height: 350px;
    }
  }

</style>
