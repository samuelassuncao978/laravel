import React, { useContext, useEffect } from 'react';
import { Context, Controller, Field } from '@sihq/ui-components';
import { Outlet, useLocation, useParams } from 'react-router-dom';
import Actionbar from '../../Components/Actionbar';
import Button from '../../Components/Button';
import Form from '../../Components/Form';
import Link from '../../Components/Link';
import Page from '../../Components/Page';
import Avatar from '../../Components/Avatar';
import ProgressNote from './ProgressNote';

const Properties = {
    controller: 'App\\Http\\Controllers\\Notes\\Edit',
};

const Note = Controller(Properties, (): JSX.Element => {
    const { dispatch, dispatching, state } = useContext(Context);
    const { noteId } = useParams();
    const location = useLocation();

    return (
        <Page>
            <div className="flex xl:flex-row flex-col h-10 items-center font-medium text-gray-900 dark:text-white pb-2 mb-2 w-full">
                <span className="flex flex-col items-center mr-6 w-14 h-14 flex-shrink-0">
                    <Avatar name={`${state?.client?.first_name} ${state?.client?.last_name}`} />
                </span>
                <div className="truncate text-left">
                    <span className="block text-4xl font-normal text-left">{`${state?.client?.first_name} ${state?.client?.last_name}`}</span>
                </div>
            </div>

            <Actionbar.Bar>
                <Actionbar.Item right>
                    <button className="bg-blue-500 py-2 w-32 text-white rounded">
                        <Link variant="standard" to={`/notes/${noteId}/edit`}>Edit Note</Link>
                    </button>
                </Actionbar.Item>
                <Actionbar.Item>
                    <Button size="sm" variant="destructive">
                        <Link variant="standard" to={`/notes/${noteId}/delete`}>Delete</Link>
                    </Button>
                </Actionbar.Item>
            </Actionbar.Bar>

            <Form.Layout>
                <ProgressNote
                    edit="false"
                    note=""
                />
            </Form.Layout>
        </Page>
    );
});

export default Note;
