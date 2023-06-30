import { EyeIcon, EyeOffIcon } from '@heroicons/react/solid';
import React, { useState } from 'react';

import Text from './Text';

interface PasswordProperties {
    id?: string;
    label?: string;
    name: string;
    type: string;
    defer?: boolean;
}

export default (props: PasswordProperties): JSX.Element => {
    const [hidden, set] = useState(true);
    const input = React.createRef<HTMLInputElement>();

    const Append = (): JSX.Element => (
        <span className="flex flex-shrink-0 items-center justify-center ml-2">
            <button
                type="button"
                onClick={(): void => {
                    set(!hidden);
                    input.current?.focus();
                }}
                className={`focus:outline-none z-10 right-2 p-1 rounded-full text-xs text-gray-400 hover:text-blue-500 ${
                    hidden ? '' : 'bg-gray-200'
                }`}
            >
                {hidden ? <EyeIcon className="h-4 w-4" /> : <EyeOffIcon className="h-4 w-4" />}
            </button>
        </span>
    );

    return (
        <>
            <Text {...props} type={hidden ? props.type : 'text'} ref={input} append={<Append />} />
        </>
    );
};
