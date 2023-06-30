import { TrashIcon } from '@heroicons/react/outline';
import React from 'react';

import Button from '../../Components/Button';
import Modal from '../../Components/Modal';

import Controller, { ControllerProperties } from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Locations\\Delete',
    parameters: ['locationId'],
};

const Delete = Controller(Properties, (props: ControllerProperties): JSX.Element => {
    const { dispatch, dispatching } = props;

    return (
        <Modal.Window>
            <div className="p-5 w-96">
                <div className="flex items-center justify-center pb-5">
                    <div className="p-4 bg-red-50 text-red-600 rounded-full inline-flex">
                        <TrashIcon className="h-7 w-7" />
                    </div>
                </div>
                <div className="text-gray-600 text-center text-sm">Are you sure you want to delete this location?</div>
                <div className="pt-10 flex space-x-4">
                    <Button to={-1}>Cancel</Button>
                    <Button variant="destructive" disabled={dispatching('save')} onClick={(): void => dispatch('save')}>
                        {dispatching('save') ? 'deleting...' : 'Delete'}
                    </Button>
                </div>
            </div>
        </Modal.Window>
    );
});

export default Delete;
