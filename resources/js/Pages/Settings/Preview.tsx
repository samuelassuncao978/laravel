import React from 'react';
import Render from '../../Components/Editor/Render';

import Page from '../../Components/Page';

import Controller from '../../Providers/Controller';
const Properties = {
    controller: 'App\\Http\\Controllers\\Articles\\Article',
};
const Component = Controller(Properties, (): JSX.Element => {
    return (
        <Page>
            <Render name="user.data" />
        </Page>
    );
});

const Preview = (): JSX.Element => {
    return <Component />;
};
export default Preview;
