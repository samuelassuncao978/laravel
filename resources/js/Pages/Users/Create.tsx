import { UserIcon } from '@heroicons/react/outline';
import React, { SyntheticEvent } from 'react';
import { useNavigate } from 'react-router-dom';
import Button from '../../Components/Button';
import Field from '../../Components/Form/Field';
import Modal from '../../Components/Modal';

import Controller, { ControllerProperties } from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Create',
};

const Component = Controller(Properties, (props: ControllerProperties): JSX.Element => {
    const { dispatch, dispatching } = props;
    const navigate = useNavigate();
    const onSubmit = (e: SyntheticEvent): void => {
        dispatch('save');
        e.preventDefault();
    };
    return (
        <Modal.Window>
            <Modal.Header title="User" description="Create a new user" icon={<UserIcon />} />
            <form {...{ onSubmit }} className="w-96">
                <div className="bg-gray-100 border-t border-b border-gray-200 space-y-4 p-8">
                    <div className="flex space-x-4">
                        <Field type="text" name="user.first_name" label="First name" />
                        <Field type="text" name="user.last_name" label="Last name" />
                    </div>
                    <Field type="text" name="user.email" label="Email" />
                    <Field type="phone" name="user.phone" label="Phone" />
                    <Field type="password" name="user.password" label="Password:" />
                </div>

                <div className=" p-4 flex space-x-2">
                    <span className="flex-1"></span>

                    <div>
                        <Button onClick={(): void => navigate(-1)}>Cancel</Button>
                    </div>
                    <div>
                        <Button variant="primary" type="submit" disabled={dispatching('save')}>
                            {dispatching('save') ? 'creating...' : 'Create'}
                        </Button>
                    </div>
                </div>
            </form>
        </Modal.Window>
    );
});

const Create = (): JSX.Element => {
    return <Component />;
};
export default Create;
