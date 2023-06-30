import React from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import Button from '../../Components/Button';
import Modal from '../../Components/Modal/Modal';

import Controller, { ControllerProperties } from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Delete',
};
const Component = Controller(Properties, (props: ControllerProperties): JSX.Element => {
    const { state, dispatch, dispatching }: any = props;
    const { userId } = useParams<{ userId: string }>();
    const navigate = useNavigate();
    return (
        <Modal>
            <div className="text-xl">Delete</div>
            are you sure you want to delete {state?.user?.email}
            <div className="p-3 flex space-x-4">
                <button onClick={(): void => navigate(`/users/${userId}`)}>cancel</button>
                <Button variant="destructive" disabled={dispatching('save')} onClick={(): void => dispatch('save')}>
                    {dispatching('save') ? 'deleting...' : 'delete'}
                </Button>
            </div>
        </Modal>
    );
});

const Delete = (): JSX.Element => {
    const { userId } = useParams();

    // @ts-ignore
    return <Component userId={userId} />;
};
export default Delete;
