import React from 'react';
import { Outlet } from 'react-router-dom';

import Header from '../../Components/Sidebar/Header';
import Item from '../../Components/Sidebar/Item';
import Sidebar from '../../Components/Sidebar/Sidebar';
import Content from '../../Components/Sidebar/Content';

import Controller, { ControllerProperties } from '../../Providers/Controller';
import ItemHeading from '../../Components/Sidebar/ItemHeading';

const Properties = {
    controller: 'App\\Http\\Controllers\\Employers\\Index',
};

export default Controller(Properties, ({ state }: ControllerProperties): JSX.Element => {
    return (
        <>
            <Sidebar>
                <Header title="Employers" add="/employers/create" search />
                <Content>
                    {(state?.employers ?? []).map((employer: any) => (
                        <Item key={employer.id} to={`/employers/${employer?.id}`}>
                            <ItemHeading title={employer.name} avatar={employer.name} />
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
