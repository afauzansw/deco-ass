import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { Ziggy } from './ziggy';
import { route } from 'ziggy-js';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    return pages[`./Pages/${name}.vue`];
  },
  setup({ el, App, props, plugin }) {
    window.route = (name, params, absolute) => route(name, params, absolute, Ziggy);

    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el);
  },
});
