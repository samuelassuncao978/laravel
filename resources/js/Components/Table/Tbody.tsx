import React from 'react';

interface Props {
    children: JSX.Element | JSX.Element[];
}
export default function Tbody({ children }: Props): JSX.Element {
    return <tbody className="text-gray-600 dark:text-gray-100">{children}</tbody>;
}
