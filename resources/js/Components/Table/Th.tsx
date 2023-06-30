import React from 'react';

interface Props {
    children?: JSX.Element | JSX.Element[] | string;
}
export default function Th({ children }: Props): JSX.Element {
    return <th className="font-normal px-3 pb-3 border-b border-gray-200 pt-5 ">{children}</th>;
}
