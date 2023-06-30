import React from 'react';

interface Props {
    children: JSX.Element | JSX.Element[];
}
export default function Bar({ children }: Props): JSX.Element {
    return (
        <div
            style={{ minHeight: '45px' }}
            className="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600 border-t border-gray-200"
        >
            {children}
        </div>
    );
}
