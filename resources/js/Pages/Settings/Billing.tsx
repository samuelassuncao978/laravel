import { CreditCardIcon, IdentificationIcon } from '@heroicons/react/outline';
import { SaveIcon } from '@heroicons/react/solid';
import React from 'react';
import Actionbar from '../../Components/Actionbar';
import Button from '../../Components/Button';
import Form from '../../Components/Form';
import Field from '../../Components/Form/Field';
import Label from '../../Components/Form/Label';
import Page from '../../Components/Page';
import PageHeader from '../../Components/PageHeader';

import Controller from '../../Providers/Controller';
const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Users',
};
const Component = Controller(Properties, (): JSX.Element => {
    return (
        <Page>
            <PageHeader title="Billing" description="Manage your billing details" />

            <Actionbar.Bar>
                <Actionbar.Item right>
                    <Button size="sm" variant="primary" icon={<SaveIcon />}>
                        Save changes
                    </Button>
                </Actionbar.Item>
            </Actionbar.Bar>

            <Form.Layout>
                <Form.Row title="Receive payments" description="Please fill out all your personal details">
                    <div className="flex-1 space-y-4">
                        <div>
                            <Label>Identity:</Label>
                            <div className="flex space-x-4 flex-1">
                                <button
                                    type="button"
                                    className="text-xs bg-white text-gray-600 flex flex-col items-center justify-center rounded shadow-xs border-2 border-gray-300 h-28 w-1/2 hover:text-blue-500 hover:border-blue-500"
                                >
                                    <IdentificationIcon className="h-6 w-6 mb-1" />
                                    FRONT
                                    <span className="opacity-50">(Upload licence)</span>
                                </button>
                                <button
                                    type="button"
                                    className="text-xs bg-white text-gray-600 flex flex-col items-center justify-center rounded shadow-xs border-2 border-gray-300 h-28 w-1/2 hover:text-blue-500 hover:border-blue-500"
                                >
                                    <CreditCardIcon className="h-6 w-6 mb-1" />
                                    BACK
                                    <span className="opacity-50">(Upload licence)</span>
                                </button>
                            </div>
                        </div>

                        <div className="flex space-x-4">
                            <Field type="text" name="user.account_no" label="Account Number:" />
                            <Field type="text" name="user.bsb" label="BSB:" />
                        </div>
                        <div className="flex space-x-4">
                            <Field type="text" name="user.first_name" label="ABN/ACN:" />
                        </div>
                    </div>
                </Form.Row>
                <Form.Row
                    title="Disbursements"
                    description="Payments can be transfered to your account following this disbursement schedule"
                >
                    <div className="flex flex-1 space-x-8">
                        <div className="flex-1">
                            <Field
                                type="select"
                                name="user.schedule"
                                label="Schedule"
                                options={[
                                    { value: 'daily', text: 'Daily' },
                                    { value: 'weekly', text: 'Weekly' },
                                    { value: 'monthly', text: 'Monthly' },
                                ]}
                            />
                        </div>
                    </div>
                </Form.Row>
            </Form.Layout>
        </Page>
    );
});

const Billing = (): JSX.Element => {
    return <Component />;
};
export default Billing;
