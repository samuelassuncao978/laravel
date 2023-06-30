import React, { useContext, useState } from 'react';

import Blocks from './Blocks';
import { ChevronDownIcon } from '@heroicons/react/solid';
import Context from './Context';
import { ControllerContext } from '../../Providers/Controller';
import Field from '../Form/Field';
import { TypeBlocks } from './Types';
import _ from 'lodash';

interface Props {
    name: string;
}
interface WrapperProps {
    children: JSX.Element | JSX.Element[];
    group: string;
    activeGroup: string;
    groupKey: number;
    setActiveGroup: (state: string) => undefined;
}

const Wrapper: any = ({
    children,
    group,
    activeGroup,
    groupKey,
    setActiveGroup,
}: WrapperProps): JSX.Element | JSX.Element[] => {
    return group === 'undefined' ? (
        children
    ) : (
        <div
            key={group}
            className={`border-b border-gray-300 -mx-5 flex flex-col ${groupKey === 0 ? 'border-t' : ''} ${
                activeGroup === group ? 'bg-gray-100' : ' hover:bg-gray-100 cursor-pointer'
            }`}
        >
            <button
                type="button"
                onClick={(): void => setActiveGroup(activeGroup === group ? '' : group)}
                className="text-xs text-gray-600 font-bold px-5 pr-3 p-2 flex items-center flex-1"
            >
                {group}
                <span className="ml-auto flex">
                    <ChevronDownIcon
                        className={`h-5 w-5 transition ease duration-300 transform  ${
                            activeGroup === group ? ' rotate-180' : '  rotate-0'
                        }`}
                    />
                </span>
            </button>
            <div className={`p-5 ${activeGroup === group ? ' block' : '  hidden'}`}>{children}</div>
        </div>
    );
};

const BlockProperties = ({ name }: Props): JSX.Element => {
    const { selected } = useContext(Context);
    const { value } = useContext(ControllerContext);

    const blocks = value(name) ? (value(name) as TypeBlocks) : [];

    const block = blocks.find(({ id }) => id === selected);
    const index = blocks.findIndex(({ id }) => id === selected);
    const EditorBlock = Blocks.find(({ name }) => name === block?.type);

    const fieldGroups = _.groupBy(EditorBlock?.fields, (e) => e.group);
    const [activeGroup, setActiveGroup] = useState<string | null>();

    return (
        <div className="bg-gray-50 w-72 border-l border-gray-300 p-3 px-5 scrollbar">
            <div className="text-xs text-gray-600 tracking-wider flex-grow font-bold uppercase mt-2 mb-5">
                {EditorBlock?.name}
                {EditorBlock?.description ? (
                    <div className="text-xs text-gray-400 tracking-wider font-normal normal-case">
                        {EditorBlock?.description}
                    </div>
                ) : null}
            </div>

            <div className="">
                {Object.keys(fieldGroups).map((group, groupKey) => {
                    return (
                        <Wrapper {...{ groupKey, activeGroup, setActiveGroup, group }}>
                            <div className="space-y-2">
                                {fieldGroups[group].map((field, key) => {
                                    return (
                                        <div key={key}>
                                            <Field {...field} name={`${name}.${index}.data.${field.name}`} />
                                        </div>
                                    );
                                })}
                            </div>
                        </Wrapper>
                    );
                })}
            </div>
        </div>
    );
};
export default BlockProperties;
