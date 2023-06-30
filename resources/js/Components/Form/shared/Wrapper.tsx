import { TypeSize, TypeVariant } from '../../../Types';

import React from 'react';
import _ from 'lodash';

interface Props {
    children: JSX.Element | JSX.Element[];
    variant?: TypeVariant;
    size?: TypeSize;
}

const BASE =
    ' flex items-center justify-center relative border-2 outline-none focus-within:ring-2 focus-within:shadow-inner focus-within:ring-opacity-20 transition-all ease-in-out duration-200 flex-1';

const VARIANTS: { [key in TypeVariant]: string } = {
    primary: '',
    destructive: '',
    warning: '',
    'flat-destructive': '',
    'flat-primary': '',
    standard: ' bg-white border-gray-300 focus-within:border-blue-400 focus-within:ring-blue-400 rounded text-gray-700',
    opaque: ' focus-within:bg-white bg-gray-200 border-gray-200 focus-within:border-blue-400 focus-within:ring-blue-400 rounded text-gray-700',
    'opaque-rounded':
        ' focus-within:bg-white bg-gray-200 border-gray-200 focus-within:border-blue-400 focus-within:ring-blue-400 rounded-full text-gray-700',
};

const SIZES: { [key in TypeSize]: string } = {
    xs: 'px-1 p-0.5 text-lg md:text-xs ',
    sm: 'px-3 p-2 text-lg md:text-xs ',
    md: 'px-3 p-2 text-lg md:text-sm',
    lg: 'px-4 p-3 text-lg md:text-sm',
    xl: 'px-4 p-3 text-lg md:text-md',
};

export default function Wrapper({ children, size = 'sm', variant = 'standard' }: Props): JSX.Element | null {
    const className = [
        BASE,
        Object.values(_.pick(VARIANTS, [variant])).join(' '),
        Object.values(_.pick(SIZES, [size])).join(' '),
    ].join(' ');

    return <span className={className}>{children}</span>;
}
