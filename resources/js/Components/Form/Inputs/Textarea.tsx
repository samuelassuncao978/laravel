import React, { ReactNode, useContext } from 'react';
import { ControllerContext } from '../../../Providers/Controller';
import InlineErrors from '../InlineErrors';
import Label from '../Label';
import PrivacyBarrier from '../PrivacyBarrier';
// @ts-ignore
interface TextProperties extends React.InputHTMLAttributes<HTMLTextAreaElement> {
    id?: string;
    label?: string;
    name: string;
    type: string;
    defer?: boolean;
    prepend?: ReactNode;
    append?: ReactNode;
    size?: string;
    variant?: string;
}

const VARIANTS: { [key: string]: string } = {
    base: ' flex items-center justify-center relative border-2 outline-none focus-within:ring-2 focus-within:shadow-inner focus-within:ring-opacity-20 transition-all ease-in-out duration-200 flex-1',
    basic: ' bg-white border-gray-300 focus-within:border-blue-400 focus-within:ring-blue-400 rounded',
    opaque: ' focus-within:bg-white bg-gray-200 border-gray-200 focus-within:border-blue-400 focus-within:ring-blue-400 rounded',
    'opaque-rounded':
        ' focus-within:bg-white bg-gray-200 border-gray-200 focus-within:border-blue-400 focus-within:ring-blue-400 rounded-full',
};

export default React.forwardRef<HTMLTextAreaElement, TextProperties>((props, ref): JSX.Element => {
    const { bind = (): object => ({}) } = useContext(ControllerContext);
    const {
        id,
        type,
        name,
        label,
        defer = true,
        append,
        prepend,
        disabled,
        variant = 'basic',
        placeholder,
        size = 'sm',
        onChange,
        onKeyDown,
        onKeyUp,
        onFocus,
    } = props;

    const className = Object.entries(VARIANTS)
        .filter((i) => ['base', variant].includes(i[0]))
        .reduce((a, b): any => [...a, b[1]], [])
        .join('');

    return (
        <>
            <Label>{label}</Label>

            <span className={`${className} ${size === 'sm' ? 'px-3 p-2' : ''}${size === 'xs' ? 'px-1 p-0.5' : ''}`}>
                {prepend}
                <textarea
                    ref={ref}
                    id={`${id ?? name ?? label}`}
                    {...{ type, name, disabled, placeholder, onChange, onKeyDown, onKeyUp }}
                    {...(onChange ? {} : bind({ defer, name }))}
                    className={`outline-none bg-transparent  text-gray-700 flex-1 w-full ${
                        size === 'sm' ? 'text-lg md:text-xs' : ''
                    }${size === 'xs' ? 'text-lg md:text-xs' : ''}`}
                    style={{ minHeight: 100 }}
                />
                {append}
                <PrivacyBarrier />
            </span>
            <InlineErrors {...props} />
        </>
    );
});
