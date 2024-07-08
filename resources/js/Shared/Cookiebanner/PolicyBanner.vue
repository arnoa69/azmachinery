<script setup>
    import { useI18n } from 'vue-i18n';
    import { defineEmits } from 'vue';

    const  { t } = useI18n();
    const emit = defineEmits(['hidePolicyBanner']);
    const hidePolicyBanner = () => {
      emit('hidePolicyBanner');
    }
    const acceptPolicy = () => {
      emit('hidePolicyBanner')
    }
</script>

<template>
    <div class="cookie-banner">
      <div class="cookie-title">
        <span @click="hidePolicyBanner" class="arrow-icon" id="arrow-icon">&#9664;</span>{{ $t('policybanner.title') }}
      </div>
      <div>
        <span class="policy-title">{{ $t('policybanner.title_01') }}</span>
        <p class="policy-description">{{ $t('policybanner.content_01') }}</p>
        <span class="policy-title">{{ $t('policybanner.title_company_contact') }}</span>
        <p>{{ $t('policybanner.company_contact_data') }}</p>
        <p><span class="policy-title">{{ $t('policybanner.title_02') }}</span></p>
        <span class="policy-title">{{ $t('policybanner.title_02_01') }}</span>
        <p>{{ $t('policybanner.content_02_01') }}</p>
        <span class="policy-title">{{ $t('policybanner.title_02_02') }}</span>
        <p>{{ $t('policybanner.content_02_02') }}</p>
        <p>{{ $t('policybanner.content_02_02_addon') }}</p>
        <span class="policy-title">{{ $t('policybanner.title_02_03') }}</span>
        <p>{{ $t('policybanner.content_02_03') }}</p>
        <span class="policy-title">{{ $t('policybanner.title_03') }}</span>
        <p>{{ $t('policybanner.content_03') }}</p>
        <span class="policy-title">{{ $t('policybanner.title_04') }}</span>
        <p>{{ $t('policybanner.content_04') }}</p>
        <span class="policy-title">{{ $t('policybanner.title_05') }}</span>
        <p>{{ $t('policybanner.content_05') }}</p>
        <span class="policy-title">{{ $t('policybanner.title_06') }}</span>
        <p>{{ $t('policybanner.content_06') }}</p>
        <span class="policy-title">{{ $t('policybanner.title_07') }}</span>
        <p>{{ $t('policybanner.content_07') }}</p>
        <p><strong>{{ $t('policybanner.last_update') }}</strong></p>
      </div>
      <div class="full-width-button">
        <button @click="acceptPolicy" class="info-button">{{ $t('policybanner.buttonUnderstandPolicy') }}</button>
      </div>
    </div>

</template>


<style scoped>
  .cookie-banner {
    position: fixed;
    bottom: 40px;
    right: 30px;
    width: 400px;
    height: 515px;
    padding: 20px;
    background-color: #f4f4f4;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid #141010;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: #dc3545 #1a1a1a;
    z-index: 9998; /* Ensure the banner is on top of other content */
  }

  .cookie-banner::-webkit-scrollbar {
    width: 12px;
  }

  .cookie-banner::-webkit-scrollbar-track {
    background: #f4f4f4; /* Change the background color where the scrollbar is scrolling */
  }

  .cookie-banner::-webkit-scrollbar-thumb {
    background-color: #932a2a;
    border-radius: 6px;
    border: 3px solid #9c1212;
  }
  .cookie-title {
    font-size: 24px;
    margin-bottom: 20px;
  }

  .policy-description {
    margin-bottom: 20px;
  }

  .policy-title {
    font-weight: bold;
    left: 105px;
  }

  .full-width-button {
    width: 100%;
    display: flex;
    justify-content: center;
  }

  .arrow-icon {
    position: absolute;
    left: 0px;
    top: 8%;
    transform: translateY(-50%);
    margin-left: 15px;
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
</style>
