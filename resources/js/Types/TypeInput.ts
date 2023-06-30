import { TypeSize, TypeVariant } from '.';

export type TypeInput = {
    type: string;
    id?: string;
    name: string;
    placeholder?: string;
    disabled?: boolean;
    secured?: boolean;
    onChange?: VoidFunction;
    onKeyDown?: VoidFunction;
    onKeyUp?: VoidFunction;
    onFocus?: VoidFunction;
    prepend?: JSX.Element;
    append?: JSX.Element;
    size?: TypeSize;
    variant?: TypeVariant;
};
