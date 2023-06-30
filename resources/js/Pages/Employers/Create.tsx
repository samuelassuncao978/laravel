import { Button, Field, Modal } from '../../Components';
import Controller, { ControllerProperties } from '../../Providers/Controller';
import React, { SyntheticEvent } from 'react';

import { OfficeBuildingIcon } from '@heroicons/react/outline';
import { XIcon } from '@heroicons/react/solid';
import { useNavigate } from 'react-router-dom';

const Properties = {
    controller: 'App\\Http\\Controllers\\Employers\\Create',
};

const Create = Controller(Properties, ({ dispatch, dispatching }: ControllerProperties): JSX.Element => {
    const navigate = useNavigate();
    const onSubmit = (e: SyntheticEvent): void => {
        dispatch('save');
        e.preventDefault();
    };
    return (
        <Modal.Window>
            <Modal.Header title="Employer" description="Create a new employer" icon={<OfficeBuildingIcon />} />
            <form {...{ onSubmit }} className="w-96">
                <button
                    type="button"
                    className="absolute top-3 right-3 text-gray-500   z-30 rounded-full bg-gray-200 p-1 hover:bg-gray-300 focus:bg-gray-800 focus:text-white focus:outline-none"
                >
                    <XIcon className="h-4 w-4" />
                </button>

                <div className="bg-gray-50 border-t border-b border-gray-200 space-y-4 p-8">
                    <Field type="text" name="employer.name" label="Name:" />
                </div>

                <div className=" p-4 flex space-x-2">
                    <span className="flex-1"></span>

                    <div>
                        <Button onClick={(): void => navigate(-1)}>Cancel</Button>
                    </div>
                    <div>
                        <Button size="md" variant="primary" type="submit" disabled={dispatching('save')}>
                            {dispatching('save') ? 'creating...' : 'Create'}
                        </Button>
                    </div>
                </div>
            </form>
        </Modal.Window>
    );
});

export default Create;
