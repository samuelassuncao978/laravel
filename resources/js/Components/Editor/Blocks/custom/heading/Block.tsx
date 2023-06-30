import Preview from './Preview';
import React from 'react';
import { TypeEditorBlock } from '../../../Types';
import { TypeField } from '../../../../Form/Types';

export interface Data {
    title: string;
}

export default {
    name: 'heading',
    fields: [{ type: 'text', name: 'title', label: 'Title:' } as TypeField],
    preview: (data: Data) => <Preview {...data} />,
} as TypeEditorBlock;
