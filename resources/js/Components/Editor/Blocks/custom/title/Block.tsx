import Preview from './Preview';
import React from 'react';
import { TypeEditorBlock } from '../../../Types';
import { TypeField } from '../../../../Form/Types';

export interface Data {
    title: string;
    image: { key: string; bucket: string };
}

export default {
    name: 'title',
    fields: [
        { type: 'text', name: 'title', label: 'Title:' } as TypeField,
        { type: 'image', name: 'image', label: 'Image:' } as TypeField,
    ],
    preview: (data: Data) => <Preview {...data} />,
} as TypeEditorBlock;
