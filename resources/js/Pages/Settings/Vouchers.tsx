import { EyeIcon, PlusIcon, TrashIcon } from '@heroicons/react/solid';
import React from 'react';
import Actionbar from '../../Components/Actionbar';
import Button from '../../Components/Button';
import Field from '../../Components/Form/Field';
import Filter from '../../Components/Filter';

import PageHeader from '../../Components/PageHeader';

import Controller from '../../Providers/Controller';
import ConclusionBar from '../../Components/ConclusionBar';
import Status from '../../Components/Status';
import Page from '../../Components/Page';
import { useLocation, useNavigate } from 'react-router-dom';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Users',
};
const Component = Controller(Properties, (): JSX.Element => {
    const location = useLocation();
    const navigate = useNavigate();

    return (
        <Page>
            <PageHeader title="Vouchers" description="Manage your account details" />

            <Actionbar.Bar>
                <Actionbar.Item title="Find:">
                    <Field name="test" type="search" variant="opaque-rounded" size="xs" />
                </Actionbar.Item>
                <Actionbar.Item title="Group:">
                    <Filter
                        name="text"
                        options={[
                            { text: 'None', value: 'none' },
                            { text: 'Month', value: 'month' },
                            { text: 'Type', value: 'type' },
                            { text: 'Method', value: 'method' },
                            { text: 'Status', value: 'status' },
                        ]}
                    />
                </Actionbar.Item>
                <Actionbar.Item>
                    <div className="flex items-center space-x-1 text-gray-700">
                        <span className="h-3 w-3">
                            <EyeIcon />
                        </span>
                        <Field name="toggle" type="toggle" variant="opaque" size="xs" />
                        <span className="h-3 w-3 opacity-50">
                            <TrashIcon />
                        </span>
                    </div>
                </Actionbar.Item>

                <Actionbar.Item right>
                    <Button
                        size="sm"
                        icon={<PlusIcon />}
                        onClick={(): void => navigate('/settings/vouchers/create', { state: { from: location } })}
                    >
                        Create voucher
                    </Button>
                </Actionbar.Item>
            </Actionbar.Bar>

            <table className="w-full text-left text-sm">
                <thead>
                    <tr className="text-gray-400 bg-white z-10 sticky">
                        <th className="font-normal px-3 pb-3 border-b border-gray-200 pt-5 ">Code</th>
                        <th className="font-normal px-3 pb-3 border-b border-gray-200 pt-5 ">Name</th>
                        <th className="font-normal px-3 pb-3 border-b border-gray-200 pt-5 ">From</th>
                        <th className="font-normal px-3 pb-3 border-b border-gray-200 pt-5 ">To</th>
                        <th className="font-normal px-3 pb-3 border-b border-gray-200 pt-5 ">Amount</th>
                        <th className="font-normal px-3 pb-3 border-b border-gray-200 pt-5 ">Eligibility</th>
                        <th className="font-normal px-3 pb-3 border-b border-gray-200 pt-5 ">Limit</th>
                        <th className="font-normal px-3 pb-3 border-b border-gray-200 pt-5 ">Status</th>
                        <th className="font-normal px-3 pb-3 border-b border-gray-200 pt-5 "></th>
                    </tr>
                </thead>
                <tbody className="text-gray-600 dark:text-gray-100">
                    <tr className="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer ">
                        <td className="sm:p-3 py-2 px-1 border-b border-gray-200  w-1 whitespace-nowrap"></td>
                        <td className="sm:p-3 py-2 px-1 border-b border-gray-200  ">
                            <span className="text-xs">test</span>
                        </td>
                        <td className="sm:p-3 py-2 px-1 border-b border-gray-200  w-1 whitespace-nowrap">
                            <span className="text-xs">—</span>
                        </td>
                        <td className="sm:p-3 py-2 px-1 border-b border-gray-200  w-1 whitespace-nowrap">
                            <span className="text-xs">—</span>
                        </td>
                        <td className="sm:p-3 py-2 px-1 border-b border-gray-200  w-1 whitespace-nowrap">
                            <div className="flex text-xs">$1.00</div>
                        </td>
                        <td className="sm:p-3 py-2 px-1 border-b border-gray-200  w-1 whitespace-nowrap">
                            <span className="text-xs">unrestricted</span>
                        </td>

                        <td className="sm:p-3 py-2 px-1 border-b border-gray-200  w-1 whitespace-nowrap">
                            <div className="flex text-xs">0</div>
                        </td>

                        <td className="sm:p-3 py-2 px-1 border-b border-gray-200  w-1 whitespace-nowrap">
                            <Status label="Revoked" variant="red" size="xs" />
                        </td>

                        <td className="sm:p-3 py-2 px-1 border-b border-gray-200  w-1 whitespace-nowrap">
                            <button
                                type="button"
                                className=" active:bg-gray-50 hover:text-gray-700 text-gray-400 group flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded relative py-2 px-3 "
                            >
                                <span className="h-4 w-4 text-red-600 group-hover:text-red-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                </span>
                                <div className="absolute inset-0 rounded overflow-hidden">
                                    <span className="absolute inset-0 flex items-center bg-white   justify-center  cursor-wait">
                                        <span className="border-t-transparent block absolute border-solid animate-spin rounded-full border-2 h-5 w-5 m-2  border-gray-500"></span>
                                    </span>
                                </div>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <ConclusionBar.Bar>
                <ConclusionBar.Item title="Users:">
                    <div>9</div>
                </ConclusionBar.Item>
                <ConclusionBar.Item title="Redeemed:">
                    <div>$0.00</div>
                </ConclusionBar.Item>
                <ConclusionBar.Item title={<Status label="valid:" variant="green" size="xs" />}>
                    <div>0</div>
                </ConclusionBar.Item>
                <ConclusionBar.Item title={<Status label="Ended:" variant="yellow" size="xs" />}>
                    <div>0</div>
                </ConclusionBar.Item>
                <ConclusionBar.Item title={<Status label="Revoked:" variant="red" size="xs" />}>
                    <div>0</div>
                </ConclusionBar.Item>
            </ConclusionBar.Bar>
        </Page>
    );
});

const Vouchers = (): JSX.Element => {
    return <Component />;
};
export default Vouchers;
