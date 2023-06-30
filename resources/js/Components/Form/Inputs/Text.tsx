import React, { useContext } from 'react';

import Append from '../shared/Append';
import { ControllerContext } from '../../../Providers/Controller';
import InlineErrors from '../InlineErrors';
import Label from '../Label';
import Prepend from '../shared/Prepend';
import PrivacyBarrier from '../PrivacyBarrier';
import { TypeInput } from '../../../Types';
import Wrapper from '../shared/Wrapper';

interface TextProperties extends TypeInput {
    label?: string;

    defer?: boolean;
}

export default React.forwardRef<HTMLInputElement, TextProperties>((props, ref): JSX.Element => {
    const { bind = (): object => ({}) } = useContext(ControllerContext);
    const { id, type, name, label, defer = true, disabled, placeholder } = props;
    const { onChange, onKeyDown, onKeyUp, onFocus } = props;

    return (
        <>
            <Label {...props} />
            <Wrapper {...props}>
                <Prepend {...props} />
                <input
                    ref={ref}
                    id={`${id ?? name ?? label}`}
                    {...{ type, name, disabled, placeholder, onChange, onKeyDown, onKeyUp, onFocus }}
                    {...(onChange ? {} : bind({ defer, name }))}
                    className="outline-none bg-transparent flex-1 w-full"
                />
                <Append {...props} />
                <PrivacyBarrier {...props} />
            </Wrapper>
            <InlineErrors {...props} />
        </>
    );
});
