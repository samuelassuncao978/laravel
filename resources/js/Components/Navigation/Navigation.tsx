import React, { useContext, useEffect, useState } from 'react';
import {
    CalendarIcon,
    ClockIcon,
    CogIcon,
    CollectionIcon,
    CubeIcon,
    DocumentTextIcon,
    HomeIcon,
    LoginIcon,
    OfficeBuildingIcon,
    PresentationChartLineIcon,
    UserCircleIcon,
    UsersIcon,
} from '@heroicons/react/solid';

import Item from './Item';
import Logo from '../Logo';
import { Context } from '@sihq/ui-components';
import { Link } from 'react-router-dom';

export default function Navigation(): JSX.Element {
    const { state } = useContext(Context);
    const role = (state.role as any) ?? {};
    return (
        <div className="hidden md:flex bg-white text-gray-400 flex-shrink-0 border-r border-gray-200 flex-col z-10 fixed w-20 relative">
            <div className="text-blue-500 z-50 my-5 flex items-center justify-center">
                <div className="w-full h-12">
                    <Logo />
                </div>
            </div>
            <div className=" relative w-full flex-grow mt-4 flex-col space-y-4 flex flex-wrap">
                <Item href="/">
                    <HomeIcon />
                    <span className="hidden">Dashboard</span>
                </Item>

                <Item href="/appointments">
                    <ClockIcon />
                    <span className="hidden">Appointments</span>
                </Item>

                <Item href="/clients">
                    <UserCircleIcon />
                    <span className="hidden">Clients</span>
                </Item>

                <Item href="/employers">
                    <OfficeBuildingIcon />
                    <span className="hidden">Employers</span>
                </Item>

                <Item href="/calendar">
                    <CalendarIcon />
                    <span className="hidden">Calendar</span>
                </Item>

                <Item href="/files">
                    <CollectionIcon />
                    <span className="hidden">Files</span>
                </Item>

                <Item href="/notes">
                    <DocumentTextIcon />
                    <span className="hidden">Notes</span>
                </Item>

                <Item href="/users">
                    <UsersIcon />
                    <span className="hidden">Users</span>
                </Item>

                <Item href="/reports">
                    <PresentationChartLineIcon />
                    <span className="hidden">Reports</span>
                </Item>

                <Item href="/settings">
                    <CogIcon />
                    <span className="hidden">Settings</span>
                </Item>

                <Item href="/tenants">
                    <CubeIcon />
                    <span className="hidden">Tenants</span>
                </Item>
            </div>
            <Link
                to="/logout"
                className="mb-3 focus:outline-none h-10 w-full rounded-md flex items-center justify-center hover:text-blue-500"
            >
                <LoginIcon className="h-5 w-5" />
            </Link>
        </div>
    );
}
