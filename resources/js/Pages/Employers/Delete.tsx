import React from 'react';
import Controller, { ControllerProperties } from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Locations\\Delete',
    parameters: ['userId'],
};

const Delete = Controller(Properties, ({ dispatch, dispatching }: ControllerProperties): JSX.Element => {
    return (
        <div>
            <button onClick={dispatch('true')}>{dispatching}</button>
        </div>
    );
});

export default Delete;
