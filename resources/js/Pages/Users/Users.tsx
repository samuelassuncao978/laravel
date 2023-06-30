import { Context, Controller } from '@sihq/ui-components';
import { Outlet, useLocation } from 'react-router-dom';
import React, { useContext } from 'react';

import Content from '../../Components/Sidebar/Content';
import Filter from '../../Components/Filter';
import Header from '../../Components/Sidebar/Header';
import Item from '../../Components/Sidebar/Item';
import ItemHeading from '../../Components/Sidebar/ItemHeading';
import Sidebar from '../../Components/Sidebar/Sidebar';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Users',
};

export default Controller(Properties, (): JSX.Element => {
    const { state } = useContext(Context);
    const location = useLocation();

    return (
        <>
            <Sidebar>
                <Header title="Users" add="/users/create" search />

                <Content>
                    <div className="text-xs flex justify-center">
                        <Filter
                            name="_filter"
                            options={[
                                { text: 'Active', value: 'active' },
                                { text: 'Suspended', value: 'suspended' },
                                { text: 'Pending', value: 'pending' },
                            ]}
                        />
                    </div>
                    {(state?.users ?? []).map((user: any) => (
                        <Item key={user.id} to={`/users/${user?.id}`}>
                            <ItemHeading
                                title={`${user.first_name} ${user.last_name}`}
                                description={user.email}
                                avatar={`${user.first_name} ${user.last_name}`}
                            />
                            <div className="flex w-full text-xs divide-x divide-gray-300 text-gray-600 pt-2">
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
            <div>
                <Outlet />
            </div>
        </>
    );
});
