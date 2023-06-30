import { PlusIcon } from '@heroicons/react/solid';
import React, { ReactNode } from 'react';
import { Link, useLocation } from 'react-router-dom';
import Field from '../Form/Field';

interface Props {
    title?: ReactNode;
    add?: string;
    search?: boolean;
}

export default function Header({ title, add, search }: Props): JSX.Element {
    const location = useLocation();

    return (
        <div className="bg-gray-100 border-b border-gray-200">
            <div className="px-5 p-2 pb-2 space-y-2">
                <div className="flex items-center pb-0 h-12">
                    <div className="text-xs text-gray-400 tracking-wider flex-grow uppercase">{title}</div>
                    <div className="items-center">
                        {add ? (
                            <Link
                                to={add}
                                state={{ from: location }}
                                className="p-1 bg-gray-200 text-gray-500 relative overflow-hidden focus:outline-none ml-auto text-xs flex items-center justify-center hover:bg-gray-600 hover:text-white rounded-full"
                            >
                                <PlusIcon className="h-4 w-4" />
                            </Link>
                        ) : null}
                    </div>
                </div>
                {search ? (
                    <div className="pb-2">
                        <Field type="search" name="search" size="sm" variant="opaque" defer={false} />
                    </div>
                ) : null}
            </div>
        </div>
    );
}
