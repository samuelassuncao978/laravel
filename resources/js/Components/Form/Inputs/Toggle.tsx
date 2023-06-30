import React, { ReactNode, useContext } from 'react';
import { ControllerContext } from '../../../Providers/Controller';
import Conditional from '../../Conditional';
import InlineErrors from '../InlineErrors';
import Label from '../Label';
import PrivacyBarrier from '../PrivacyBarrier';
// @ts-ignore
interface ToggleProperties extends React.InputHTMLAttributes<HTMLInputElement> {
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
    base: ' flex items-center justify-center relative border-2 outline-none focus-within:ring-2 rounded focus-within:shadow-inner focus-within:ring-opacity-20 transition-all ease-in-out duration-200 flex-1 px-3 p-2',
    basic: ' bg-white border-gray-300 focus-within:border-blue-400 focus-within:ring-blue-400',
    opaque: ' focus-within:bg-white bg-gray-200 border-gray-200 focus-within:border-blue-400 focus-within:ring-blue-400',
};

export default React.forwardRef<HTMLInputElement, ToggleProperties>((props, ref): JSX.Element => {
    const { bind = (): object => ({}) } = useContext(ControllerContext);
    const { id, name, label, defer = true, append, prepend, disabled, variant = 'basic', placeholder } = props;

    const className = Object.entries(VARIANTS)
        .filter((i) => ['base', variant].includes(i[0]))
        .reduce((a, b): any => [...a, b[1]], [])
        .join('');

    return (
        <>
            <span
                data-input="checkbox"
                className="flex relative flex-col text-gray-600 focus-within:text-blue-500 -ml-1 -mr-2 rounded p-1 pr-2 hover:text-blue-500 cursor-pointer text-xs group"
            >
                <span data-input="toggle" className="flex justify-start items-center relative">
                    {prepend}
                    <div className="relative flex-shrink-0 rounded-full w-7 h-4 transition duration-200 ease-linear">
                        <input
                            type="checkbox"
                            className="opacity-0 absolute inset-0 w-full h-full z-40"
                            ref={ref}
                            id={`${id ?? name ?? label}`}
                            {...{ name, disabled, placeholder }}
                            {...bind({ defer, name })}
                        />
                        <span className="checked opacity-0 bg-green-500 absolute z-10 left-0 w-full h-full rounded-full transition duration-100 ease-linear"></span>
                        <span className="bg-gray-400 absolute left-0 w-full h-full rounded-full"></span>
                        <span className="checked-peg absolute z-20 left-0 bg-white w-3 h-3 m-0.5 rounded-full transition transform duration-100 ease-linear cursor-pointer translate-x-0"></span>
                    </div>
                    <Conditional expresion={!!label}>
                        <div className="select-none flex flex-col pl-2">
                            <Label>{label}</Label>
                        </div>
                    </Conditional>
                    {append}
                </span>
                <PrivacyBarrier />
                <InlineErrors {...props} />
            </span>
        </>
    );
});
