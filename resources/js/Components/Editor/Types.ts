import { TypeField } from '../Form/Types';

export type TypeBlocks = TypeBlock[];

export type TypeBlock = {
    id: string;
    type: string;
    data?: any;
};

export type TypeEditorBlocks = TypeEditorBlock[];

export type TypeEditorBlock = {
    name: string;
    description?: string;
    fields?: TypeField[];
    icon?: () => JSX.Element;
    preview: (data: any) => JSX.Element;
};
