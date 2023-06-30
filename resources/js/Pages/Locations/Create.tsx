import { OfficeBuildingIcon } from '@heroicons/react/outline';
import { XIcon } from '@heroicons/react/solid';
import React, { SyntheticEvent } from 'react';

import Button from '../../Components/Button';
import Field from '../../Components/Form/Field';
import Modal from '../../Components/Modal';
import Controller, { ControllerProperties } from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Locations\\Create',
    parameters: ['employerId'],
};

const Create = Controller(Properties, ({ dispatch, dispatching }: ControllerProperties): JSX.Element => {
    const onSubmit = (e: SyntheticEvent): void => {
        dispatch('save');
        e.preventDefault();
    };
    return (
        <Modal.Window>
            <Modal.Header title="Location" description="Create a new location" icon={<OfficeBuildingIcon />} />
            <form {...{ onSubmit }} className="w-96">
                <div className="bg-gray-50 border-t border-b border-gray-200 space-y-4 p-8">
                    <Field type="text" name="location.name" label="Name:" />
                </div>

                <div className=" p-4 flex space-x-2">
                    <span className="flex-1"></span>
                    <div>
                        <Button to={-1}>Cancel</Button>
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
