import Conditional from './Conditional';
import React from 'react';
import { TypeVariant } from '../Types';
import _ from 'lodash';
import withInteraction from '../Providers/withInteraction';
interface ButtonProperties extends React.ButtonHTMLAttributes<HTMLButtonElement> {
    variant?: string;
    size?: string;
    icon?: JSX.Element;
    action?: VoidFunction | undefined;
    to?: string;
}
const BASE =
    ' space-x-2 block border font-semibold flex justify-center items-center flex-grow focus:outline-none rounded focus:ring-4 relative overflow-hidden shadow active:shadow-inner transition-all ease-in-out duration-200';

const VARIANTS: { [key in TypeVariant]: string } = {
    opaque: ' ',
    'opaque-rounded': '',
    warning:
        'text-white border-yellow-600 bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-200 active:bg-yellow-800',
    standard: ' bg-white border-white hover:bg-gray-50 active:bg-gray-200 focus:ring-gray-200 text-gray-700 ',
    primary: ' text-white border-blue-500 bg-blue-500 hover:bg-blue-600 focus:ring-blue-200 active:bg-blue-800',
    destructive: ' text-white border-red-600 bg-red-600 hover:bg-red-700 focus:ring-red-200 active:bg-red-800',
    'flat-destructive':
        '  border-transparent shadow-none hover:text-red-700 active:bg-red-50 focus:ring-red-200 text-gray-500',
    'flat-primary':
        '  border-transparent shadow-none hover:text-blue-700 active:bg-blue-50 focus:ring-blue-200 text-gray-500',
};

const SIZES = {
    xs: ' py-1 px-3 text-xs',
    sm: ' py-2 px-4 text-xs',
    md: ' py-2.5 px-8 text-xs',
    xl: ' py-3 px-8 text-sm',
};

export default withInteraction(
    ({
        type = 'button',
        children,
        variant = 'standard',
        size = 'md',
        action,
        disabled,
        icon,
    }: ButtonProperties): JSX.Element => {
        const className = [
            BASE,
            Object.values(_.pick(VARIANTS, [variant])).join(' '),
            Object.values(_.pick(SIZES, [size])).join(' '),
        ].join(' ');

        return (
            <button {...{ type, className, disabled }} onClick={action}>
                <Conditional expresion={!!icon}>
                    <span className="flex flex-shrink-0 items-center justify-center">
                        <span className="h-4 w-4">{icon}</span>
                    </span>
                </Conditional>
                <Conditional expresion={!!children}>
                    <span>{children}</span>
                </Conditional>
            </button>
        );
    },
);
