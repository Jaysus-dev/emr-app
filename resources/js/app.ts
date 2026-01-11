import "./bootstrap";
import { createApp, h, DefineComponent } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

/**
 * Type for a Vue page component
 */
type PageComponent = DefineComponent<Record<string, any>, any, any>;

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

        // Unwrap the default export if it exists (common with Vue + Vite)
        if ((page as any).default) {
            return (page as any).default as PageComponent;
        }

        return page as PageComponent;
    },

    // -----------------------
    // Setup function
    // -----------------------
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});
