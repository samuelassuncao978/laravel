import Icon from './Icon';
import Preview from './Preview';
import React from 'react';
import { TypeEditorBlock } from '../../../Types';
import { TypeField } from '../../../../Form/Types';

export interface Data {
    one: {
        title: string;
        subtitle: string;
        description: string;
        image: { key: string; bucket: string };
    };
    two: {
        title: string;
        subtitle: string;
        description: string;
        image: { key: string; bucket: string };
    };
    three: {
        title: string;
        subtitle: string;
        description: string;
        image: { key: string; bucket: string };
    };
}

export default {
    name: 'blog-type-a',
    fields: [
        { type: 'text', name: 'one.title', label: 'Title:', group: 'First panel' } as TypeField,
        { type: 'text', name: 'one.subtitle', label: 'Subtitle:', group: 'First panel' } as TypeField,
        { type: 'textarea', name: 'one.description', label: 'Description:', group: 'First panel' } as TypeField,
        { type: 'image', name: 'one.image', label: 'Image:', group: 'First panel' } as TypeField,

        { type: 'text', name: 'two.title', label: 'Title:', group: 'Second panel' } as TypeField,
        { type: 'text', name: 'two.subtitle', label: 'Subtitle:', group: 'Second panel' } as TypeField,
        { type: 'textarea', name: 'two.description', label: 'Description:', group: 'Second panel' } as TypeField,
        { type: 'image', name: 'two.image', label: 'Image:', group: 'Second panel' } as TypeField,

        { type: 'text', name: 'three.title', label: 'Title:', group: 'Third panel' } as TypeField,
        { type: 'text', name: 'three.subtitle', label: 'Subtitle:', group: 'Third panel' } as TypeField,
        { type: 'textarea', name: 'three.description', label: 'Description:', group: 'Third panel' } as TypeField,
        { type: 'image', name: 'three.image', label: 'Image:', group: 'Third panel' } as TypeField,
    ],
    icon: () => <Icon />,
    preview: (data: Data) => <Preview {...data} />,
} as TypeEditorBlock;
