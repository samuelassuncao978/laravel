import React, { SyntheticEvent } from 'react';
import Field from '../../Components/Form/Field';
import { XIcon } from '@heroicons/react/solid';

export interface CardProps {

}

const DocumentStep = (props: CardProps): JSX.Element => {

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
                        <circle cx="24" cy="24" r="24" fill="#4B84EE" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.0056 13.9404V18.9822L24.0056 19.0366C24.0055 19.4607 24.0054 19.8728 24.0511 20.2127C24.1027 20.5959 24.2282 21.0332 24.5914 21.3964C24.9546 21.7596 25.3919 21.8852 25.7751 21.9367C26.115 21.9824 26.5271 21.9823 26.9512 21.9822L27.0056 21.9822H32.0478V28.0241C32.0478 30.8694 32.0478 32.2921 31.1638 33.176C30.2799 34.06 28.8572 34.06 26.0119 34.06H21.988C19.1427 34.06 17.72 34.06 16.8361 33.176C15.9521 32.2921 15.9521 30.8694 15.9521 28.0241V19.9763C15.9521 17.131 15.9521 15.7083 16.8361 14.8244C17.72 13.9404 19.1427 13.9404 21.988 13.9404H24.0056ZM26.0056 13.9449V18.9822C26.0056 19.4819 26.0077 19.756 26.0333 19.9462L26.0343 19.9535L26.0416 19.9545C26.2318 19.9801 26.5059 19.9822 27.0056 19.9822H32.0433C32.0332 19.5648 32.0005 19.2894 31.8946 19.0337C31.7415 18.664 31.4507 18.3733 30.8692 17.7918L30.8692 17.7917L28.1965 15.119C27.6149 14.5375 27.3242 14.2467 26.9545 14.0936C26.6988 13.9877 26.4232 13.955 26.0056 13.9449Z" fill="white" />
                    </svg>

                    <div>
                        <p className="text-xs text-black text-left">Qualification documents</p>
                        <p className="text-xs text-grey text-left">Upload documents</p>
                    </div>
                </div>
                <div className="w-1/4 flex flex-row items-center gap-2 py-4 px-6 pr-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="24" fill="#F2F4F7" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8076 15.8137C13.929 16.6924 13.929 18.1066 13.929 20.9351V27.0649C13.929 29.8934 13.929 31.3076 14.8076 32.1863C15.6863 33.0649 17.1005 33.0649 19.929 33.0649H30.0444C31.0013 33.0649 31.4798 33.0649 31.8716 32.9568C32.8891 32.6759 33.6842 31.8808 33.9651 30.8633C34.0733 30.4714 34.0733 29.993 34.0733 29.0361H28.03C26.3612 29.0361 25.0083 27.6832 25.0083 26.0144C25.0083 24.3456 26.3612 22.9928 28.03 22.9928H34.0733V20.9351C34.0733 18.1066 34.0733 16.6924 33.1946 15.8137C32.3159 14.9351 30.9017 14.9351 28.0733 14.9351H19.929C17.1005 14.9351 15.6863 14.9351 14.8076 15.8137ZM18.9654 18.9712C18.4131 18.9712 17.9654 19.4189 17.9654 19.9712C17.9654 20.5235 18.4131 20.9712 18.9654 20.9712H21.9871C22.5393 20.9712 22.9871 20.5235 22.9871 19.9712C22.9871 19.4189 22.5393 18.9712 21.9871 18.9712H18.9654Z" fill="#999EA5" />
                        <path d="M29.0358 26.0146H28.0286" stroke="#999EA5" stroke-width="2" stroke-linecap="round" />
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
                    <div className="font-medium text-gray-600 text-2xl">Qualification documents</div>
                    <div className="px-3 border rounded w-32 h-8 flex items-center justify-center bg-gray-200 text-black cursor-pointer">
                        Not complete
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
                    <div className="font-medium text-gray-600 text-lg py-4 px-6 pr-4 border-b">Membership</div>
                    <div className='px-6 pr-4'>
                        <div className="mt-3">
                            <Field type="upload" name="ccaa" label="Please upload your ACA or CCAA certificate" />
                        </div>
                        <div className="mt-3">
                            <Field type="date-picker" name="user.dob" label="Expiry date" placeholder="MM/DD/YYYY" />
                        </div>
                    </div>
                </div>
                <div className="w-full md:w-1/3 flex flex-col border-r">
                    <div className="font-medium text-gray-600 text-lg py-4 px-6 pr-4 border-b">Insurance</div>
                    <div className='px-6 pr-4'>
                        <div className="mt-3">
                            <Field type="upload" name="insurance" label="Please upload your current insurance certificate" />
                        </div>
                        <div className="mt-3">
                            <Field type="date-picker" name="user.dob" label="Expiry date" placeholder="MM/DD/YYYY" />
                        </div>
                    </div>
                </div>
                <div className="w-full md:w-1/3 flex flex-col">
                    <div className="font-medium text-gray-600 text-lg py-4 px-6 pr-4 border-b">Qualifications</div>

                    <div className='px-6 pr-4'>
                        <div className="mt-3">
                            <Field type="upload" name="certificate" label="Please upload your current qualification certificate" />
                        </div>
                        <div className="mt-3">
                            <button
                                type="button"
                                className="border-gray-300 text-gray-600 border-2 w-full h-9 rounded p-1 mt-3 bg-white"
                            >
                                Add additional sertificate
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default DocumentStep;