import React, { ReactNode } from 'react';

interface props {
    children: ReactNode;
}

export default function Sidebar({ children }: props): JSX.Element {
    return (
        <div className="w-72 flex-shrink-0 border-r bg-gray-100 border-gray-200 h-full overflow-hidden lg:flex flex-col hidden">
            {children}
        </div>
    );
}
