import React from 'react';

interface Props {
    children: JSX.Element | JSX.Element[];
}
export default function Thead({ children }: Props): JSX.Element {
    return <thead>{children}</thead>;
}
