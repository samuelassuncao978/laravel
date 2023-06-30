import { QrcodeIcon } from '@heroicons/react/outline';
import React from 'react';

import Button from '../../Components/Button';
import Modal from '../../Components/Modal';
import QRCode from 'qrcode.react';
import Controller from '../../Providers/Controller';

const Properties = {
    controller: 'App\\Http\\Controllers\\Locations\\Delete',
    parameters: ['locationId'],
};

const Share = Controller(Properties, (): JSX.Element => {
    return (
        <Modal.Window>
            <div className="p-5 w-96">
                <div className="flex flex-col flex-grow items-center justify-center">
                    <div className="rounded-lg bg-gray-50 p-5 border border-gray-200 flex items-center justify-center">
                        <QRCode value="https://foremind.sihq.io/counsellor/1123023434?voucher=12343" />
                    </div>
                    <div className="text-xs text-gray-500 max-w-xs mt-1 pt-2 mx-auto text-center">
                        <button type="button" className="text-blue-500 hover:underline">
                            Download
                        </button>
                        <span>&nbsp;qr code</span>
                    </div>
                    <div className="flex items-center text-xs text-gray-300 my-8 w-full">
                        <div className="flex-grow h-1 bg-gray-200 rounded-full"></div>
                        <div className="px-2">OR</div>
                        <div className="flex-grow h-1 bg-gray-200 rounded-full"></div>
                    </div>
                    <div className="text-xs text-gray-500 max-w-xs mb-2 pt-2 mx-auto text-center">Share link</div>
                    <div className="border border-gray-300 bg-gray-50 select-all shadow-inner rounded p-2 text-gray-600 text-xs flex items-center w-full">
                        <span className="truncate">https://foremind.sihq.io/counsellor/1123023434?voucher=12343</span>
                    </div>
                </div>

                <div className="pt-10 flex space-x-4">
                    <Button to={-1}>Cancel</Button>
                </div>
            </div>
        </Modal.Window>
    );
});

export default Share;
