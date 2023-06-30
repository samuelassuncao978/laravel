import { Outlet } from 'react-router-dom';
import { Button, Field } from '../../Components';
import React, { useContext, useEffect, useState } from 'react';
import { Context, Controller } from '@sihq/ui-components';
import ProgressBar from 'react-customizable-progressbar';
import Moment from 'react-moment';
import moment from 'moment';

import Appointment from '../../Components/Card/Appointment';
import Link from '../../Components/Link';
import Spacer from '../../Components/Sidebar/Spacer';
import Item from '../../Components/Sidebar/Item';


const Properties = {
    controller: 'App\\Http\\Controllers\\Appointments\\Appointments',
};
export default Controller(Properties, (): JSX.Element => {
    const { state } = useContext(Context);
    const [upComingAppointments, setUpComingAppointments] = useState<any[]>([]);
    const [pastAppointments, setPastAppointments] = useState<any[]>([]);
    const [todayAppointments, setTodayAppointments] = useState<any[]>([]);
    const [activeTab, setActiveTab] = useState("tab1");

    const [futureApps, setFutureApps] = useState<any>({})
    const [allFutureApps, setAllFutureApps] = useState<any>({})
    const [pastApps, setPastApps] = useState<any>({})
    const [allPastApps, setAllPastApps] = useState<any>({})

    const [nextAppointment, setNextAppointment] = useState<any>({});
    const appointments = state?.appointments ?? {};

    const [filterValue, setFitlerValue] = useState<string>("all")

    console.log(appointments);

    const handleTab1 = () => {
        // update the state to tab1
        setActiveTab("tab1");
    };
    const handleTab2 = () => {
        // update the state to tab2
        setActiveTab("tab2");
    };

    useEffect(() => {
        if (state && state.appointments) {
            state.appointments.forEach((appointment: any) => {
                let isToday = moment().isSame(appointment.start_at, 'day');
                if (isToday) {
                    setTodayAppointments((old) => [...old, appointment])
                } else {
                    let isBefore = moment().isBefore(appointment.start_at, 'day');
                    if (!isBefore) {
                        setPastAppointments((old) => [...old, appointment])
                    } else {
                        setUpComingAppointments((old) => [...old, appointment])
                    }
                }

            });
        }
    }, [state]);

    useEffect(() => {
        let tempUpcomingApps: {
            [key: string]: any
        } = {}

        if (upComingAppointments && upComingAppointments.length > 0) {

            upComingAppointments.forEach((appointment) => {
                let check = moment.utc(appointment.start_at).format("YYYY-MM-DD");
                if (check in tempUpcomingApps) {
                    tempUpcomingApps[check] = [...tempUpcomingApps[check], appointment]
                } else {
                    tempUpcomingApps[check] = [appointment]
                }
            });
            setFutureApps(tempUpcomingApps)
            setAllFutureApps(tempUpcomingApps)
        }

    }, [upComingAppointments]);

    useEffect(() => {
        let tempPastApps: {
            [key: string]: any
        } = {}

        if (pastAppointments && pastAppointments.length > 0) {

            pastAppointments.forEach((appointment) => {
                let check = moment.utc(appointment.start_at).format("YYYY-MM-DD");
                if (check in tempPastApps) {
                    tempPastApps[check] = [...tempPastApps[check], appointment]
                } else {
                    tempPastApps[check] = [appointment]
                }
            });
            setPastApps(tempPastApps)
            setAllPastApps(tempPastApps)
        }

    }, [pastAppointments]);

    useEffect(() => {
        if (filterValue == 'all') {
            setPastApps(allPastApps)
            setFutureApps(allFutureApps)
        } else {
            let tempPastApps: {
                [key: string]: any
            } = {}

            if (pastAppointments && pastAppointments.length > 0) {
                pastAppointments.forEach((appointment) => {
                    if (appointment.type === filterValue) {
                        let check = moment.utc(appointment.start_at).format("YYYY-MM-DD");
                        if (check in tempPastApps) {
                            tempPastApps[check] = [...tempPastApps[check], appointment]
                        } else {
                            tempPastApps[check] = [appointment]
                        }
                    }
                });
                setPastApps(tempPastApps)
            }

            let tempUpcomingApps: {
                [key: string]: any
            } = {}

            if (upComingAppointments && upComingAppointments.length > 0) {

                upComingAppointments.forEach((appointment) => {
                    if (appointment.type === filterValue) {
                        let check = moment.utc(appointment.start_at).format("YYYY-MM-DD");
                        if (check in tempUpcomingApps) {
                            tempUpcomingApps[check] = [...tempUpcomingApps[check], appointment]
                        } else {
                            tempUpcomingApps[check] = [appointment]
                        }
                    }
                });
                setFutureApps(tempUpcomingApps)
            }
        }
    }, [filterValue])

    const onChanageFilterValue = (e: any) => {
        setFitlerValue(e.target.value)
    }

    return (
        <>
            <div className="px-12 py-10 w-full bg-gray-100">
                <h1 className="text-black text-4xl title-font font-medium">Apppointments</h1>
                <div className="flex flex-wrap -mx-3 mt-4">
                    <div className="w-full md:w-1/2 lg:w-2/5 xl:w-1/4 py-2 sm:py-3 p-3 overflow-y-auto">
                        <div className="rounded-xl border p-6 flex flex-col bg-white">
                            <h2 className="text-black text-xl title-font font-medium">
                                <Moment format="dddd MMMM Do"></Moment>
                            </h2>

                            <div className="w-full">
                                <div className="inline-block w-full p-3">
                                    {todayAppointments.map((content: any) => {
                                        const { user, type, start_at, end_at } = content;
                                        return (
                                            <div>
                                                <Item to={`/appointments`}>
                                                    <Appointment
                                                        name={`${user.first_name}  ${user.last_name}`}
                                                        address={`${user.address}`}
                                                        type={type}
                                                        date={start_at}
                                                        time={end_at}
                                                    />
                                                </Item>
                                                <Spacer />
                                            </div>
                                        );
                                    })}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="w-full md:w-1/2 lg:w-3/5 xl:w-3/4 py-2 sm:py-3 p-3 overflow-y-auto">
                        <div className="rounded-xl border flex flex-col bg-white overflow-x-auto max-h-[845px]">
                            <div className="w-full">
                                <div className="flex items-center justify-between p-4">
                                    <div className="flex flex-row items-end gap-6 bg-white rounded-b">
                                        <button className={activeTab === "tab1" ? "active bg-blue-500 py-1 w-20 text-white rounded" : "bg-blue-100 py-1 w-20 text-blue-500 rounded"} onClick={handleTab1}>
                                            Past
                                        </button>
                                        <button className={activeTab === "tab2" ? "active text-white bg-blue-500 py-1 w-28 rounded" : "text-blue-500 bg-blue-100 py-1 w-28 rounded"} onClick={handleTab2}>
                                            Upcoming
                                        </button>
                                    </div>
                                    <div>
                                        <div className="py-1 px-2 flex items-center text-sm font-medium leading-none border text-gray-600 bg-white cursor-pointer rounded">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 7H19" stroke="#464E57" stroke-width="2" stroke-linecap="round" />
                                                <path d="M5 12H15" stroke="#464E57" stroke-width="2" stroke-linecap="round" />
                                                <path d="M5 17H11" stroke="#464E57" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                            <p>Sort By:</p>
                                            <select aria-label="select" className="focus:text-indigo-600 focus:outline-none bg-transparent ml-1 w-10" onChange={(e) => onChanageFilterValue(e)}>
                                                <option className="text-sm" value="all">All</option>
                                                <option className="text-sm" value="video-call">Video</option>
                                                <option className="text-sm" value="face-to-face">In person</option>
                                                <option className="text-sm" value="telephone-call">Telephone</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {activeTab === "tab1" ? (
                                    <div className="flex flex-col md:flex-row bg-white border">
                                        {pastApps ? (
                                            <div className="w-full overflow-x-auto flex">
                                                {Object.keys(pastApps).reverse().map((keyName) => {
                                                    return (
                                                        <div className="w-full md:w-1/3 flex flex-col border-r min-w-[280px] mb-2">
                                                            <div className="font-medium text-black text-lg py-2 px-6 pr-4 border-b">
                                                                <Moment format="DD MMMM">{keyName}</Moment>
                                                                <p className="text-sm text-gray-400"><Moment format="dddd">{keyName}</Moment></p>
                                                            </div>

                                                            {pastApps[keyName].map((content: any) => {
                                                                const { user, type, start_at, end_at } = content;
                                                                return (

                                                                    <div className='px-4 pr-4'>
                                                                        <div className="rounded-md border border-t-8 border-t-blue-200 hover:border-t-blue-400 border-gray-300 p-3 flex flex-col mt-4">
                                                                            <Appointment
                                                                                name={`${user.first_name}  ${user.last_name}`}
                                                                                address={`${user.address}`}
                                                                                type={type}
                                                                                date={start_at}
                                                                                time={end_at}
                                                                            />
                                                                        </div>
                                                                    </div>
                                                                );
                                                            })}
                                                        </div>

                                                    )

                                                })}
                                            </div>
                                        ) : (
                                            <div className="flex flex-col items-center justify-center space-y-2 flex-1">
                                            </div>
                                        )}
                                    </div>

                                ) : (
                                    <div className="flex flex-col md:flex-row bg-white border">
                                        {futureApps ? (
                                            <div className="w-full overflow-x-auto flex">
                                                {Object.keys(futureApps).reverse().map((keyName) => {
                                                    return (
                                                        <div className="w-full md:w-1/3 flex flex-col border-r min-w-[280px] mb-2">
                                                            <div className="font-medium text-black text-lg py-2 px-6 pr-4 border-b">
                                                                <Moment format="DD MMMM">{keyName}</Moment>
                                                                <p className="text-sm text-gray-400"><Moment format="dddd">{keyName}</Moment></p>
                                                            </div>

                                                            {futureApps[keyName].map((content: any) => {
                                                                const { user, type, start_at, end_at } = content;
                                                                return (

                                                                    <div className='px-4 pr-4'>
                                                                        <div className="rounded-md border border-t-8 border-t-blue-200 border-gray-300 p-3 flex flex-col mt-4">
                                                                            <Appointment
                                                                                name={`${user.first_name}  ${user.last_name}`}
                                                                                address={`${user.address}`}
                                                                                type={type}
                                                                                date={start_at}
                                                                                time={end_at}
                                                                            />
                                                                        </div>
                                                                    </div>
                                                                );
                                                            })}
                                                        </div>

                                                    )

                                                })}
                                            </div>
                                        ) : (
                                            <div className="flex flex-col items-center justify-center space-y-2 flex-1">
                                            </div>
                                        )}
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
});