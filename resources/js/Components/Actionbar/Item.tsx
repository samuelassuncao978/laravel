import React from 'react';
import Conditional from '../Conditional';

interface Props {
    title?: string;
    children: JSX.Element | JSX.Element[];
    right?: boolean;
}
export default function Item({ children, title, right }: Props): JSX.Element {
    return (
        <div className={`flex text-xs items-center h-4 pl-4 ${right ? 'flex-1 justify-end' : ''}`}>
            <Conditional expresion={!!title}>
                <span className="font-bold mr-2">{title}</span>
            </Conditional>
            <span> {children}</span>
        </div>
    );
}
