import Controller, { ControllerProperties } from '../../Providers/Controller';
import { Outlet, useParams } from 'react-router-dom';
import { Page, PageHeader, Tabs } from '../../Components';

import React from 'react';

const Properties = {
    controller: 'App\\Http\\Controllers\\Employers\\Employer',
    parameters: ['employerId'],
};

const Employer = Controller(Properties, ({ state }: ControllerProperties): JSX.Element => {
    const { employerId } = useParams();

    return (
        <Page>
            <PageHeader title={state?.employer?.name} />
            <Tabs.Bar>
                <Tabs.Tab to={`/employers/${employerId}`} strict>
                    Overview
                </Tabs.Tab>
                <Tabs.Tab to={`/employers/${employerId}/locations`}>Locations</Tabs.Tab>
                <Tabs.Tab to={`/employers/${employerId}/content`}>Content</Tabs.Tab>
            </Tabs.Bar>
            <Outlet />
        </Page>
    );
});

export default Employer;
