import React, { ReactNode, useContext } from 'react';

import { CheckIcon } from '@heroicons/react/solid';
import Conditional from '../../Conditional';
import { ControllerContext } from '../../../Providers/Controller';
import InlineErrors from '../InlineErrors';
import PrivacyBarrier from '../PrivacyBarrier';
import { TypeIcon } from '../../../Types';

// @ts-ignore
interface ToggleButtonProperties extends React.InputHTMLAttributes<HTMLButtonElement> {
    id?: string;
    label?: string;
    name: string;
    type: string;
    defer?: boolean;
    prepend?: ReactNode;
    append?: ReactNode;
    size?: string;
    variant?: string;
    icon?: TypeIcon;
    description?: string;
}

const VARIANTS: { [key: string]: string } = {
    base: ' p-4 relative flex text-gray-700 flex-col items-center text-sm justify-center rounded border-2 ',
};

export default React.forwardRef<HTMLButtonElement, ToggleButtonProperties>((props, ref): JSX.Element => {
    const { value, setValue } = useContext(ControllerContext);
    const { id, name, label, disabled, variant = 'basic', icon, description } = props;

    const className = Object.entries(VARIANTS)
        .filter((i) => ['base', variant].includes(i[0]))
        .reduce((a, b): any => [...a, b[1]], [])
        .join('');

    return (
        <>
            <button
                className={`${className} ${
                    value(name)
                        ? 'border-blue-400 shadow-inner bg-blue-50'
                        : 'border-gray-200 bg-gray-50 hover:border-gray-300 hover:bg-gray-100'
                }`}
                ref={ref}
                id={`${id ?? name ?? label}`}
                {...{ name, disabled }}
                onClick={(): void => setValue(name, !value(name))}
            >
                <Conditional expresion={!!value(name)}>
                    <span className="absolute top-2 right-2 w-4 h-4 flex text-white p-0.5 rounded-full bg-blue-500">
                        <CheckIcon />
                    </span>
                </Conditional>
                <Conditional expresion={!!icon}>
                    <span className="w-4 h-4  mb-2">{icon}</span>
                </Conditional>
                {label}
                <Conditional expresion={!!description}>
                    <span className="text-xs opacity-50">{description}</span>
                </Conditional>
                <PrivacyBarrier />
            </button>

            <InlineErrors {...props} />
        </>
    );
});
