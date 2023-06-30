import React from 'react';

interface Props {
    children?: JSX.Element | JSX.Element[] | string;
    clickThrough?: boolean;
    collapsed?: boolean;
}
export default function Td({ children, clickThrough, collapsed }: Props): JSX.Element {
    return (
        <td
            onClick={clickThrough ? (e): void => e.stopPropagation() : (): void => undefined}
            className={`sm:p-3 py-2 px-1 border-b border-gray-200 ${collapsed ? 'w-1 whitespace-nowrap' : ''}`}
        >
            {children}
        </td>
    );
}
