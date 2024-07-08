import posthog  from 'posthog-js';

const posthogInstance = posthog.init(import.meta.env.VITE_POSTHOG_API_KEY, {
  api_host: import.meta.env.VITE_POSTHOG_HOST,
});

export default posthogInstance;

export const posthogModule = {
  posthog: posthogInstance
}
