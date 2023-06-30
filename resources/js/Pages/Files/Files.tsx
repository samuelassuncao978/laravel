import React from 'react';
import { Outlet } from 'react-router-dom';
import Header from '../../Components/Sidebar/Header';
import Sidebar from '../../Components/Sidebar/Sidebar';
import Content from '../../Components/Sidebar/Content';
import Controller from '../../Providers/Controller';
import Spacer from '../../Components/Sidebar/Spacer';
import Tab from '../../Components/Sidebar/Tab';
import { CollectionIcon, UsersIcon } from '@heroicons/react/outline';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Users',
};

const Component = Controller(Properties, (): JSX.Element => {
    return (
        <>
            <Sidebar>
                <Header title="Files" search />

                <Content>
                    <div className="text-xs font-semibold text-gray-600 uppercase tracking-wide text-left pt-5 ml-3 mr-1 flex items-center">
                        Locations
                    </div>
                    <div className="space-y-2">
                        <Tab to="/files/" title="My files" icon={<CollectionIcon />} />
                        <Tab to="/files/client-files" title="Client files" icon={<UsersIcon />} />
                    </div>
                    <Spacer />

                    <div className="text-xs font-semibold text-gray-600 uppercase tracking-wide text-left pt-5 ml-3 mr-1 flex items-center">
                        Tags
                    </div>
                </Content>
            </Sidebar>
            <div>
                <Outlet />
            </div>
        </>
    );
});

const Files = (): JSX.Element => {
    return <Component />;
};
export default Files;
