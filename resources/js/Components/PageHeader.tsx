import React from 'react';

interface Props {
    title?: string | JSX.Element;
    description?: string | JSX.Element;
    children?: JSX.Element | JSX.Element[];
}
export default function PageHeader({ title, description, children }: Props): JSX.Element {
    return (
        <div className="flex items-center mb-10 container mx-auto">
            <div className="flex-1">
                <h1 className="text-2xl font-bold text-gray-700">{title}</h1>
                <p className="text-sm text-gray-500">{description}</p>
            </div>
            <div>{children}</div>
        </div>
    );
}
