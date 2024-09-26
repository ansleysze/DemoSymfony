import KTComponent from '../component';
import { KTThemeInterface, KTThemeConfigInterface } from './types';
import { KTThemeModeType } from './types';
export declare class KTTheme extends KTComponent implements KTThemeInterface {
    protected _name: string;
    protected _defaultConfig: KTThemeConfigInterface;
    protected _mode: KTThemeModeType | null;
    protected _currentMode: KTThemeModeType | null;
    constructor(element: HTMLElement, config?: KTThemeConfigInterface | null);
    protected _handlers(): void;
    protected _toggle(): void;
    protected _setMode(mode: KTThemeModeType): void;
    protected _getMode(): KTThemeModeType;
    protected _getSystemMode(): KTThemeModeType;
    protected _bindMode(): void;
    protected _updateState(): void;
    getMode(): KTThemeModeType;
    setMode(mode: KTThemeModeType): void;
    static getInstance(element: HTMLElement): KTTheme;
    static getOrCreateInstance(element?: HTMLElement, config?: KTThemeConfigInterface): KTTheme | null;
    static createInstances(): void;
    static init(): void;
}
