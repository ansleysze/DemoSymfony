import KTComponent from '../component';
import { KTAccordionInterface, KTAccordionConfigInterface } from './types';
export declare class KTAccordion extends KTComponent implements KTAccordionInterface {
    protected _name: string;
    protected _defaultConfig: KTAccordionConfigInterface;
    protected _config: KTAccordionConfigInterface;
    protected _accordionElements: NodeListOf<HTMLElement>;
    constructor(element: HTMLElement, config?: KTAccordionConfigInterface);
    protected _handlers(): void;
    protected _toggle(accordionElement: HTMLElement): void;
    protected _show(accordionElement: HTMLElement): void;
    protected _hide(accordionElement: HTMLElement): void;
    protected _hideSiblings(accordionElement: HTMLElement): void;
    show(accordionElement: HTMLElement): void;
    hide(accordionElement: HTMLElement): void;
    toggle(accordionElement: HTMLElement): void;
    static getInstance(element: HTMLElement): KTAccordion;
    static getOrCreateInstance(element: HTMLElement, config?: KTAccordionConfigInterface): KTAccordion;
    static createInstances(): void;
    static init(): void;
}
