import KTComponent from '../component';
import { KTReparentInterface, KTReparentConfigInterface } from './types';
declare global {
    interface Window {
        KT_REPARENT_INITIALIZED: boolean;
    }
}
export declare class KTReparent extends KTComponent implements KTReparentInterface {
    protected _name: string;
    protected _defaultConfig: KTReparentConfigInterface;
    constructor(element: HTMLElement, config?: KTReparentConfigInterface | null);
    protected _update(): void;
    update(): void;
    static handleResize(): void;
    static getInstance(element: HTMLElement): KTReparent;
    static getOrCreateInstance(element: HTMLElement, config?: KTReparentConfigInterface): KTReparent;
    static createInstances(): void;
    static init(): void;
}
