import { Button, Field, Modal } from '../../Components';
import Controller, { ControllerProperties } from '../../Providers/Controller';
import React, { SyntheticEvent } from 'react';

import { OfficeBuildingIcon } from '@heroicons/react/outline';
import { XIcon } from '@heroicons/react/solid';
import Link from '../../Components/Link';
import { useNavigate } from 'react-router-dom';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\ModalSteps',
};

const DoneStep = Controller(Properties, ({ dispatch, dispatching }: ControllerProperties): JSX.Element => {
    const navigate = useNavigate();
    const onSubmit = (e: SyntheticEvent): void => {
        dispatch('save');
        e.preventDefault();
    };

    return (
        <Modal.Window>
            <div className="px-5 py-10 w-96">
                <div className="flex items-center justify-center pb-2">
                    <div className="p-4 inline-flex">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="40" cy="40" r="40" fill="#E6EEFD" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M54.6544 28.8461C55.3378 29.5295 55.3378 30.6375 54.6544 31.3209L35.9878 49.9876C35.3043 50.671 34.1963 50.671 33.5129 49.9876L24.1796 40.6543C23.4961 39.9708 23.4961 38.8628 24.1796 38.1794C24.863 37.496 25.971 37.496 26.6544 38.1794L34.7503 46.2753L52.1796 28.8461C52.863 28.1626 53.971 28.1626 54.6544 28.8461Z" fill="#4B84EE" />
                        </svg>
                    </div>
                </div>
                <div className="text-gray-700 text-center font-medium text-xl pb-3">All Done</div>
                <div className="text-gray-400 text-center text-sm">You are ready to take appointments.</div>

                <div className="flex flex-row-reverse p-4 items-end gap-6 bg-white rounded-b w-48 m-auto">
                    <Button variant="primary" to="/">
                        Get Started
                    </Button>
                </div>
            </div>
        </Modal.Window>
    );
});

export default DoneStep;