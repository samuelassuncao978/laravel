import React, { ReactNode, useContext } from 'react';
import { ControllerContext } from '../../Providers/Controller';

import { TypeBlocks } from '../Editor/Types';
import Blocks from './Blocks';

// @ts-ignore
interface EditorProperties extends React.InputHTMLAttributes<HTMLInputElement> {
    name: string;
}

export default React.forwardRef<HTMLInputElement, EditorProperties>((props): JSX.Element => {
    const { value } = useContext(ControllerContext);

    const { name } = props;

    const blocks = value(name) ? (value(name) as TypeBlocks) : [];

    return (
        <>
            {blocks.map((block): JSX.Element | null => {
                const EditorBlock = Blocks.find(({ name }) => name === block?.type);
                return <>{EditorBlock?.preview(block.data)}</>;
            })}
        </>
    );
});
