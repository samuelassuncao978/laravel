import { ArrowDownIcon, ArrowUpIcon, TrashIcon } from '@heroicons/react/solid';
import React, { useContext } from 'react';
import Conditional from '../Conditional';
import Context from './Context';
import Blocks from './Blocks';

import { TypeBlock } from './Types';

interface Props {
    block: TypeBlock;
    select: VoidFunction;
    moveUp: VoidFunction;
    moveDown: VoidFunction;
    remove: VoidFunction;
}

const EditorBlock = (props: Props): JSX.Element => {
    const { block, select, remove, moveDown, moveUp } = props;
    const { selected } = useContext(Context);

    const EditorBlock = Blocks.find(({ name }) => name === block?.type);

    return (
        <button
            type="button"
            onClick={select}
            className={`border  relative  rounded p-2 ${
                selected === block.id
                    ? 'border-gray-700 ring-2 ring-gray-300 ring-opacity-25 '
                    : 'border-dashed border-white hover:border-gray-400'
            }`}
        >
            <Conditional expresion={selected === block.id}>
                <div className="flex space-x-2 absolute top-1 right-1">
                    <span
                        onClick={remove}
                        className="text-gray-600 rounded-full bg-gray-200 p-1 inline-flex hover:bg-gray-600 hover:text-white"
                    >
                        <TrashIcon className="h-3 w-3" />
                    </span>
                    <span className=" inline-flex space-x-1 rounded-full bg-gray-200">
                        <span
                            onClick={moveUp}
                            className="text-gray-600 rounded-full bg-gray-200 p-1 inline-flex hover:bg-gray-600 hover:text-white"
                        >
                            <ArrowUpIcon className="h-3 w-3" />
                        </span>

                        <span className="block  w-px bg-gray-400 mt-1 mb-1"></span>

                        <span
                            onClick={moveDown}
                            className="text-gray-600 rounded-full bg-gray-200 p-1 inline-flex hover:bg-gray-600 hover:text-white"
                        >
                            <ArrowDownIcon className="h-3 w-3" />
                        </span>
                    </span>
                </div>
            </Conditional>
            {EditorBlock?.preview(block.data)}
        </button>
    );
};
export default EditorBlock;
