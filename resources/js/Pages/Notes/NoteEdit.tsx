import React, { SyntheticEvent, useContext } from 'react';
import { DocumentAddIcon } from '@heroicons/react/outline';
import Controller, { ControllerProperties } from '../../Providers/Controller';
import Actionbar from '../../Components/Actionbar';
import Button from '../../Components/Button';
import { Outlet, useLocation, useParams } from 'react-router-dom';
import { useNavigate } from 'react-router-dom';
import ProgressNote from './ProgressNote';
import Form from '../../Components/Form';
import InitialConsultation from './InitialConsultation';
import Research from './Research';
import Blank from './Blank';
import Modal from '../../Components/Modal';
import Field from '../../Components/Form/Field';

const Properties = {
    controller: 'App\\Http\\Controllers\\Clients\\Edit',
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
            <Modal.Header title="Edit Note" icon={<DocumentAddIcon />} />
            <div className="bg-gray-100 border-t border-b border-gray-200 space-y-4 p-8 max-h-[45rem] overflow-auto">
                <Actionbar.Item>
                    <Field
                        type="toggle"
                        name="auto_save"
                        label="Autosave"
                    />
                </Actionbar.Item>
                <Form.Layout>
                    <ProgressNote
                        edit="true"
                        note=""
                    />
                </Form.Layout>
                <div className="pt-10 flex space-x-4">
                    <Button variant="primary" to={-1}>Cancel</Button>
                    <Button variant="destructive" disabled={dispatching('save')} onClick={(): void => dispatch('save')}>
                        {dispatching('save') ? 'saving...' : 'Save'}
                    </Button>
                </div>
            </div>
        </Modal.Window>
    );
});

const NoteEdit = (): JSX.Element => {
    return <Component />;
};
export default NoteEdit;
