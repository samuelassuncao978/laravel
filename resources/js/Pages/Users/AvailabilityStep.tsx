import { Button, Field, Modal } from '../../Components';
import React, { SyntheticEvent, useState } from 'react';
import { XIcon } from '@heroicons/react/solid';
import Link from '../../Components/Link';

export interface CardProps {

}

const AvailabilityStep = (props: CardProps): JSX.Element => {

    const weekendArray = ["saturday", "sunday"];
    const [selectedDays, setSelectedDays] = useState<string[]>([])
    const [selectedEndDays, setSelectedEndDays] = useState<string[]>([])
    const [isCustom, setIsCustom] = useState<boolean>(false);

    const selectDays = (e: any, day: string) => {
        let checked = e.target.checked

        if (checked) {
            if (weekendArray.includes(day)) {
                setSelectedEndDays((old) => [...old, day])
            } else {
                setSelectedDays((old) => [...old, day])
            }
        } else {
            if (weekendArray.includes(day)) {
                setSelectedEndDays(selectedEndDays.filter(item => item !== day));
            } else {
                setSelectedDays(selectedDays.filter(item => item !== day));
            }
        }
    }


    const selectCustom = (e: any) => {
        let checked = e.target.checked
        setIsCustom(checked)
    }

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
                        <p className="text-xs text-gray-400 text-left">Set up your info</p>
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
                        <circle cx="24" cy="24" r="24" fill="#E6EEFD" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M32.3739 17.6264C32.7644 18.0169 32.7644 18.6501 32.3739 19.0406L21.7072 29.7073C21.3167 30.0978 20.6835 30.0978 20.293 29.7073L14.9596 24.3739C14.5691 23.9834 14.5691 23.3502 14.9596 22.9597C15.3502 22.5692 15.9833 22.5692 16.3739 22.9597L21.0001 27.5859L30.9596 17.6264C31.3502 17.2359 31.9833 17.2359 32.3739 17.6264Z" fill="#4B84EE" />
                    </svg>
                    <div>
                        <p className="text-xs text-black text-left">Billing</p>
                        <p className="text-xs text-grey text-left">Set your billing data</p>
                    </div>
                </div>
                <div className="w-1/4 flex flex-row items-center gap-2 py-4 px-6 pr-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="24" fill="#4B84EE" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0216 16.5841C21.0216 15.9683 20.5225 15.4692 19.9068 15.4692C19.2911 15.4692 18.7919 15.9683 18.7919 16.5841V17.9117H17.8225C16.5911 17.9117 15.5928 18.91 15.5928 20.1414V30.9683C15.5928 32.1998 16.5911 33.198 17.8225 33.198H31.0274C32.2587 33.198 33.2571 32.1998 33.2571 30.9683V20.1414C33.2571 18.91 32.2587 17.9117 31.0274 17.9117H29.9088V16.5841C29.9088 15.9683 29.4096 15.4692 28.7939 15.4692C28.1783 15.4692 27.6791 15.9683 27.6791 16.5841V17.9117H21.0216V16.5841ZM20.0532 20.9761C19.4392 20.9761 18.9411 21.4739 18.9411 22.0882C18.9411 22.7024 19.4392 23.2003 20.0532 23.2003H28.7972C29.4112 23.2003 29.9088 22.7024 29.9088 22.0882C29.9088 21.4739 29.4112 20.9761 28.7972 20.9761H20.0532Z" fill="white" />
                    </svg>
                    <div>
                        <p className="text-xs text-black text-left">Availability</p>
                        <p className="text-xs text-grey text-left">Set your work time</p>
                    </div>
                </div>
            </div>
            <div className="w-full flex flex-row px-6 py-2 border-b bg-white rounded-t">
                <div className="font-medium text-gray-600 text-2xl">Availability</div>
                <button
                    type="button"
                    className="absolute top-3 right-3 text-gray-500   z-30 rounded-full bg-gray-200 p-1 hover:bg-gray-300 focus:bg-gray-800 focus:text-white focus:outline-none"
                >
                    <XIcon className="h-4 w-4" />
                </button>
            </div>
            <div className="flex flex-row bg-white">
                <div className="w-full flex flex-col">
                    <div className="font-medium text-gray-600 text-lg py-2 px-6 pr-4 border-b">Pick your work days</div>
                </div>
            </div>

            <div className="flex justify-between font-medium uppercase text-xs py-2 pb-2 px-6 bg-white border-b">
                {['monday', "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"].map((day) => {
                    return (
                        <li className="mb-2 mt-2 list-none">
                            <input className="sr-only peer" type="checkbox" id={day} onChange={(e) => selectDays(e, day)} />
                            <label className="flex px-3 w-24 h-8 items-center border bg-blue-100 text-blue-500 rounded cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-blue-500 peer-checked:ring-2 peer-checked:border-transparent justify-center" htmlFor={day}>{day.charAt(0).toUpperCase() + day.slice(1)}</label>
                        </li>
                    )
                })}
            </div>

            <div className="flex flex-col md:flex-row bg-white border-b">
                <div className="w-full md:w-1/2 flex flex-col border-r pb-6">
                    <div className="font-medium text-gray-600 text-lg py-2 px-6 pr-2 border-b">Workdays</div>
                    <div className='px-6 pr-4'>
                        {selectedDays.length == 0 && selectedEndDays.length == 0 && (
                            <div className="flex text-sm text-gray-400 mt-2">
                                Please select the days you would like to work to set your availability
                            </div>
                        )}
                        {(selectedDays && selectedDays.length > 0 && !isCustom) && (
                            <>
                                <div className="flex justify-center font-base gap-4 text-xs py-4 pb-4 px-6 rounded bg-blue-100 mt-2">
                                    {selectedDays.map((day) => {
                                        return (
                                            <span className="flex items-center justify-center text-xs text-blue-500">
                                                {day.charAt(0).toUpperCase() + day.slice(1)}
                                            </span>
                                        )
                                    })}
                                </div>
                                <div className="col-end-12 mt-2">
                                    <div className="flex space-x-4">
                                        <div className="w-full md:w-1/2">
                                            <Field type="time-picker" name="start_day" label="Start work day" placeholder="00:00   AM" />
                                        </div>
                                        <div className="w-full md:w-1/2">
                                            <Field type="time-picker" name="end_day" label="End work day" placeholder="00:00   PM" />
                                        </div>
                                    </div>
                                </div>
                            </>
                        )}
                        {(selectedDays && selectedDays.length > 0 && isCustom) && (
                            <ul className="bg-white left-0 right-0 h-80 overflow-auto">
                                {selectedDays.map((day) => {
                                    return (
                                        <li className="grid grid-cols-10 justify-center items-center cursor-pointer px-4 py-2 border-b hover:bg-gray-50">
                                            <div className="justify-center items-center absolute">
                                                <h3 className="text-blue-500 text-sm">{day.charAt(0).toUpperCase() + day.slice(1)}</h3>
                                                <p className="text-gray-600 text-xs">00:00 - 00:00</p>
                                            </div>
                                            <div className="col-start-3 col-end-12 pl-8">
                                                <div className="flex space-x-4">
                                                    <div className="w-full md:w-1/2">
                                                        <Field type="time-picker" name="start_day" label="Start work day" placeholder="00:00   AM" />
                                                    </div>
                                                    <div className="w-full md:w-1/2">
                                                        <Field type="time-picker" name="end_day" label="End work day" placeholder="00:00  PM" />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    )
                                })}
                            </ul>
                        )}

                        {(selectedDays && selectedDays.length > 0) && (
                            <div className="mt-2">
                                <input type="checkbox" value="2" name="template" id="custom_worksheet" onChange={(e) => selectCustom(e)} />
                                <label className="text-sm text-gray-600 ml-1" htmlFor="custom_worksheet">Custom worktime for each day</label>
                            </div>
                        )}
                    </div>
                </div>
                <div className="w-full md:w-1/2 flex flex-col">
                    <div className="font-medium text-gray-600 text-lg py-2 px-6 pr-2 border-b">Weekends</div>
                    <div className='px-6 pr-4'>
                        {(selectedEndDays && selectedEndDays.length > 0 && !isCustom) && (
                            <>
                                <div className="flex justify-center font-base gap-4 text-xs py-4 pb-4 px-6 rounded bg-gray-100 mt-2">
                                    {selectedEndDays.map((day) => {
                                        return (
                                            <span className="lex items-center justify-center text-xs text-gray-600">
                                                {day.charAt(0).toUpperCase() + day.slice(1)}
                                            </span>
                                        )
                                    })}
                                </div>
                                <div className="col-end-12 mt-2 mb-2">
                                    <div className="flex space-x-4">
                                        <div className="w-full md:w-1/2">
                                            <Field type="time-picker" name="weekend_start_day" label="Start work day" placeholder="00:00  AM" />
                                        </div>
                                        <div className="w-full md:w-1/2">
                                            <Field type="time-picker" name="weekend_start_day" label="End work day" placeholder="00:00  PM" />
                                        </div>
                                    </div>
                                </div>
                            </>
                        )}
                        {(selectedEndDays && selectedEndDays.length > 0 && isCustom) && (
                            <ul className="bg-white left-0 right-0 h-80 overflow-auto">
                                {selectedEndDays.map((day) => {
                                    return (
                                        <li className="grid grid-cols-10 justify-center items-center cursor-pointer px-4 py-2 border-b hover:bg-gray-50">
                                            <div className="justify-center items-center absolute">
                                                <h3 className="text-blue-500 text-sm">{day.charAt(0).toUpperCase() + day.slice(1)}</h3>
                                                <p className="text-gray-600 text-xs">00:00 - 00:00</p>
                                            </div>
                                            <div className="col-start-3 col-end-12 pl-8">
                                                <div className="flex space-x-4">
                                                    <div className="w-full md:w-1/2">
                                                        <Field type="time-picker" name="start_day" label="Start work day" placeholder="00:00  AM" />
                                                    </div>
                                                    <div className="w-full md:w-1/2">
                                                        <Field type="time-picker" name="end_day" label="End work day" placeholder="00:00  PM" />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    )
                                })}
                            </ul>
                        )}
                    </div>
                </div>
            </div>
        </>
    );
};

export default AvailabilityStep;