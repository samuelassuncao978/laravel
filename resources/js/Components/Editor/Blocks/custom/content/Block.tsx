import Preview from './Preview';
import React from 'react';
import { TypeEditorBlock } from '../../../Types';
import { TypeField } from '../../../../Form/Types';

export interface Data {
    content: string;
}

export default {
    name: 'content',
    fields: [{ type: 'tinymce', name: 'content', label: 'Content:' } as TypeField],
    preview: (data: Data) => <Preview {...data} />,
} as TypeEditorBlock;
