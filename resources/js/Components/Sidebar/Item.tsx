import React, { ReactNode } from 'react';
import { NavLink } from 'react-router-dom';

interface Props {
    children?: ReactNode;
    to: string;
    strict?: boolean;
}

export default function Item({ children, to, strict }: Props): JSX.Element {
    // pb-2 mb-2 xl:border-b border-gray-200 border-opacity-75
    return (
        <NavLink
            to={to}
            end={strict}
            className={({ isActive }): string =>
                `relative overflow-hidden p-3 divide-y divide-gray-200 space-y-1 w-full flex flex-col rounded-md  shadow  border focus:outline-none border-white  ${
                    isActive
                        ? 'ring-2 ring-blue-500 focus:outline-none bg-white'
                        : 'bg-gray-50 text-gray-500 hover:border-gray-300'
                }`
            }
        >
            {children}
        </NavLink>
    );
}
