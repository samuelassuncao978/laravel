import React, { useContext } from 'react';
import { ControllerContext } from '../Providers/Controller';

interface Props {
    name: string;
    options?: { text: string; value: string }[];
}
export default function Filter({ options, name }: Props): JSX.Element {
    const { value, setValue } = useContext(ControllerContext);
    const selected = value(name);
    return (
        <div className="flex rounded-full bg-gray-200 p-1 shadow-inner space-x-1 scrollbar-x scrollbar-hidden">
            {options?.map(({ text, value }) => {
                return (
                    <button
                        key={value}
                        className={`px-3  rounded-full ${
                            selected === value
                                ? 'bg-blue-500 text-white shadow-xs '
                                : 'text-gray-400 hover:bg-gray-100 hover:text-gray-700'
                        }`}
                        onClick={(): void => setValue(name, value, false)}
                    >
                        {text}
                    </button>
                );
            })}
        </div>
    );
}
