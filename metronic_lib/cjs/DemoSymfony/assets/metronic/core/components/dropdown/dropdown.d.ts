import KTComponent from '../component';
import { KTDropdownConfigInterface, KTDropdownInterface } from './types';
declare global {
    interface Window {
        KT_DROPDOWN_INITIALIZED: boolean;
    }
}
export declare class KTDropdown extends KTComponent implements KTDropdownInterface {
    protected _name: string;
    protected _defaultConfig: KTDropdownConfigInterface;
    protected _config: KTDropdownConfigInterface;
    protected _disabled: boolean;
    protected _toggleElement: HTMLElement;
    protected _contentElement: HTMLElement;
    protected _isTransitioning: boolean;
    protected _isOpen: boolean;
    constructor(element: HTMLElement, config?: KTDropdownConfigInterface);
    protected _click(event: Event): void;
    protected _mouseover(): void;
    protected _mouseout(): void;
    protected _toggle(): void;
    protected _show(): void;
    protected _hide(): void;
    protected _initPopper(): void;
    protected _destroyPopper(): void;
    protected __isOpen(): boolean;
    protected _getPopperConfig(): object;
    protected _getToggleElement(): HTMLElement;
    protected _getContentElement(): HTMLElement;
    click(event: Event): void;
    mouseover(): void;
    mouseout(): void;
    show(): void;
    hide(): void;
    toggle(): void;
    getToggleElement(): HTMLElement;
    getContentElement(): HTMLElement;
    isPermanent(): boolean;
    disable(): void;
    enable(): void;
    isOpen(): boolean;
    static getElement(reference: HTMLElement): HTMLElement;
    static getInstance(element: HTMLElement): KTDropdown;
    static getOrCreateInstance(element: HTMLElement, config?: KTDropdownConfigInterface): KTDropdown;
    static update(): void;
    static hide(skipElement?: HTMLElement): void;
    static handleClickAway(): void;
    static handleKeyboard(): void;
    static handleMouseover(): void;
    static handleMouseout(): void;
    static handleClick(): void;
    static handleDismiss(): void;
    static initHandlers(): void;
    static createInstances(): void;
    static init(): void;
}
