import React from 'react';
import Conditional from '../Conditional';

interface RowProps {
    children: JSX.Element | JSX.Element[];
    title?: JSX.Element | string;
    description?: JSX.Element | string;
}

const Row = ({ children, title, description }: RowProps): JSX.Element => {
    return (
        <div className="flex flex-col xl:flex-row py-8  xl:space-x-8">
            <Conditional expresion={!!title || !!description}>
                <div className="w-64 mb-5 xl:mb-0">
                    <div className="text-gray-700 text-sm font-bold">{title}</div>
                    <div className="text-sm text-gray-500">{description}</div>
                </div>
            </Conditional>
            <div className="flex md:w-2/3 xl:w-96">{children}</div>
        </div>
    );
};

export default Row;
