import "./bootstrap";
import { createApp, h, DefineComponent } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "ziggy-js";
// Import your global AppLayout
import AppLayout from "@/Pages/Layouts/AppLayout.vue";

/**
 * Type for a Vue page component
 */
type PageComponent = DefineComponent<Record<string, any>, any, any>;

// Pages that should NOT use the global layout
const noLayoutPages = ["Auth/Login"];
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
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
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
