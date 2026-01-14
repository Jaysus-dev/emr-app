import "./bootstrap";
import { createApp, h, DefineComponent } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "ziggy-js";
// Import your global AppLayout
import AppLayout from "@/pages/layouts/AppLayout.vue";
import { router, usePage } from "@inertiajs/vue3";
import { route } from "ziggy-js";

/**
 * Type for a Vue page component
 */
type PageComponent = DefineComponent<Record<string, any>, any, any>;

// Pages that should NOT use the global layout
const noLayoutPages = ["auth/Login"];
/**
 * Create the Inertia app
 */
createInertiaApp({
    // -----------------------
    // Resolve function
    // -----------------------
    resolve: async (name: string): Promise<PageComponent> => {
        // Resolve the page component from Pages folder
        const page = await resolvePageComponent(
            `./pages/${name}.vue`,
            import.meta.glob("./pages/**/*.vue")
        );

        // Unwrap the default export if it exists
        const component = "default" in page ? (page as any).default : page;

        if (!noLayoutPages.includes(name)) {
            (component as any).layout = AppLayout;
        }

        return component as PageComponent;
    },

    // -----------------------
    // Setup function
    // -----------------------
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
});
