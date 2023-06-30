import React from 'react';
import Controller from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Users',
};

const Component = Controller(Properties, (): JSX.Element => {
    return (
        <>
            <div>Client Files</div>
        </>
    );
});

const ClientFiles = (): JSX.Element => {
    return <Component />;
};
export default ClientFiles;
