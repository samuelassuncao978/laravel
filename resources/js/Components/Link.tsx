import React, { ReactNode } from 'react';
import { Link } from 'react-router-dom';

interface LinkProperties {
    children: ReactNode;
    variant?: string;
    to: string;
    disabled?: boolean;
}

const classes = {
    base: 'inline-flex items-center justify-center relative outline-none hover:underline rounded transition-all ease-in-out duration-200',
    basic: ' text-gray-500 hover:text-gray-700',
    primary: ' text-blue-500 hover:text-blue-700 active:text-blue-900',
};

export default ({ children, variant = 'basic', to, disabled }: LinkProperties): JSX.Element => {
    const className = Object.entries(classes)
        .filter((i) => ['base', variant].includes(i[0]))
        .join('');

    return <Link {...{ className, to, disabled }}>{children}</Link>;
};
