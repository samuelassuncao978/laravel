import React, { useContext } from 'react';
import { Context, Controller } from '@sihq/ui-components';
import Navigation from '../Components/Navigation/Navigation';
import { Link, Outlet, useLocation, useNavigate } from 'react-router-dom';

const Properties = {
    controller: 'App\\Http\\Controllers\\Main',
};

const Admin = Controller(Properties, (): JSX.Element => {

    const { state, mounted } = useContext(Context);
    const navigate = useNavigate();

    if (mounted === true && !state?.user) {
        navigate('/login');
    }

    if (!mounted) {
        return (
            <div className="flex items-center justify-center h-full w-full">
                <div>
                    <div
                        className="w-12 h-12 rounded-full animate-spin border-y-4 border-solid border-blue-500 border-t-transparent"
                    ></div>
                </div>
            </div>
        );
    }

    return (
        <div className="flex flex-1 overflow-hidden h-screen">
            <Navigation />

            <div className="flex-grow overflow-x-hidden flex flex-col rounded-r-lg">
                <div className="flex-grow overflow-x-hidden flex">
                    <div className="flex-grow flex bg-white overflow-y-auto relative">
                        <Outlet />
                    </div>
                </div>
            </div>
            {/* <livewire:welcome />
            <livewire:version-upgrade />
            <livewire:admin.users.onboard />
            <x-taskbar.bar /> */}
        </div>
    );
});
export default Admin;
