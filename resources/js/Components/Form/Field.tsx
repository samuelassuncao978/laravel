import { TypeIcon, TypeLabel, TypeOptions, TypeSize, TypeVariant } from '../../Types';

import Address from './Inputs/Address';
import Currency from './Inputs/Currency';
import DateOfBirth from './Inputs/DateOfBirth';
import Duration from './Inputs/Duration';
import Editor from './Inputs/Editor';
import Image from './Inputs/Image';
import Upload from './Inputs/Upload';
import Password from './Inputs/Password';
import Phone from './Inputs/Phone';
import React from 'react';
import Search from './Inputs/Search';
import Select from './Inputs/Select';
import Text from './Inputs/Text';
import Textarea from './Inputs/Textarea';
import Timezone from './Inputs/Timezone';
import Toggle from './Inputs/Toggle';
import ToggleButton from './Inputs/ToggleButton';
import Transfer from './Inputs/Transfer';
import TinyMce from './Inputs/TinyMce';
import DatePicker from './Inputs/DatePicker';
import TimePicker from './Inputs/TimePicker';

interface FieldProperties {
    id?: string;
    label?: TypeLabel;
    name: string;
    type: string;
    defer?: boolean;
    secured?: boolean;
    size?: TypeSize;
    variant?: TypeVariant;
    options?: TypeOptions;
    icon?: TypeIcon;
    description?: string;
    placeholder?: string;
}

const Input = (props: FieldProperties): JSX.Element | null => {
    const { type } = props;
    switch (type) {
        case 'text':
            return <Text {...props} />;
        case 'password':
            return <Password {...props} />;
        case 'phone':
            return <Phone {...props} />;
        case 'address':
            return <Address {...props} />;
        case 'search':
            return <Search {...props} />;
        case 'select':
            return <Select {...props} />;
        case 'toggle':
            return <Toggle {...props} />;
        case 'toggle-button':
            return <ToggleButton {...props} />;
        case 'timezone':
            return <Timezone {...props} />;
        case 'date-of-birth':
            return <DateOfBirth {...props} />;
        case 'currency':
            return <Currency {...props} />;
        case 'duration':
            return <Duration {...props} />;
        case 'editor':
            return <Editor {...props} />;
        case 'textarea':
            return <Textarea {...props} />;
        case 'image':
            return <Image {...props} />;
        case 'upload':
            return <Upload {...props} />;
        case 'transfer':
            return <Transfer {...props} />;
        case 'tinymce':
            return <TinyMce {...props} />;
        case 'date-picker':
            return <DatePicker {...props} />;
        case 'time-picker':
            return <TimePicker {...props} />;
        default:
            return null;
    }
};

export default (props: FieldProperties): JSX.Element => {
    const { id, name, label } = props;

    return (
        <label htmlFor={`${id ?? name ?? label}`} className="flex flex-col flex-1">
            <Input {...props} />
        </label>
    );
};
