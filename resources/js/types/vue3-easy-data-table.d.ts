declare module "vue3-easy-data-table" {
    import { DefineComponent } from "vue";
    export interface Header {
        text: string;
        value: string;
        sortable?: boolean;
        width?: number | string;
    }
    export interface Item {
        [key: string]: any;
    }
    const Vue3EasyDataTable: DefineComponent<{
        headers: Header[];
        rows: Item[];
    }>;
    export default Vue3EasyDataTable;
}
