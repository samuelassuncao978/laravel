import React, { useContext } from 'react';
import { TypeInput, TypeOptions } from '../../../Types';

import Append from '../shared/Append';
import { ControllerContext } from '../../../Providers/Controller';
import InlineErrors from '../InlineErrors';
import Label from '../Label';
import Prepend from '../shared/Prepend';
import PrivacyBarrier from '../PrivacyBarrier';
import { SelectorIcon } from '@heroicons/react/solid';
import Wrapper from '../shared/Wrapper';

interface SelectProperties extends TypeInput {
    label?: string;

    defer?: boolean;
    options?: TypeOptions;
}

export default React.forwardRef<HTMLSelectElement, SelectProperties>((props, ref): JSX.Element => {
    const { bind = (): object => ({}) } = useContext(ControllerContext);
    const { id, type, name, label, defer = true, disabled, placeholder, options } = props;
    const { onChange, onKeyDown, onKeyUp, onFocus } = props;

    return (
        <>
            <Label {...props} />
            <Wrapper {...props}>
                <Prepend {...props} />

                <select
                    ref={ref}
                    id={`${id ?? name ?? label}`}
                    {...{ type, name, disabled, placeholder, onChange, onKeyDown, onKeyUp, onFocus }}
                    {...(onChange ? {} : bind({ defer, name }))}
                    className="outline-none bg-transparent appearance-none flex-1 w-full"
                >
                    {(options ?? []).map(({ text, value }) => {
                        return (
                            <option key={`${value}`} value={value}>
                                {text}
                            </option>
                        );
                    })}
                </select>

                <span className="h-4 w-4 flex relative -mr-1 text-gray-600">
                    <SelectorIcon />
                </span>
                <Append {...props} />
                <PrivacyBarrier {...props} />
            </Wrapper>
            <InlineErrors {...props} />
        </>
    );
});
