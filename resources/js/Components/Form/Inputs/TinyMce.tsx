import React, { ReactNode, useContext, useState } from 'react';
import { ControllerContext } from '../../../Providers/Controller';
import InlineErrors from '../InlineErrors';
import Label from '../Label';
import PrivacyBarrier from '../PrivacyBarrier';
import { Editor } from '@tinymce/tinymce-react';

// @ts-ignore
interface TextProperties extends React.InputHTMLAttributes<HTMLTextAreaElement> {
    id?: string;
    label?: string;
    name: string;
    type: string;
    defer?: boolean;
    prepend?: ReactNode;
    append?: ReactNode;
    size?: string;
    variant?: string;
}

export default React.forwardRef<HTMLTextAreaElement, TextProperties>((props, ref): JSX.Element => {
    const { bind = (): object => ({}) } = useContext(ControllerContext);
    const initialText = 'The quick brown fox jumps over the lazy dog';
const [text, setText] = useState(initialText);
    const {
        id,
        type,
        name,
        label,
        defer = true,
        append,
        prepend,
        disabled,
        variant = 'basic',
        placeholder,
        size = 'sm',
        onChange,
        onFocus,
    } = props;

    return (
        <>
            <Label>{label}</Label>

            <span className="outline-none bg-transparent flex-1 w-full">
                {prepend}
                <Editor
                    apiKey='8aiaq16fygumut8qxrh0s3f7uf5ffuwsrsxcmao4njkwhqrt'
                    init={{
                        height: `${size === 'sm' ? 200 : ''}${size === 'xs' ? 300 : ''}`,
                        menubar: false,
                        statusbar: false,
                        plugins: 'lists link code',
                        toolbar: 'bold italic | bullist numlist | link | alignleft aligncenter alignright | code'
                    }}
                    {...{ type, name, disabled, placeholder }}
                    {...(onChange ? {} : bind({ defer, name }))}
                />
                {append}
                <PrivacyBarrier />
            </span>
            <InlineErrors {...props} />
        </>
    );
});
