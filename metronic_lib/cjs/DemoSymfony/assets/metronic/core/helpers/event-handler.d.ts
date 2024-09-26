import { KTCallableType } from '../types';
export interface KTDelegatedEventHandlersInterface {
    [key: string]: KTCallableType;
}
declare const KTEventHandler: {
    on: (element: HTMLElement, selector: string, eventName: string, handler: KTCallableType) => string;
    off(element: HTMLElement, eventName: string, eventId: string): void;
};
export default KTEventHandler;
