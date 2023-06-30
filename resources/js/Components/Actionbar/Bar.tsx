import React from 'react';

interface Props {
    children: JSX.Element | JSX.Element[];
}
export default function Bar({ children }: Props): JSX.Element {
    return (
        <div
            style={{ minHeight: '35px' }}
            className="divide-x divide-gray-300 flex items-center text-xs text-gray-600 space-x-4
            
            
             bg-gray-50  my-4 border rounded border-gray-200 shadow-xs -mx-4 p-2 py-4
            "
        >
            {children}
        </div>
    );
}
