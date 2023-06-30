import Controller, { ControllerProperties } from '../../Providers/Controller';
import React, { SyntheticEvent } from 'react';

import Button from '../../Components/Button';
import Field from '../../Components/Form/Field';
import Modal from '../../Components/Modal';
import { UserIcon } from '@heroicons/react/outline';
import { useNavigate } from 'react-router-dom';

const Properties = {
    controller: 'App\\Http\\Controllers\\Tenants\\Create',
};

const Create = Controller(Properties, (props: ControllerProperties): JSX.Element => {
    const { dispatch, dispatching } = props;
    const navigate = useNavigate();
    const onSubmit = (e: SyntheticEvent): void => {
        dispatch('save');
        e.preventDefault();
    };
    return (
        <Modal.Window>
            <Modal.Header title="Tenant" description="Create a new tenant" icon={<UserIcon />} />
            <form {...{ onSubmit }} className="w-96">
                <div className="bg-gray-100 border-t border-b border-gray-200 space-y-4 p-8">
                    <div className="flex space-x-4">
                        <Field type="text" name="tenant.customer.first_name" label="First name" />
                        <Field type="text" name="tenant.customer.last_name" label="Last name" />
                    </div>
                    <Field type="text" name="tenant.customer.email" label="Email" />
                    <Field type="phone" name="tenant.customer.phone" label="Phone" />
                    <Field type="address" name="tenant.customer.address" label="Address" />
                    <div className="py-2 text-xs">Tenant</div>
                    <Field type="text" name="tenant.domain" label="Domain" />
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

export default Create;
