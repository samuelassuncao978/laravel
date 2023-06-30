import React, { ReactNode, useContext, useState } from 'react';

import AddBlock from '../../Editor/AddBlock';
import BlockProperties from '../../Editor/BlockProperties';
import Context from '../../Editor/Context';
import { ControllerContext } from '../../../Providers/Controller';
import EditorBlock from '../../Editor/EditorBlock';
import InlineErrors from '../InlineErrors';
import Label from '../Label';
import { PlusCircleIcon } from '@heroicons/react/outline';
import PrivacyBarrier from '../PrivacyBarrier';
import { TypeBlocks } from '../../Editor/Types';

// @ts-ignore
interface EditorProperties extends React.InputHTMLAttributes<HTMLInputElement> {
    id?: string;
    label?: string;
    name: string;
    type: string;
    defer?: boolean;
    prepend?: ReactNode;
    append?: ReactNode;
    size?: string;
    variant?: string;
}

const VARIANTS: { [key: string]: string } = {
    base: ' flex flex-1 relative border-2 outline-none focus-within:ring-2 focus-within:shadow-inner focus-within:ring-opacity-20 transition-all ease-in-out duration-200 flex-1',
    basic: ' bg-white border-gray-300 focus-within:border-blue-400 focus-within:ring-blue-400 rounded',
    opaque: ' focus-within:bg-white bg-gray-200 border-gray-200 focus-within:border-blue-400 focus-within:ring-blue-400 rounded',
    'opaque-rounded':
        ' focus-within:bg-white bg-gray-200 border-gray-200 focus-within:border-blue-400 focus-within:ring-blue-400 rounded-full',
};

export default React.forwardRef<HTMLInputElement, EditorProperties>((props): JSX.Element => {
    const { value, setValue, bind = (): object => ({}) } = useContext(ControllerContext);
    const [selected, setSelected] = useState<string | null>(null);
    const {
        id,
        type,
        name,
        label,
        defer = true,

        variant = 'basic',
    } = props;

    const className = Object.entries(VARIANTS)
        .filter((i) => ['base', variant].includes(i[0]))
        .reduce((a, b): any => [...a, b[1]], [])
        .join('');

    const blocks = value(name) ? (value(name) as TypeBlocks) : [];

    function move(from: any, to: any): void {
        const reorder = [...blocks];
        const f = reorder.splice(from, 1)[0];
        reorder.splice(to, 0, f);
        setValue(name, reorder);
    }

    function remove(from: any): void {
        const reorder = [...blocks];
        reorder.splice(from, 1)[0];
        setValue(name, reorder);
    }

    return (
        <>
            <Context.Provider value={{ selected: selected }}>
                <Label>{label}</Label>
                <span className={`${className} h-full overflow-hidden`}>
                    <div className="flex-1 flex flex-col p-10 space-y-2 overflow-auto scrollbar">
                        {blocks.map((block, key): JSX.Element => {
                            return (
                                <EditorBlock
                                    key={key}
                                    block={block}
                                    select={(): void => setSelected(block.id)}
                                    moveDown={(): void => move(key, key + 1)}
                                    moveUp={(): void => move(key, key - 1)}
                                    remove={(): void => remove(key)}
                                />
                            );
                        })}
                        <div className="mt-auto">
                            <AddBlock {...props} />
                        </div>
                    </div>
                    <BlockProperties {...props} />

                    <PrivacyBarrier />
                </span>
                <InlineErrors {...props} />
            </Context.Provider>
        </>
    );
});
