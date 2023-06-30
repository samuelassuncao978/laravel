import React from 'react';
interface Props {
    icon?: JSX.Element;
    title?: string | JSX.Element;
    description?: string | JSX.Element;
}
export default function Header({ icon, title, description }: Props): JSX.Element {
    return (
        <div className="rounded-t-md flex p-4 px-8 space-x-2">
            <div className="h-5 w-5 mt-1 flex">{icon}</div>
            <div className="flex flex-col">
                <div className="text-lg font-bold text-gray-700">{title}</div>
                <div className="text-xs tracking-tighter text-gray-600 flex items-center">
                    <div className="flex space-x-4">{description}</div>
                </div>
            </div>
        </div>
    );
}
