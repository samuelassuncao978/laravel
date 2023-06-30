import Controller, { ControllerProperties } from '../../Providers/Controller';
import React, { SyntheticEvent } from 'react';

import Actionbar from '../../Components/Actionbar';
import Button from '../../Components/Button';
import { DocumentIcon } from '@heroicons/react/outline';
import Field from '../../Components/Form/Field';
import Modal from '../../Components/Modal';
import { SaveIcon } from '@heroicons/react/solid';

const Properties = {
    controller: 'App\\Http\\Controllers\\Resources\\Resource',
    parameters: ['resourceId'],
};
const Create = Controller(Properties, (props: ControllerProperties): JSX.Element => {
    const { dispatch, dispatching } = props;

    const onSubmit = (e: SyntheticEvent): void => {
        dispatch('save');
        e.preventDefault();
    };
    return (
        <form onSubmit={onSubmit}>
            <div className="fixed inset-0 bg-black bg-opacity-50 z-50">
                <div className="bg-white absolute flex flex-col top-20 rounded-t-3xl shadow-2xl bottom-0 left-1/2 transform -translate-x-1/2 w-5/6 z-20">
                    <div className="border-b-2 border-gray-300 mx-10 mb-5">
                        <Modal.Header title="Resource" icon={<DocumentIcon />} />
                    </div>
                    <div className="px-10">
                        <div className="flex space-x-4 pb-4">
                            <Field type="text" name="resource.name" label="Name:" />
                            <Field type="text" name="resource.category" label="Category:" />
                        </div>
                    </div>
                    <div className="flex overflow-hidden flex-1 px-10">
                        <Field type="editor" name="resource.content" label="Resource page:" />
                    </div>
                    <div className="px-8">
                        <Actionbar.Bar>
                            <Actionbar.Item>
                                <Button size="sm" to={-1}>
                                    Cancel
                                </Button>
                            </Actionbar.Item>
                            <Actionbar.Item right>
                                <Button size="sm" variant="primary" icon={<SaveIcon />} type="submit">
                                    {dispatching('save') ? 'saving...' : 'Save changes'}
                                </Button>
                            </Actionbar.Item>
                        </Actionbar.Bar>
                    </div>
                </div>
            </div>
        </form>
    );
});

export default Create;
