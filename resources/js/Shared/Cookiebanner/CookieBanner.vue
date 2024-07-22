
<script setup>
    import { useI18n } from 'vue-i18n';
    import { posthogModule } from '../../plugins/posthog'
    import { defineEmits } from 'vue';

    const  { t, locale } = useI18n();
    const emit = defineEmits(['showManageBanner', 'hideBanner', 'showPolicyBanner']);
    const declineCookies = () => {
      posthogModule.posthog.opt_out_capturing();
      emit('hideBanner');
    }
    const acceptCookies = () => {
      posthogModule.posthog.opt_in_capturing();
      emit('hideBanner');
    }
    const configureCookies = () => {
      emit('showManageBanner');
    }

    const openPolicyBanner = () => {
      emit('showPolicyBanner');
    }

</script>

<template>
    <div class="cookie-banner">
      <h3 class="cookie-title">{{ $t('cookiebanner.title') }}</h3>
      <p class="cookie-description">{{ $t('cookiebanner.description') }}{{ $t('cookiebanner.policyLink') }} {{ $t('cookiebanner.policyLinkAdon') }}</p>
      <div class="button-group">
        <button @click="acceptCookies" class="allow-button">{{ $t('cookiebanner.buttonAllow') }}</button>
        <button @click="declineCookies" class="reject-button">{{ $t('cookiebanner.buttonDisallow') }}</button>
        <button @click="configureCookies" class="info-button">{{ $t('cookiebanner.buttonManageCookies') }}</button>
      </div>
      <div class="link-group">
        <a :href="`/${locale}/cookie-policy`" class="policy-link" target="_blank">{{ $t("footer.links.cookie-policy") }}</a>
        <a :href="`/${locale}/privacy-policy`" class="policy-link" target="_blank">{{ $t("footer.links.privacy-policy") }}</a>
        <a :href="`/${locale}/terms-and-conditions`" class="policy-link" target="_blank">{{ $t("footer.links.terms-and-conditions") }}</a>
      </div>
    </div>
</template>

<style scoped>
  .cookie-banner {
    position: fixed;
    font-size: 14px;
    bottom: 10px;
    right: 10px;
    max-width: 570px;
    min-height: 240px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 9997; /* Ensure the banner is on top of other content */
  }

  .cookie-title {
    font-size: 16px;
    font-weight: bold;
  }

  .cookie-description {
    margin: 15px 0;

  }
  .button-group {
    display: flex;
    justify-content: space-between;
    gap: 5px;
    width: 100%;
  }
  .reject-button,
  .info-button,
  .allow-button {
    padding: 10px 15px;
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
  .info-button {
    border-radius: 10px;
    cursor: pointer;
    color: #000;
    background-color: transparent;
  }

  .reject-button:hover,
  .info-button:hover {
    background-color: #be0a13;
    color: #fff;
  }

  .full-width-button {
    width: 100%;
    display: flex;
    justify-content: center;
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
    .info-button,
    .allow-button {
        width: 100%;
    }
    .cookie-banner {
        min-height: 350px;
    }
  }
  /* Media query for iPhone
  @media screen and (max-width: 414px) and (orientation: portrait) {
    .cookie-banner {
      right: 0;
    }
  }

  /* Media query for Android
  @media screen and (max-width: 767px) and (orientation: landscape) {
    .cookie-banner {
      padding-right: 0;
    }
  }
  */
</style>
