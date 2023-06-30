import { DocumentAddIcon } from '@heroicons/react/outline';
import React, { SyntheticEvent, useContext, useState } from 'react';
import { Context, Controller } from '@sihq/ui-components';
import { useNavigate } from 'react-router-dom';
import Button from '../../Components/Button';
import Field from '../../Components/Form/Field';
import Modal from '../../Components/Modal';
import Moment from 'react-moment';
import moment from 'moment';
import InitialConsultation from './InitialConsultation';
import Research from './Research';
import Blank from './Blank';
import ProgressNote from './ProgressNote';
import Spacer from '../../Components/Sidebar/Spacer';

const Properties = {
    controller: 'App\\Http\\Controllers\\Notes\\Create',
};

const Component = Controller(Properties, (): JSX.Element => {
    const { dispatch, dispatching, state } = useContext(Context);
    const navigate = useNavigate();

    const clients = state?.clients ?? [];
    console.log(clients);

    const [step, setStep] = useState(0)
    const [test, setTest] = useState("")
    const [open, setOpen] = useState(false);
    const [modalType, setModalType] = useState("")

    const nextStep = () => {
        setStep((step) => step + 1)
    }

    const openModal = (type: string) => {
        setStep(2)
        setModalType(type)

    }

    return (
        <Modal.Window>
            <Modal.Header title="New note" icon={<DocumentAddIcon />} />
            <div className="bg-gray-100 border-t border-b border-gray-200 space-y-4 p-8 max-h-[45rem] overflow-auto">

                <ul className="grid mb-2 max-w-md mx-auto">
                    {step == 0 && (
                        <>
                            <li className="mb-2">
                                <Field
                                    type="select"
                                    name="note.client"
                                    label="Client:"
                                    options={(clients ?? []).map((client: any) => ({
                                        text: client.first_name + '  ' + client.last_name,
                                        value: client.id,
                                    }))}
                                />
                            </li>
                            <li className="mb-2">
                                <Field
                                    type="select"
                                    name="note.appointment"
                                    label="Appointment:"
                                    options={(clients ?? []).map((client: any) => ({
                                        text: moment(client.created_at).format("MM/DD/YYYY"),
                                        value: client.id,
                                    }))}
                                />
                            </li>
                        </>
                    )}
                    {step == 1 && (
                        <>
                            <li className="mb-2" onClick={(): void => openModal("consultation")}>
                                <input className="sr-only peer" type="radio" value="1" name="template" id="consultation" />
                                <label className="flex p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-blue-500 peer-checked:ring-2 peer-checked:border-transparent" htmlFor="consultation">Initial Consultation note</label>
                            </li>
                            <li className="mb-2" onClick={(): void => openModal("progress")}>
                                <input className="sr-only peer" type="radio" value="2" name="template" id="progress" />
                                <label className="flex p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-blue-500 peer-checked:ring-2 peer-checked:border-transparent" htmlFor="progress">Progress Note</label>
                            </li>
                            <li className="mb-2" onClick={(): void => openModal("research")}>
                                <input className="sr-only peer" type="radio" value="3" name="template" id="research" />
                                <label className="flex p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-blue-500 peer-checked:ring-2 peer-checked:border-transparent" htmlFor="research">Research</label>
                            </li>

                            <li className="mt-2" onClick={(): void => openModal("blank")}>
                                <input className="sr-only peer" type="radio" value="4" name="template" id="blank" />
                                <label className="flex p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-blue-500 peer-checked:ring-2 peer-checked:border-transparent" htmlFor="blank">Blank</label>
                            </li>
                        </>
                    )}
                    {modalType == "consultation" && (
                        <InitialConsultation />
                    )}
                    {modalType == "progress" && (
                        <ProgressNote />
                    )}
                    {modalType == "research" && (
                        <Research />
                    )}
                    {modalType == "blank" && (
                        <Blank />
                    )}
                </ul>
            </div>

            <div className=" p-4 flex space-x-2">
                <span className="flex-1"></span>

                <div>
                    <Button onClick={(): void => navigate(-1)} variant="destructive">Cancel</Button>
                </div>
                {step == 0 && (
                    <div>
                        <button className="bg-blue-500 py-2 w-32 text-white rounded" onClick={(): void => nextStep()}>
                            Next
                        </button>
                    </div>
                )}
                {step == 2 && (
                    <div>
                        <Button variant="primary" type="submit" disabled={dispatching('save')}>
                            {dispatching('save') ? 'creating...' : 'Create'}
                        </Button>
                    </div>
                )}
            </div>
        </Modal.Window>
    );
});

const NoteCreate = (): JSX.Element => {
    return <Component />;
};
export default NoteCreate;
