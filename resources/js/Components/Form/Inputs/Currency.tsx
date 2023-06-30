import React from 'react';

import Text from './Text';
import CurrencyFormat from 'react-currency-format';

interface CurrencyProperties {
    id?: string;
    label?: string;
    name: string;
    type: string;
    defer?: boolean;
}

export default (props: CurrencyProperties): JSX.Element => {
    const Prepend = (): JSX.Element => (
        <span className="flex flex-shrink-0 items-center justify-center mr-2 text-gray-500 text-xs">
            <span className="opacity-75">AUD</span> <span className="font-bold ml-1">$</span>
        </span>
    );

    return (
        <>
            <CurrencyFormat
                customInput={(p): JSX.Element => <Text {...props} {...p} prepend={<Prepend />} />}
                thousandSeparator={true}
                decimalScale={2}
                fixedDecimalScale
            />
        </>
    );
};
