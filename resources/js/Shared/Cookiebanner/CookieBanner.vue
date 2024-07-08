
<script setup>
    import { useI18n } from 'vue-i18n';
    import { posthogModule } from '../../plugins/posthog'
    import { defineEmits } from 'vue';

    const  { t } = useI18n();
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
      <div class="cookie-image-container">
        <img src="../../../../public/img/cookie-consent-image.png" alt="Cookie" class="cookie-image" />
      </div>
        <h3 class="cookie-title">{{ $t('cookiebanner.title') }}</h3>
      <p class="cookie-description">{{ $t('cookiebanner.description') }}<span class="policy-link" @click="openPolicyBanner">{{ $t('cookiebanner.policyLink') }}</span>{{ $t('cookiebanner.policyLinkAdon') }}</p>
      <div class="button-group">
        <button @click="acceptCookies" class="allow-button">{{ $t('cookiebanner.buttonAllow') }}</button>
        <button @click="declineCookies" class="reject-button">{{ $t('cookiebanner.buttonDisallow') }}</button>
      </div>
      <div class="full-width-button">
        <button @click="configureCookies" class="info-button">{{ $t('cookiebanner.buttonManageCookies') }}</button>
      </div>
    </div>
</template>

<style scoped>
  .cookie-banner {
    position: fixed;
    bottom: 40px;
    right: 30px;
    width: 400px;
    min-height: 500px;
    padding: 20px;
    background-color: #f4f4f4;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 2px solid #251b1b;
    z-index: 9997; /* Ensure the banner is on top of other content */
  }

  .cookie-image-container {
    margin-bottom: 20px;
  }

  .cookie-image {
    width: 120px;
    height: 120px;
  }

  .cookie-title {
    font-size: 24px;

  }

  .cookie-description {
    margin-bottom: 20px;
  }

  .button-group {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
  }

  .reject-button,
  .allow-button {
    padding: 10px 20px;
    border-radius: 25px;
    min-width: 170px;
    font-size: 15px;
    cursor: pointer;
    background-color: #1B2022;
    color: #fff;
    transition: background-color 0.3s;
  }
  .reject-button {
    margin-left: 18px; /* 10px gap */
  }
  .reject-button:hover,
  .allow-button:hover {
    background-color: #31363A;
  }

  .full-width-button {
    width: 100%;
    display: flex;
    justify-content: center;
  }

  .info-button {
    padding: 10px 0;
    border-radius: 25px;
    cursor: pointer;
    background-color: #f0f0f0;
    color: #000;
    width: 100%;
  }

  .policy-link {
    color: #a70d0d;
    text-decoration: underline;
    cursor: pointer;
  }

  @media screen and (max-width: 768px) {
    .cookie-banner{
      left:2px;
      width: 99%;
    }
    .reject-button, .allow-button {
     min-width: 150px;
     font-size: 13px;
    }
    .full-width-button {
      font-size: 13px;
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
