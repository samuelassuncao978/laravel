import { Button, Field, Modal } from '../../Components';
import React, { SyntheticEvent } from 'react';
import { XIcon } from '@heroicons/react/solid';
import Link from '../../Components/Link';

export interface CardProps {

}

const BillingStep = (props: CardProps): JSX.Element => {

    return (
        <>
            <div className="p-2 flex flex-col md:flex-row bg-white mb-4 rounded">
                <div className="w-1/4 flex flex-row items-center gap-2 py-4 px-6 pr-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="24" fill="#E6EEFD" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M32.3739 17.6264C32.7644 18.0169 32.7644 18.6501 32.3739 19.0406L21.7072 29.7073C21.3167 30.0978 20.6835 30.0978 20.293 29.7073L14.9596 24.3739C14.5691 23.9834 14.5691 23.3502 14.9596 22.9597C15.3502 22.5692 15.9833 22.5692 16.3739 22.9597L21.0001 27.5859L30.9596 17.6264C31.3502 17.2359 31.9833 17.2359 32.3739 17.6264Z" fill="#4B84EE" />
                    </svg>

                    <div>
                        <p className="text-xs text-black text-left">Personal Info</p>
                        <p className="text-xs text-grey text-left">Set up your info</p>
                    </div>
                </div>
                <div className="w-1/4 flex flex-row items-center gap-2 py-4 px-6 pr-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="24" fill="#E6EEFD" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M32.3739 17.6264C32.7644 18.0169 32.7644 18.6501 32.3739 19.0406L21.7072 29.7073C21.3167 30.0978 20.6835 30.0978 20.293 29.7073L14.9596 24.3739C14.5691 23.9834 14.5691 23.3502 14.9596 22.9597C15.3502 22.5692 15.9833 22.5692 16.3739 22.9597L21.0001 27.5859L30.9596 17.6264C31.3502 17.2359 31.9833 17.2359 32.3739 17.6264Z" fill="#4B84EE" />
                    </svg>

                    <div>
                        <p className="text-xs text-black text-left">Qualification documents</p>
                        <p className="text-xs text-grey text-left">Upload documents</p>
                    </div>
                </div>
                <div className="w-1/4 flex flex-row items-center gap-2 py-4 px-6 pr-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="24" fill="#4B84EE" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8079 15.8137C13.9292 16.6924 13.9292 18.1066 13.9292 20.9351V27.0649C13.9292 29.8934 13.9292 31.3076 14.8079 32.1863C15.6866 33.0649 17.1008 33.0649 19.9292 33.0649H30.0446C31.0016 33.0649 31.48 33.0649 31.8718 32.9568C32.8894 32.6759 33.6844 31.8808 33.9653 30.8633C34.0735 30.4714 34.0735 29.993 34.0735 29.0361H28.0302C26.3614 29.0361 25.0086 27.6832 25.0086 26.0144C25.0086 24.3456 26.3614 22.9928 28.0302 22.9928H34.0735V20.9351C34.0735 18.1066 34.0735 16.6924 33.1948 15.8137C32.3162 14.9351 30.9019 14.9351 28.0735 14.9351H19.9292C17.1008 14.9351 15.6866 14.9351 14.8079 15.8137ZM18.9657 18.9712C18.4134 18.9712 17.9657 19.4189 17.9657 19.9712C17.9657 20.5235 18.4134 20.9712 18.9657 20.9712H21.9873C22.5396 20.9712 22.9873 20.5235 22.9873 19.9712C22.9873 19.4189 22.5396 18.9712 21.9873 18.9712H18.9657Z" fill="white" />
                        <path d="M29.036 26.0146H28.0288" stroke="white" stroke-width="2" stroke-linecap="round" />
                    </svg>

                    <div>
                        <p className="text-xs text-black text-left">Billing</p>
                        <p className="text-xs text-grey text-left">Set your billing data</p>
                    </div>
                </div>
                <div className="w-1/4 flex flex-row items-center gap-2 py-4 px-6 pr-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="24" fill="#F2F4F7" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0219 16.5841C21.0219 15.9683 20.5227 15.4692 19.907 15.4692C19.2914 15.4692 18.7922 15.9683 18.7922 16.5841V17.9117H17.8227C16.5914 17.9117 15.593 18.91 15.593 20.1414V30.9683C15.593 32.1998 16.5914 33.198 17.8227 33.198H31.0277C32.259 33.198 33.2573 32.1998 33.2573 30.9683V20.1414C33.2573 18.91 32.259 17.9117 31.0277 17.9117H29.909V16.5841C29.909 15.9683 29.4098 15.4692 28.7942 15.4692C28.1785 15.4692 27.6793 15.9683 27.6793 16.5841V17.9117H21.0219V16.5841ZM20.0535 20.9761C19.4394 20.9761 18.9413 21.4739 18.9413 22.0882C18.9413 22.7024 19.4394 23.2003 20.0535 23.2003H28.7974C29.4115 23.2003 29.909 22.7024 29.909 22.0882C29.909 21.4739 29.4115 20.9761 28.7974 20.9761H20.0535Z" fill="#999EA5" />
                    </svg>
                    <div>
                        <p className="text-xs text-black text-left">Availability</p>
                        <p className="text-xs text-grey text-left">Set your work time</p>
                    </div>
                </div>
            </div>
            <div className="w-full flex flex-row px-6 py-2 border-b bg-white rounded-t">
                <div className="flex items-center gap-6 mb-2 py-2">
                    <div className="font-medium text-gray-600 text-2xl">Billing</div>
                    <div className="px-3 rounded w-32 h-8 flex items-center justify-center bg-green-200 text-green cursor-pointer">
                        Approved
                    </div>
                </div>
                <button
                    type="button"
                    className="absolute top-3 right-3 text-gray-500   z-30 rounded-full bg-gray-200 p-1 hover:bg-gray-300 focus:bg-gray-800 focus:text-white focus:outline-none"
                >
                    <XIcon className="h-4 w-4" />
                </button>
            </div>
            <div className="flex flex-col md:flex-row bg-white border-b">
                <div className="w-full md:w-1/3 flex flex-col border-r pb-6">
                    <div className="font-medium text-gray-600 text-lg py-4 px-6 pr-4 border-b">Bank Information</div>
                    <div className='px-6 pr-4'>
                        <div className="w-full">
                            <Field type="text" name="user.first_name" label="BSB" />
                        </div>
                        <div className="w-full">
                            <Field type="text" name="user.account" label="Account #" />
                        </div>
                        <div className="w-full">
                            <Field type="text" name="user.abn" label="ABN" />
                        </div>
                    </div>
                </div>
                <div className="w-full md:w-1/3 flex flex-col">
                    <div className="font-medium text-gray-600 text-lg py-4 px-6 pr-4 border-b">Proof of Identity</div>
                    <div className='px-6 pr-4'>
                        <div className="mt-3">
                            <Field type="upload" name="id_front" label="Please upload the front your license (ID front)" />
                        </div>
                        <div className="mt-3 mb-4">
                            <Field type="date-picker" name="user.dob" label="Expiry date" placeholder="MM/DD/YYYY" />
                        </div>
                    </div>
                </div>
                <div className="w-full md:w-1/3 flex flex-col">
                    <div className="font-medium text-gray-600 text-lg py-4 px-6 pr-4 border-b">'</div>
                    <div className='px-6 pr-4'>
                        <div className="mt-3">
                            <Field type="upload" name="id_backend" label="Please upload the back your license (ID back)" />
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};
export default BillingStep;