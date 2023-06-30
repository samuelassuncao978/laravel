import React from 'react';
import { Outlet, useParams } from 'react-router-dom';
import Actionbar from '../../Components/Actionbar';
import Button from '../../Components/Button';
import Page from '../../Components/Page';
import PageHeader from '../../Components/PageHeader';

import Tabs from '../../Components/Tabs';

import Controller, { ControllerProperties } from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Tenants\\Tenant',
};
const Component = Controller(Properties, (props: ControllerProperties): JSX.Element => {
    const { state }: any = props;
    const { tenantId } = useParams();

    return (
        <Page>
            <PageHeader title={state?.tenant?.domain} />
            <Tabs.Bar>
                <Tabs.Tab to={`/tenants/${tenantId}`} strict>
                    Overview
                </Tabs.Tab>
                <Tabs.Tab to={`/tenants/${tenantId}/invoices`}>Invoices</Tabs.Tab>
                <Tabs.Tab to={`/tenants/${tenantId}/settings`}>Settings</Tabs.Tab>
            </Tabs.Bar>
            <Outlet />
        </Page>
    );
});

const Tenant = (): JSX.Element => {
    const { tenantId } = useParams();
    // @ts-ignore
    return <Component tenantId={tenantId} />;
};
export default Tenant;
