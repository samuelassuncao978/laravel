import React from 'react';

import Button from '../../Components/Button';
import Field from '../../Components/Form/Field';
import Modal from '../../Components/Modal';

import Controller, { ControllerProperties } from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Locations\\Status',
    parameters: ['locationId'],
};

const Status = Controller(Properties, (props: ControllerProperties): JSX.Element => {
    const { dispatch, dispatching } = props;

    return (
        <Modal.Window>
            <div className="p-5 w-96">
                <div className="text-gray-600 text-center text-sm">Change location</div>
                <div>
                    <Field
                        name="location.status"
                        type="select"
                        label="Status:"
                        options={[
                            { text: 'Active', value: 'active' },
                            { text: 'Closed', value: 'closed' },
                        ]}
                    />
                </div>
                <div className="pt-10 flex space-x-4">
                    <Button to={-1}>Cancel</Button>
                    <Button variant="primary" disabled={dispatching('save')} onClick={(): void => dispatch('save')}>
                        {dispatching('save') ? 'changing...' : 'Change'}
                    </Button>
                </div>
            </div>
        </Modal.Window>
    );
});

export default Status;
