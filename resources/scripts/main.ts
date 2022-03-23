import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3'
import { importPageComponent } from '@/scripts/vite/import-page-component'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from '@/views/layouts/default.vue';
import { createPinia } from 'pinia';

createInertiaApp({
  resolve: (name) => {
    const promisePage = importPageComponent(name, import.meta.glob('../views/pages/**/*.vue'));
    promisePage.then((page: any) => {
      if (page.default.layout === undefined) {
        page.default.layout = Layout;
      }
      return page;
    });
    return promisePage;
  },
  setup({ el, app, props, plugin }) {
    createApp({ render: () => h(app, props) })
      .use(plugin)
      .use(createPinia())
      .component('Head', Head)
      .component('Link', Link)
      .mount(el)
  },
});
InertiaProgress.init();
