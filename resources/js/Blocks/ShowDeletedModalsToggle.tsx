import { EyeIcon, TrashIcon } from '@heroicons/react/solid';
import React, { useContext } from 'react';
import Actionbar from '../Components/Actionbar';
import Field from '../Components/Form/Field';
import { ControllerContext } from '../Providers/Controller';

export default function ShowDeletedModalsToggle(): JSX.Element {
    const { value } = useContext(ControllerContext);

    return (
        <Actionbar.Item>
            <div className="flex items-center space-x-1 text-gray-700">
                <span className="h-3 w-3">
                    <EyeIcon className={value('_with_deleted') ? 'opacity-50' : ''} />
                </span>
                <Field name="_with_deleted" type="toggle" variant="opaque" size="xs" />
                <span className="h-3 w-3">
                    <TrashIcon className={value('_with_deleted') ? '' : 'opacity-50'} />
                </span>
            </div>
        </Actionbar.Item>
    );
}
