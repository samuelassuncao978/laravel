import { SearchIcon, XIcon } from '@heroicons/react/solid';
import React, { useContext } from 'react';
import { ControllerContext } from '../../../Providers/Controller';

import Text from './Text';

interface SearchProperties {
    id?: string;
    label?: string;
    name: string;
    type: string;
    defer?: boolean;
    placeholder?: string;
}

export default (props: SearchProperties): JSX.Element => {
    const input = React.createRef<HTMLInputElement>();
    const { value, setValue } = useContext(ControllerContext);

    const { placeholder, name } = props;
    const Prepend = (): JSX.Element => (
        <span className="flex flex-shrink-0 items-center justify-center mr-2">
            <span className="p-0 rounded-full text-xs text-gray-500 ">
                <SearchIcon className="h-3 w-3" />
            </span>
        </span>
    );
    const Append = (): JSX.Element | null =>
        value(name) ? (
            <span className="flex flex-shrink-0 items-center justify-center">
                <button
                    type="button"
                    onClick={(): void => {
                        setValue(name, '', false);
                        input.current?.focus();
                    }}
                    className="focus:outline-none z-10 bg-gray-200 p-0.5 rounded-full text-xs text-gray-400 hover:text-blue-500"
                >
                    <XIcon className="h-3 w-3" />
                </button>
            </span>
        ) : null;

    return (
        <>
            <Text
                {...props}
                ref={input}
                type="text"
                placeholder={placeholder ?? 'Find:'}
                append={<Append />}
                prepend={<Prepend />}
            />
        </>
    );
};
