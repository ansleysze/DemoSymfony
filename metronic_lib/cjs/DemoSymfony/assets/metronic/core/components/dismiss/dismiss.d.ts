import KTComponent from '../component';
import { KTDismissInterface, KTDismissConfigInterface } from './types';
export declare class KTDismiss extends KTComponent implements KTDismissInterface {
    protected _name: string;
    protected _defaultConfig: KTDismissConfigInterface;
    protected _config: KTDismissConfigInterface;
    protected _isAnimating: boolean;
    protected _targetElement: HTMLElement | null;
    constructor(element: HTMLElement, config?: KTDismissConfigInterface);
    private _getTargetElement;
    protected _handlers(): void;
    protected _dismiss(): void;
    getTargetElement(): HTMLElement;
    dismiss(): void;
    static getInstance(element: HTMLElement): KTDismiss;
    static getOrCreateInstance(element: HTMLElement, config?: KTDismissConfigInterface): KTDismiss;
    static createInstances(): void;
    static init(): void;
}
