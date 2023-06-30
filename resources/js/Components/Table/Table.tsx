import React from 'react';

interface Props {
    children: JSX.Element | JSX.Element[];
}
export default function Table({ children }: Props): JSX.Element {
    return <table className="w-full text-left text-sm">{children}</table>;
}
