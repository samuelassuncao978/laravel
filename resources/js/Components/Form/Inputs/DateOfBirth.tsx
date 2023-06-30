import React, { useContext } from 'react';

import Text from './Text';

import CurrencyFormat from 'react-currency-format';

import { ControllerContext } from '../../../Providers/Controller';
import Conditional from '../../Conditional';

interface DateOfBirthProperties {
    id?: string;
    label?: string;
    name: string;
    type: string;
    defer?: boolean;
}

export default (props: DateOfBirthProperties): JSX.Element => {
    const { name } = props;
    const { value, setValue } = useContext(ControllerContext);

    function calculateAge() {
        const dob = `${value(name)}`.split(' / ');
        console.log('running', dob);
        const today = new Date();
        let age = today.getFullYear() - Number(dob[2]);
        if (
            today.getMonth() < Number(dob[1]) ||
            (today.getMonth() == Number(dob[1]) && today.getDate() < Number(dob[0]))
        ) {
            age--;
        }
        return age;
    }

    function limit(val: any, max: any) {
        if (val.length === 1 && val[0] > max[0]) {
            val = '0' + val;
        }

        if (val.length === 2) {
            if (Number(val) === 0) {
                val = '01';

                //this can happen when user paste number
            } else if (val > max) {
                val = max;
            }
        }

        return val;
    }

    function cardExpiry(val: any) {
        const day = limit(val.substring(0, 2), '31');
        const month = limit(val.substring(2, 4), '12');
        const year = limit(val.substring(4, 8), '2021');

        return day + ' / ' + month + (year.length ? ' / ' + year : '');
    }

    const Append = (): JSX.Element => (
        <span className="flex flex-shrink-0 items-center justify-center ml-2">
            <Conditional expresion={!!calculateAge()}>
                <span className="flex text-gray-500 items-center space-x-1 text-xs bg-gray-100 rounded-full p-0.5 px-2">
                    <span className="font-bold" style={{ fontSize: 10 }}>
                        {calculateAge()}
                    </span>
                    <span className="opacity-75" style={{ fontSize: 10 }}>
                        Y/O
                    </span>
                </span>
            </Conditional>
        </span>
    );

    return (
        <>
            <CurrencyFormat
                onValueChange={(values) => {
                    const { value } = values;
                    // formattedValue = $2,223
                    // value ie, 2223
                    // console.log('onc', values);
                    // setValue(name, value);
                }}
                customInput={(p): JSX.Element => <Text {...props} {...p} append={<Append />} />}
                format={cardExpiry}
            />
        </>
    );
};
