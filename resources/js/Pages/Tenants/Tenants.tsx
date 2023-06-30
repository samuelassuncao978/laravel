import { Context, Controller } from '@sihq/ui-components';
import React, { useContext } from 'react';

import Avatar from '../../Components/Avatar';
import Content from '../../Components/Sidebar/Content';
import Filter from '../../Components/Filter';
import Header from '../../Components/Sidebar/Header';
import Item from '../../Components/Sidebar/Item';
import { Outlet } from 'react-router-dom';
import Sidebar from '../../Components/Sidebar/Sidebar';

const Properties = {
    controller: 'App\\Http\\Controllers\\Tenants\\Tenants',
};
export default Controller(Properties, (): JSX.Element => {
    const { state } = useContext(Context);

    return (
        <>
            <Sidebar>
                <Header title="Tenants" add="/tenants/create" search />
                <Content>
                    <div className="text-xs flex justify-center">
                        <Filter
                            name="_filter"
                            options={[
                                { text: 'Active', value: 'active' },
                                { text: 'Suspended', value: 'suspended' },
                                { text: 'Maintenance', value: 'maintenance' },
                                { text: 'Deleted', value: 'deleted' },
                            ]}
                        />
                    </div>
                    {(state?.tenants ?? []).map((tenant: any) => (
                        <Item key={tenant.id} to={`/tenants/${tenant?.id}`}>
                            <div className="flex xl:flex-row flex-col h-10 items-center font-medium text-gray-900 dark:text-white pb-2 mb-2 xl:border-b border-gray-200 border-opacity-75 dark:border-gray-700 w-full">
                                <span className="flex flex-col items-center mr-2 w-6 h-6 flex-shrink-0">
                                    <Avatar name={`${tenant.domain}`} />
                                </span>
                                <div className="truncate text-left">
                                    <span className="block text-xs text-gray-500 text-left">
                                        {tenant.customer.company_name}
                                    </span>

                                    <span className="block text-xs text-gray-500 text-left">{tenant.domain}</span>
                                </div>
                            </div>
                            <div className="flex w-full text-xs divide-x divide-gray-300 text-gray-600">
                                <div className="flex items-center">
                                    <div className="text-xs py-0 px-2 leading-none rounded-md flex items-center">
                                        <span className="block h-3 w-3 mr-2 flex-shrink-0 bg-purple-500 rounded-md"></span>
                                        <span className="block flex-grow truncate text-xs">Active</span>
                                    </div>
                                </div>
                                <div className="flex items-center text-gray-400 flex-grow  pl-2"></div>
                            </div>
                        </Item>
                    ))}
                </Content>
            </Sidebar>
            <div className="flex-1 flex flex-col overflow-auto">
                <Outlet />
            </div>
        </>
    );
});
