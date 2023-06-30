import React from 'react';

import Text from './Text';
import CurrencyFormat from 'react-currency-format';
import { ClockIcon } from '@heroicons/react/outline';

interface DurationProperties {
    id?: string;
    label?: string;
    name: string;
    type: string;
    defer?: boolean;
}

export default (props: DurationProperties): JSX.Element => {
    const Prepend = (): JSX.Element => (
        <span className="flex flex-shrink-0 items-center justify-center mr-2 text-gray-500 text-xs">
            <ClockIcon className="h-3 w-3" />
        </span>
    );

    return (
        <>
            <CurrencyFormat
                customInput={(p): JSX.Element => <Text {...props} {...p} prepend={<Prepend />} />}
                format="#.##"
                decimalScale={2}
                fixedDecimalScale
            />
        </>
    );
};
