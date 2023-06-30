import React, { ReactNode } from 'react';
import { NavLink } from 'react-router-dom';

interface props {
    children: ReactNode;
    href: string;
    strict?: boolean;
}

export default function Item({ children, href, strict }: props): JSX.Element {
    return (
        <NavLink
            to={href}
            end={strict}
            className={({ isActive }) =>
                `h-10 w-full flex-col p-2.5 relative rounded-md flex items-center justify-center hover:text-blue-500 ${
                    isActive ? 'text-blue-500' : ''
                }`
            }
        >
            {({ isActive }) => (
                <>
                    <span
                        className={`absolute top-0 bottom-0 left-0 bg-blue-500 shadow rounded-r-full w-1 transform transition transition-all ease-in-out duration-500  ${
                            isActive ? 'translate-x-0' : '-translate-x-2'
                        }`}
                    ></span>
                    {children}
                </>
            )}
        </NavLink>
    );
}
