import React from 'react';

interface Props {
    children?: JSX.Element | JSX.Element[];
}
export default function Page({ children }: Props): JSX.Element {
    return <div className="p-8 lg:px-20">{children}</div>;
}
