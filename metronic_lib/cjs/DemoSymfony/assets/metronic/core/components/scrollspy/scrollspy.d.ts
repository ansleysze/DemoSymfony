import KTComponent from '../component';
import { KTScrollspyInterface, KTScrollspyConfigInterface } from './types';
export declare class KTScrollspy extends KTComponent implements KTScrollspyInterface {
    protected _name: string;
    protected _defaultConfig: KTScrollspyConfigInterface;
    protected _config: KTScrollspyConfigInterface;
    protected _targetElement: HTMLElement | Document | null;
    protected _anchorElements: NodeListOf<HTMLElement> | null;
    constructor(element: HTMLElement, config?: KTScrollspyConfigInterface);
    private _getTarget;
    protected _handlers(): void;
    protected _scrollTo(anchorElement: HTMLElement): void;
    protected _updateAnchor(anchorElement: HTMLElement): void;
    protected _update(): void;
    protected _isActive(anchorElement: HTMLElement): boolean;
    updateAnchor(anchorElement: HTMLElement): void;
    isActive(anchorElement: HTMLElement): boolean;
    update(): void;
    scrollTo(anchorElement: HTMLElement): void;
    static getInstance(element: HTMLElement): KTScrollspy;
    static getOrCreateInstance(element: HTMLElement, config?: KTScrollspyConfigInterface): KTScrollspy;
    static createInstances(): void;
    static init(): void;
}
