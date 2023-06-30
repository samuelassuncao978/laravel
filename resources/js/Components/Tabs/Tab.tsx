import React from 'react';
import { NavLink } from 'react-router-dom';

interface Props {
    children?: string | JSX.Element | JSX.Element[];
    to: string;
    strict?: boolean;
}
export default function Tab({ children, to, strict }: Props): JSX.Element {
    return (
        <NavLink
            to={to}
            end={strict}
            className={({ isActive }): string =>
                `px-3 relative overflow-hidden focus:outline-none border-b-2 pb-1.5 relative ${
                    isActive ? 'border-blue-500 text-blue-500' : 'text-gray-500 border-transparent hover:text-gray-700'
                }`
            }
        >
            {children}
        </NavLink>
    );
}
