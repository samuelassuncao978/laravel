import { OfficeBuildingIcon, PhoneOutgoingIcon, SaveIcon, VideoCameraIcon } from '@heroicons/react/solid';
import React, { useContext } from 'react';
import Actionbar from '../../Components/Actionbar';
import Button from '../../Components/Button';
import Form from '../../Components/Form';
import Field from '../../Components/Form/Field';
import Label from '../../Components/Form/Label';
import Page from '../../Components/Page';
import PageHeader from '../../Components/PageHeader';

import Controller, { ControllerContext } from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Users',
};

const Component = Controller(Properties, (): JSX.Element => {
    const { value } = useContext(ControllerContext);

    return (
        <Page>
            <PageHeader title="Appointments" description="Manage your accepted appointments" />

            <Actionbar.Bar>
                <Actionbar.Item right>
                    <Button size="sm" variant="primary" icon={<SaveIcon />}>
                        Save changes
                    </Button>
                </Actionbar.Item>
            </Actionbar.Bar>

            <Form.Layout>
                <Form.Row title="Standard appointment" description="Please fill out all your personal details">
                    <div className="flex-1 space-y-4">
                        <Field type="toggle" name="accept-supervision" label="Accept standard appointments" />
                        {value('accept-supervision') === true ? (
                            <>
                                <div className="flex space-x-4">
                                    <Field type="duration" name="user.duration" label="Duration" />
                                    <Field type="currency" name="user.charge" label="Charge" />
                                </div>

                                <div>
                                    <Label>Methods</Label>
                                    <div className="grid grid-cols-3 gap-4">
                                        <Field
                                            type="toggle-button"
                                            name="user.video"
                                            label="Video"
                                            icon={<VideoCameraIcon />}
                                        />
                                        <Field
                                            type="toggle-button"
                                            name="user.telephone"
                                            label="Telephone"
                                            icon={<PhoneOutgoingIcon />}
                                        />
                                        <Field
                                            type="toggle-button"
                                            name="user.inperson"
                                            label="InPerson"
                                            icon={<OfficeBuildingIcon />}
                                        />
                                    </div>
                                </div>
                            </>
                        ) : null}
                    </div>
                </Form.Row>
                <Form.Row title="Standard appointment" description="Please fill out all your personal details">
                    <div className=" flex-1 space-y-4">
                        <Field type="toggle" name="accept-supervision" label="Accept standard appointments" />
                        {value('accept-supervision') === true ? (
                            <>
                                <div className="flex space-x-4">
                                    <Field type="text" name="user.duration" label="Duration" />
                                    <Field type="text" name="user.charge" label="Charge" />
                                </div>

                                <div>
                                    <Label>Methods</Label>
                                    <div className="grid grid-cols-3 gap-4">
                                        <Field
                                            type="toggle-button"
                                            name="user.video"
                                            label="Video"
                                            icon={<VideoCameraIcon />}
                                        />
                                        <Field
                                            type="toggle-button"
                                            name="user.telephone"
                                            label="Telephone"
                                            icon={<PhoneOutgoingIcon />}
                                        />
                                        <Field
                                            type="toggle-button"
                                            name="user.inperson"
                                            label="InPerson"
                                            icon={<OfficeBuildingIcon />}
                                        />
                                    </div>
                                </div>
                            </>
                        ) : null}
                    </div>
                </Form.Row>
            </Form.Layout>
        </Page>
    );
});

const Appointments = (): JSX.Element => {
    return <Component />;
};
export default Appointments;
