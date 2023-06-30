import React from 'react';
import Avatar from '../Avatar';
import Conditional from '../Conditional';

interface Props {
    title: string;
    description?: string;
    avatar?: string;
}

export default function ItemHeading({ title, description, avatar }: Props): JSX.Element {
    return (
        <div className="flex xl:flex-row flex-col h-10 items-center font-medium text-gray-900 w-full">
            <Conditional expresion={!!avatar}>
                <span className="flex flex-col items-center mr-2 w-6 h-6 flex-shrink-0">
                    <Avatar name={`${avatar}`} />
                </span>
            </Conditional>
            <div className="truncate text-left">
                <span className="block text-xs font-bold text-gray-500 text-left">{title}</span>
                <Conditional expresion={!!description}>
                    <span className="block text-xs text-gray-500 text-left">{description}</span>
                </Conditional>
            </div>
        </div>
    );
}
