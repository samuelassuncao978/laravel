import Controller, { ControllerProperties } from '../../Providers/Controller';

import Button from '../../Components/Button';
import Modal from '../../Components/Modal';
import React from 'react';
import { ShieldExclamationIcon } from '@heroicons/react/outline';

const Properties = {
    controller: 'App\\Http\\Controllers\\Tenants\\EnterMaintenance',
    parameters: ['tenantId'],
};

const EnterMaintenance = Controller(Properties, (props: ControllerProperties): JSX.Element => {
    const { dispatch, dispatching } = props;

    return (
        <Modal.Window>
            <div className="p-5 w-96">
                <div className="flex items-center justify-center pb-5">
                    <div className="p-4 bg-yellow-50 text-yellow-600 rounded-full inline-flex">
                        <ShieldExclamationIcon className="h-7 w-7" />
                    </div>
                </div>
                <div className="text-gray-600 text-center text-sm">Enter Maintenance</div>

                <div className="pt-10 flex space-x-4">
                    <Button to={-1}>Cancel</Button>
                    <Button variant="warning" disabled={dispatching('save')} onClick={(): void => dispatch('save')}>
                        {dispatching('save') ? 'entering maintenance...' : 'Enter maintenance'}
                    </Button>
                </div>
            </div>
        </Modal.Window>
    );
});

export default EnterMaintenance;
