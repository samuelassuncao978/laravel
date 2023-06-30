import { Context, Controller } from '@sihq/ui-components';
import React, { SyntheticEvent, useContext, useEffect, useState } from 'react';

import Button from '../../Components/Button';
import Field from '../../Components/Form/Field';
import Modal from '../../Components/Modal';
import Link from '../../Components/Link';
import UserModalSteps from './UserModalSteps';
import DocumentStep from './DocumentStep';
import BillingStep from './BillingStep';
import AvailabilityStep from './AvailabilityStep';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Workflow',
};

const UserWorkflow = Controller(Properties, (): JSX.Element => {
    const queryParams = new URLSearchParams(window.location.search)
    const stepProps = queryParams.get("step")

    useEffect(() => {
        if (stepProps) {
            setStep(Number(stepProps))
        }
    }, [])

    const { dispatch, dispatching } = useContext(Context);
    const onSubmit = (e: SyntheticEvent): void => {
        dispatch('submit');
        e.preventDefault();
    };
    const [step, setStep] = useState(0)

    const nextStep = () => {
        setStep((step) => step + 1)
    }

    return (
        <Modal.Window>
            <form {...{ onSubmit }} className="w-auto bg-black bg-opacity-25 w-[70vw]">
                {step == 0 && (
                    <UserModalSteps />
                )}
                {step == 1 && (
                    <DocumentStep />
                )}

                {step == 2 && (
                    <BillingStep />
                )}

                {step == 3 && (
                    <AvailabilityStep />
                )}

                {step == 3 ? (
                    <div className="flex flex-row-reverse p-4 items-end gap-6 bg-white rounded-b">
                        <div className="w-32">
                            <Button variant="primary">
                                <Link variant="standard" to="/done-step">Finish</Link>
                            </Button>
                        </div>
                    </div>
                ) : (
                    <div className="flex flex-row-reverse p-4 items-end gap-6 bg-white rounded-b">
                        <button className="bg-blue-500 py-2 w-32 text-white rounded" onClick={(): void => nextStep()}>
                            Save & next
                        </button>
                        <button className="text-blue-500 bg-blue-100 py-2 w-36 rounded" onClick={(): void => nextStep()}>
                            Skip that step
                        </button>
                    </div>
                )}
            </form>
        </Modal.Window>
    );
});

export default UserWorkflow;