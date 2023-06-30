import { Context, Controller, Field } from '@sihq/ui-components';
import { Outlet, useLocation, useParams } from 'react-router-dom';
import React, { useContext, useEffect } from 'react';

import { Link } from 'react-router-dom';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Edit',
    parameters: ['userId'],
};

const Edit = Controller(Properties, (): JSX.Element => {
    const { dispatch, dispatching } = useContext(Context);
    const { userId } = useParams();

    const location = useLocation();
    useEffect(() => {
        dispatch('onMount');
    }, [location]);

    return (
        <>
            <div>
                <Link to={`/users/${userId}/delete`}>Delete</Link>
                <div className="text-xl">Edit</div>
                <Field type="text" name="user.first_name" />
                <Field type="text" name="user.last_name" />
                <Field type="text" name="user.email" />
                <button disabled={dispatching('save')} onClick={(): void => dispatch('save')}>
                    {dispatching('save') ? 'saving...' : 'save changes'}
                </button>

                <textarea id="editor" name="editor" hidden></textarea>

                <Outlet />
            </div>
        </>
    );
});

export default Edit;
