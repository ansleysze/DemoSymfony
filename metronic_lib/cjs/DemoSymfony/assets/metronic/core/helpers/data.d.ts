declare const KTData: {
    set(element: HTMLElement, key: string, value: unknown): void;
    get(element: HTMLElement, key: string): unknown;
    has(element: HTMLElement, key: string): boolean;
    remove(element: HTMLElement, key: string): void;
};
export default KTData;
