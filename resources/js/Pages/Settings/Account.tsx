import { FingerPrintIcon, SaveIcon } from '@heroicons/react/solid';
import React from 'react';
import Actionbar from '../../Components/Actionbar';
import Button from '../../Components/Button';
import Form from '../../Components/Form';
import Field from '../../Components/Form/Field';
import Page from '../../Components/Page';
import PageHeader from '../../Components/PageHeader';

import Controller from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Users',
};

const Component = Controller(Properties, (): JSX.Element => {
    return (
        <Page>
            <PageHeader title="Account" description="Manage your account details" />

            <Actionbar.Bar>
                <Actionbar.Item right>
                    <Button size="sm" icon={<FingerPrintIcon />}>
                        Change password
                    </Button>
                </Actionbar.Item>
                <Actionbar.Item>
                    <Button size="sm" variant="primary" icon={<SaveIcon />}>
                        Save changes
                    </Button>
                </Actionbar.Item>
            </Actionbar.Bar>

            <Form.Layout>
                <Form.Row title="Personal Details" description="Please fill out all your personal details">
                    <div className="flex-1 space-y-4">
                        <div className="flex space-x-4">
                            <div className="w-32 h-32 bg-gray-500 rounded"></div>
                            <div>change</div>
                        </div>
                        <div className="flex space-x-4">
                            <Field type="text" name="user.first_name" label="First name:" />
                            <Field type="text" name="user.last_name" label="Last name:" />
                        </div>
                        <div className="flex space-x-4">
                            <Field type="text" name="user.email" label="Email:" />
                        </div>
                        <div className="flex space-x-4">
                            <Field type="date-of-birth" name="user.dob" label="Date of Birth:" />
                            <Field
                                type="timezone"
                                name="user.timezone"
                                label="Timezone:"
                                options={[
                                    { value: 'daily', text: 'Daily' },
                                    { value: 'weekly', text: 'Weekly' },
                                    { value: 'monthly', text: 'Monthly' },
                                ]}
                            />
                        </div>
                    </div>
                </Form.Row>
                <Form.Row title="Contact information" description="Please fill out all your personal details">
                    <div className="flex-1 space-y-4">
                        <div className="flex space-x-4">
                            <Field type="phone" name="user.phone" label="Phone:" />
                        </div>
                        <div className="flex space-x-4">
                            <Field type="address" name="user.address" label="Address:" />
                        </div>
                    </div>
                </Form.Row>
            </Form.Layout>
        </Page>
    );
});

const Account = (): JSX.Element => {
    return <Component />;
};
export default Account;
