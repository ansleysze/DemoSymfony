import KTComponent from '../component';
import { KTStickyInterface, KTStickyConfigInterface } from './types';
export declare class KTSticky extends KTComponent implements KTStickyInterface {
    protected _name: string;
    protected _defaultConfig: KTStickyConfigInterface;
    protected _config: KTStickyConfigInterface;
    protected _attributeRoot: string;
    protected _eventTriggerState: boolean;
    protected _lastScrollTop: number;
    protected _releaseElement: HTMLElement;
    protected _activateElement: HTMLElement;
    protected _wrapperElement: HTMLElement;
    constructor(element: HTMLElement, config?: KTStickyConfigInterface | null);
    protected _handlers(): void;
    protected _process(): void;
    protected _getOffset(): number;
    protected _enable(): boolean;
    protected _disable(): void;
    protected _update(): void;
    protected _calculateHeight(): number;
    protected _isActive(): boolean;
    update(): void;
    isActive(): boolean;
    static getInstance(element: HTMLElement): KTSticky;
    static getOrCreateInstance(element: HTMLElement, config?: KTStickyConfigInterface): KTSticky;
    static createInstances(): void;
    static init(): void;
}
