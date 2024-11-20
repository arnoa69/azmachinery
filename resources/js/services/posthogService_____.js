import posthog from 'posthog-js';

const posthogInstance = posthog.init(import.meta.env.VITE_POSTHOG_API_KEY, {
  api_host: import.meta.env.VITE_POSTHOG_HOST,
});

const initializePosthog = () => {
  if (hasConsentBeenGiven()) {
    posthogInstance.opt_in_capturing();
  }
};

export default {
  posthogInstance,
  initializePosthog,
};
