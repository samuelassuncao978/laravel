import React from 'react';

interface Props {
    children?: JSX.Element | JSX.Element[];
}
export default function Bar({ children }: Props): JSX.Element {
    return (
        <div className="text-xs -mb-0.5 transform translate-y-4 relative z-20 flex items-center space-x-3">
            {children}
        </div>
    );
}
