import React from 'react';
import { Outlet } from 'react-router-dom';
import Header from '../../Components/Sidebar/Header';
import Sidebar from '../../Components/Sidebar/Sidebar';
import Controller from '../../Providers/Controller';
const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Users',
};
const Component = Controller(Properties, (): JSX.Element => {
    return (
        <>
            <Sidebar>
                <Header title="Reports" />
            </Sidebar>
            <div>
                <Outlet />
            </div>
        </>
    );
});

const Reports = (): JSX.Element => {
    return <Component />;
};
export default Reports;
