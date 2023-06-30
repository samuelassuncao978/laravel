import React from 'react';

interface LayoutProps {
    children: JSX.Element | JSX.Element[];
}

const Layout = ({ children }: LayoutProps): JSX.Element => {
    return <div className="container mx-auto xl:pt-10 divide-y divide-gray-200">{children}</div>;
};
export default Layout;
