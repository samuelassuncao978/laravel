import React from 'react';

interface Props {
    title?: string | JSX.Element | JSX.Element[];
    children: JSX.Element | JSX.Element[];
}
export default function Item({ children, title }: Props): JSX.Element {
    return (
        <div className="flex text-xs items-center h-4">
            <span className="font-bold mr-2 ml-4">{title}</span>
            <span className="text-blue-500">{children}</span>
        </div>
    );
}
