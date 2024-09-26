import KTComponent from '../component';
import { KTScrolltoInterface, KTScrolltoConfigInterface } from './types';
export declare class KTScrollto extends KTComponent implements KTScrolltoInterface {
    protected _name: string;
    protected _defaultConfig: KTScrolltoConfigInterface;
    protected _config: KTScrolltoConfigInterface;
    protected _targetElement: HTMLElement;
    constructor(element: HTMLElement, config?: KTScrolltoConfigInterface);
    private _getTargetElement;
    protected _handlers(): void;
    protected _scroll(): void;
    scroll(): void;
    static getInstance(element: HTMLElement): KTScrollto;
    static getOrCreateInstance(element: HTMLElement, config?: KTScrolltoConfigInterface): KTScrollto;
    static createInstances(): void;
    static init(): void;
}
