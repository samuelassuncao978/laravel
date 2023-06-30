import React, { SyntheticEvent, useContext } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import Button from '../../Components/Button';
import Modal from '../../Components/Modal';
import { TrashIcon } from '@heroicons/react/outline';

import Controller, { ControllerProperties } from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Notes\\Delete',
};
const Component = Controller(Properties, (props: ControllerProperties): JSX.Element => {
    const { state, dispatch, dispatching }: any = props;
    const { noteId } = useParams<{ noteId: string }>();
    const navigate = useNavigate();
    const onSubmit = (e: SyntheticEvent): void => {
        dispatch('save');
        e.preventDefault();
    };

    return (
        <Modal.Window>
            <div className="p-5 w-96">
                <div className="flex items-center justify-center pb-5">
                    <div className="p-4 bg-red-50 text-red-600 rounded-full inline-flex">
                        <TrashIcon className="h-7 w-7" />
                    </div>
                </div>
                <div className="text-gray-600 text-center text-xl font-medium">Are you sure?</div>

                <div className="pt-10 flex space-x-4">
                    <Button variant="primary" to={-1}>Cancel</Button>
                    <Button variant="destructive" disabled={dispatching('save')} onClick={(): void => dispatch('save')}>
                        {dispatching('save') ? 'Deleting...' : 'Delete'}
                    </Button>
                </div>
            </div>
        </Modal.Window>
    );
});

const Delete = (): JSX.Element => {
    const { userId } = useParams();

    // @ts-ignore
    return <Component userId={userId} />;
};
export default Delete;
