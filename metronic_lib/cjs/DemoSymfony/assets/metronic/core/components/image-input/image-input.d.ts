import KTComponent from '../component';
import { KTImageInputInterface, KTImageInputConfigInterface } from './types';
export declare class KTImageInput extends KTComponent implements KTImageInputInterface {
    protected _name: string;
    protected _defaultConfig: KTImageInputConfigInterface;
    protected _inputElement: HTMLInputElement;
    protected _hiddenElement: HTMLInputElement;
    protected _removeElement: HTMLElement;
    protected _previewElement: HTMLElement;
    protected _previewUrl: string;
    protected _lastMode: string;
    constructor(element: HTMLElement, config?: KTImageInputConfigInterface);
    protected _handlers(): void;
    protected _change(): void;
    protected _remove(): void;
    protected _update(): void;
    protected _getPreviewUrl(): string;
    protected _setPreviewUrl(url: string): void;
    isEmpty(): boolean;
    isChanged(): boolean;
    remove(): void;
    update(): void;
    setPreviewUrl(url: string): void;
    getPreviewUrl(): string;
    static getInstance(element: HTMLElement): KTImageInput;
    static getOrCreateInstance(element: HTMLElement, config?: KTImageInputConfigInterface): KTImageInput;
    static createInstances(): void;
    static init(): void;
}
