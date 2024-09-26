import { KTBreakpointType, KTOptionType } from '../types';
declare const KTUtils: {
    geUID(prefix?: string): string;
    getBreakpoint(breakpoint: KTBreakpointType): number;
    getCssVar(variable: string): string;
    parseDataAttribute(value: string): KTOptionType;
    parseJson(value: string): JSON;
    parseSelector(selector: string): string;
    capitalize(value: string): string;
    uncapitalize(value: string): string;
    camelCase(value: string): string;
    isRTL(): boolean;
    throttle(timer: undefined | ReturnType<typeof setTimeout>, func: CallableFunction, delay: number): void;
    checksum(value: string): string;
};
export default KTUtils;
