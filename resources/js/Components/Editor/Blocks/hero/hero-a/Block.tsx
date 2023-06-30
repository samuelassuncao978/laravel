import Icon from './Icon';
import Preview from './Preview';
import React from 'react';
import { TypeEditorBlock } from '../../../Types';
import { TypeField } from '../../../../Form/Types';

export interface Data {
    title: string;
    image: { key: string; bucket: string };
    content: string;
}

export default {
    name: 'hero-type-a',
    fields: [
        { type: 'text', name: 'title', label: 'Title:' } as TypeField,
        { type: 'image', name: 'image', label: 'Image:' } as TypeField,
        { type: 'textarea', name: 'content', label: 'Content:' } as TypeField,
    ],
    icon: () => <Icon />,
    preview: (data: Data) => <Preview {...data} />,
} as TypeEditorBlock;
