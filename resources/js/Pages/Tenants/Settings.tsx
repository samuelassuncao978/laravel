import React from 'react';
import { useParams } from 'react-router-dom';
import Actionbar from '../../Components/Actionbar';
import Button from '../../Components/Button';
import Controller, { ControllerProperties } from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Tenants\\Tenant',
};

const Component = Controller(Properties, (props: ControllerProperties): JSX.Element => {
    const { state }: any = props;

    return (
        <>
            <Actionbar.Bar>
                <Actionbar.Item right>
                    <Button size="sm">Change password</Button>
                </Actionbar.Item>
                <Actionbar.Item>
                    <Button size="sm" variant="primary">
                        Save changes
                    </Button>
                </Actionbar.Item>
            </Actionbar.Bar>
            Settings
        </>
    );
});

const Settings = (): JSX.Element => {
    const { tenantId } = useParams();
    // @ts-ignore
    return <Component tenantId={tenantId} />;
};
export default Settings;
