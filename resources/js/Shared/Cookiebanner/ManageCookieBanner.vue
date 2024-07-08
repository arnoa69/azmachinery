<script setup>
    import { useI18n } from 'vue-i18n';
    import { posthogModule } from '../../plugins/posthog'
    import { defineEmits, ref, computed } from 'vue';

    const  { t } = useI18n();
    const emit = defineEmits(['hideConfigBanner', 'hideBothBanner']);
    const hideConfigBanner = () => {
    posthogModule.posthog.opt_out_capturing();
    emit('hideConfigBanner');
    }
    const acceptCookies = () => {
    posthogModule.posthog.opt_in_capturing();
    emit('hideBothBanner');
    }

    const declineCookies = () => {
    posthogModule.posthog.opt_out_capturing();
    emit('hideBothBanner');
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
        <button @click="declineCookies" class="reject-button">{{ $t('cookiebanner.manage.buttonDisallow') }}</button>
        <button @click="acceptCookies" class="confirm-button">{{ $t('cookiebanner.manage.buttonAccept') }}</button>
        <button @click="acceptCookies" class="allow-button">{{ $t('cookiebanner.manage.buttonAllow') }}</button>
      </div>
    </div>
</template>

<style scoped>
  .cookie-banner {
    position: fixed;
    bottom: 40px;
    right: 30px;
    width: 400px;
    min-height: 626px;
    padding: 20px;
    background-color: #f4f4f4;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 2px solid #251b1b;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: #dc3545 #1a1a1a;
    z-index: 9999; /* Ensure the banner is on top of other content */
  }

  .cookie-title {
    font-size: 24px;
    margin-bottom: 20px;
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
    background-color: #8BC34A;
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
    flex-direction: column;
    margin-top: 20px;
  }

  .reject-button,
  .confirm-button,
  .allow-button {
    padding: 6px 20px;
    border-radius: 25px;
    cursor: pointer;
    transition: background-color 0.3s;
    max-width: 300px;
    min-width: 300px;
    margin-bottom: 6px;
  }

  .reject-button,
  .confirm-button {
    background-color: #fff;
    color: #000;
    height: 40px;
  }

  .allow-button {
    background-color: #1B2022;
    color: #fff;
    height: 40px;
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
    margin-right: 5px;
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
    .reject-button, .confirm-button {
     min-width: 150px;
    }
  }

</style>
