import { Outlet } from 'react-router-dom';
import React, { useContext } from 'react';
import { Context, Controller } from '@sihq/ui-components';
import Header from '../../Components/Sidebar/Header';
import Content from '../../Components/Sidebar/Content';
import Filter from '../../Components/Filter';
import Item from '../../Components/Sidebar/Item';
import ItemHeading from '../../Components/Sidebar/ItemHeading';
import Sidebar from '../../Components/Sidebar/Sidebar';
import Moment from 'react-moment';
import {
    CalendarIcon,
} from '@heroicons/react/solid';

const Properties = {
    controller: 'App\\Http\\Controllers\\Clients\\Clients',
};

export default Controller(Properties, (): JSX.Element => {
        const { state } = useContext(Context);
    return (
        <>
            <Sidebar>
                <Header title="Notes" add="/notes/create" search />

                <Content>
                    <div className="py-1 px-2 flex items-center text-sm font-medium leading-none border text-gray-600 w-36 cursor-pointer rounded">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 7H19" stroke="#464E57" stroke-width="2" stroke-linecap="round" />
                            <path d="M5 12H15" stroke="#464E57" stroke-width="2" stroke-linecap="round" />
                            <path d="M5 17H11" stroke="#464E57" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        <p>Sort By:</p>
                        <select aria-label="select" className="focus:text-indigo-600 focus:outline-none bg-transparent ml-1 w-10">
                            <option className="text-sm">All</option>
                            <option className="text-sm">By Client</option>
                            <option className="text-sm">Newest First</option>
                            <option className="text-sm">Oldest First</option>
                        </select>
                    </div>
                    {(state?.clients ?? []).map((client: any) => (
                        <Item key={client.id} to={`/notes/${client?.id}`}>
                            <ItemHeading
                                title={`${client.first_name} ${client.last_name}`}
                                avatar={`${client.first_name} ${client.last_name}`}
                            />
                            <div className="flex w-full text-xs text-gray-600 pt-2 gap-4">
                                <span className="w-6"><CalendarIcon /></span>
                                <div className="mt-1">
                                    <Moment format="MM/DD/YYYY">{client.created_at}</Moment>
                                     - 
                                    <Moment format="h:mm:ss a">{client.created_at}</Moment>
                                </div>
                            </div>
                        </Item>
                    ))}
                </Content>
            </Sidebar>
            <div className='w-full'>
                <Outlet />
            </div>
        </>
    );
});
