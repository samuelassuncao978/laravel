import { DocumentAddIcon, LightningBoltIcon } from '@heroicons/react/outline';
import { EyeIcon, TrashIcon } from '@heroicons/react/solid';
import React from 'react';
import { useParams } from 'react-router-dom';
import Actionbar from '../../Components/Actionbar';
import Button from '../../Components/Button';
import Filter from '../../Components/Filter';
import Field from '../../Components/Form/Field';
import Controller, { ControllerProperties } from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Tenants\\Tenant',
};

const Component = Controller(Properties, (props: ControllerProperties): JSX.Element => {
    const { state }: any = props;

    return (
        <>
            <Actionbar.Bar>
                <Actionbar.Item title="Find:">
                    <Field name="test" type="search" variant="opaque-rounded" size="xs" />
                </Actionbar.Item>
                <Actionbar.Item title="Group:">
                    <Filter
                        name="text"
                        options={[
                            { text: 'None', value: 'none' },
                            { text: 'Month', value: 'month' },
                            { text: 'Type', value: 'type' },
                            { text: 'Method', value: 'method' },
                            { text: 'Status', value: 'status' },
                        ]}
                    />
                </Actionbar.Item>
                <Actionbar.Item>
                    <div className="flex items-center space-x-1 text-gray-700">
                        <span className="h-3 w-3">
                            <EyeIcon />
                        </span>
                        <Field name="toggle" type="toggle" variant="opaque" size="xs" />
                        <span className="h-3 w-3 opacity-50">
                            <TrashIcon />
                        </span>
                    </div>
                </Actionbar.Item>

                <Actionbar.Item right>
                    <Button size="sm" icon={<LightningBoltIcon />}>
                        Generate
                    </Button>
                </Actionbar.Item>
                <Actionbar.Item>
                    <Button size="sm" icon={<DocumentAddIcon />}>
                        New invoice
                    </Button>
                </Actionbar.Item>
            </Actionbar.Bar>
            Invoices
        </>
    );
});

const Invoices = (): JSX.Element => {
    const { tenantId } = useParams();
    // @ts-ignore
    return <Component tenantId={tenantId} />;
};
export default Invoices;
