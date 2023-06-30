import React, { SyntheticEvent, useContext, useState } from 'react';

import Append from '../shared/Append';
import { ControllerContext } from '../../../Providers/Controller';
import InlineErrors from '../InlineErrors';
import Label from '../Label';
import Prepend from '../shared/Prepend';
import PrivacyBarrier from '../PrivacyBarrier';
import { TypeInput } from '../../../Types';
import Vapor from 'laravel-vapor';
import Wrapper from '../shared/Wrapper';

interface UploadProperties extends TypeInput {
    label?: string;
    defer?: boolean;
}

export default React.forwardRef<HTMLInputElement, UploadProperties>((props, ref): JSX.Element => {
    const { setValue, value } = useContext(ControllerContext);
    const { id, name, label, defer = true, disabled, placeholder } = props;
    const [fileName, setFileName] = useState("")
    const { onChange, onKeyDown, onKeyUp, onFocus } = props;

    const [uploadProgress, setUploadProcess] = useState(0);

    function upload(e: SyntheticEvent) {
        // @ts-ignore
        const file = e.target.files[0].name;
        // @ts-ignore
        const type = e.target.files[0].type;
        // @ts-ignore
        Vapor.store(e.target.files[0], {
            visibility: 'public-read',
            // @ts-ignore
            progress: (progress: number) => {
                setUploadProcess(Math.round(progress * 100));
            },
        }).then((response) => {
            setFileName(file);
            setValue(name, {
                uuid: response.uuid,
                key: response.key,
                bucket: response.bucket,
                name: file,
                content_type: type,
            });
        });
    }

    return (
        <>
            <Label {...props} />
            <div className="flex justify-center items-center w-full">
                <label htmlFor="input-file-upload" className="flex flex-col justify-center items-center w-full h-48 bg-gray-50 rounded border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div className="flex flex-col justify-center items-center pt-5 pb-6">
                        <svg className="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p className="mb-2 text-base text-gray-500 dark:text-gray-400">Drag & drop or press to upload photo</p>
                    </div>
                    <input
                        type="file"
                        accept="image/png, image/jpeg, image/jpg, application/pdf"
                        ref={ref}
                        id="input-file-upload"
                        {...{ name, disabled, placeholder, onChange, onKeyDown, onKeyUp, onFocus }}
                        {...(onChange ? {} : { onChange: upload })}
                        className="hidden"
                    />
                </label>
            </div>
            <InlineErrors {...props} />
        </>
    );
});
