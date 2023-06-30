import React, { ReactNode } from 'react';
import { NavLink } from 'react-router-dom';
import Conditional from '../Conditional';

interface Props {
    to: string;
    icon?: ReactNode;
    count?: number;
    title: string;
    caption?: string;
    strict?: boolean;
}

export default function Tab({ to, title, caption, icon, count, strict }: Props): JSX.Element {
    return (
        <NavLink
            to={to}
            end={strict}
            className={({ isActive }): string =>
                `flex relative select-none focus:outline-none cursor-pointer flex-grow px-4 py-2 rounded ${
                    isActive ? 'text-white bg-blue-500' : 'text-gray-500 hover:bg-gray-200'
                }`
            }
        >
            <Conditional expresion={!!icon}>
                <div className="w-5 h-5 mr-3 flex items-center justify-center flex-shrink-0">{icon}</div>
            </Conditional>
            <div className="flex flex-col flex-grow items-start text-left text-xs">
                <span className="font-bold leading-5">{title}</span>
                <Conditional expresion={!!caption}>
                    <span className="opacity-75">{caption}</span>
                </Conditional>
            </div>
            <Conditional expresion={!!count}>
                <div className="flex-shrink-0 leading-5 text-xs ml-2 ">{count}</div>
            </Conditional>
        </NavLink>
    );
}
