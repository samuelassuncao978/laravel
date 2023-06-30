import React, { SyntheticEvent } from 'react';
import { useNavigate } from 'react-router-dom';
import Button from '../../Components/Button';
import Field from '../../Components/Form/Field';
import Modal from '../../Components/Modal/Modal';
import Controller, { ControllerProperties } from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Users',
};

const Component = Controller(Properties, (props: ControllerProperties): JSX.Element => {
    const { dispatch, dispatching } = props;
    const navigate = useNavigate();
    const onSubmit = (e: SyntheticEvent): void => {
        dispatch('save');
        e.preventDefault();
    };
    return (
        <Modal>
            <form {...{ onSubmit }} className="w-96">
                <div className="rounded-md flex p-10 pb-5 flex-col">
                    <div className="text-lg font-bold">Voucher</div>
                    <div className="text-xs text-gray-400 flex items-center h-6">
                        <div className="flex space-x-4">
                            <div>Create a new voucher</div>
                        </div>
                        <div className="ml-auto"></div>
                    </div>
                </div>

                <div className="bg-gray-100 border-t border-b border-gray-200 space-y-4 p-8">
                    <div className="flex space-x-4">
                        <Field type="text" name="user.name" label="First name" />
                        <Field type="text" name="user.name" label="Last name" />
                    </div>
                    <Field type="text" name="user.email" label="Email" />
                    <Field type="phone" name="user.phone" label="Phone" />
                    <Field type="address" name="user.address" label="Address" />
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
        </Modal>
    );
});

const Create = (): JSX.Element => {
    return <Component />;
};
export default Create;
