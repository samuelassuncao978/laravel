import Icon from './Icon';
import Preview from './Preview';
import React from 'react';
import { TypeEditorBlock } from '../../../Types';
import { TypeField } from '../../../../Form/Types';

export interface Data {
    testimonial: string;
    author: string;
    title: string;
}

export default {
    name: 'testimonial-type-b',
    fields: [
        { type: 'textarea', name: 'testimonial', label: 'Testimonial:' } as TypeField,
        { type: 'text', name: 'author', label: 'Author:' } as TypeField,
        { type: 'text', name: 'title', label: 'title:' } as TypeField,
    ],
    icon: () => <Icon />,
    preview: (data: Data) => <Preview {...data} />,
} as TypeEditorBlock;
