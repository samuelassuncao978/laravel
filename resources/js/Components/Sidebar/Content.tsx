import React, { ReactNode } from 'react';

interface Props {
    children?: ReactNode;
}

export default function Header({ children }: Props): JSX.Element {
    return (
        <div className="scroll-shadow flex-1 relative overflow-hidden">
            <div className="scroller space-y-4 py-3 p-5 scrollbar h-full">{children}</div>
        </div>
    );
}
