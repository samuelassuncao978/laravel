import React, { ReactNode } from 'react';

interface LabelProperties {
    children?: ReactNode;
    label?: string;
}

export default ({ children, label }: LabelProperties): JSX.Element => {
    return <span className="font-semibold text-gray-600 text-sm leading-loose select-none">{children ?? label}</span>;
};
