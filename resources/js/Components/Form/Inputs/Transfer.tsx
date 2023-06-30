import { TypeIcon, TypeLabel, TypeOptions, TypeSize, TypeVariant } from '../../../Types';

import Label from '../Label';
import React from 'react';

interface Props {
    label?: TypeLabel;
    options?: TypeOptions;
    variant?: TypeVariant;
    size?: TypeSize;
    icon?: TypeIcon;
}

const Transfer = ({ options, label }: Props): JSX.Element | null => {
    <Label>{label}</Label>;

    console.log(options);

    return <></>;
};

export default Transfer;
