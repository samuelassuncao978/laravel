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

interface ImageProperties extends TypeInput {
    label?: string;
    defer?: boolean;
}

export default React.forwardRef<HTMLInputElement, ImageProperties>((props, ref): JSX.Element => {
    const { setValue, value } = useContext(ControllerContext);
    const { id, name, label, defer = true, disabled, placeholder } = props;
    const { onChange, onKeyDown, onKeyUp, onFocus } = props;

    const [uploadProgress, setUploadProcess] = useState(0);

    function upload(e: SyntheticEvent) {
        // @ts-ignore
        const fileName = e.target.files[0].name;
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
            setValue(name, {
                uuid: response.uuid,
                key: response.key,
                bucket: response.bucket,
                name: fileName,
                content_type: type,
            });
        });
    }

    return (
        <>
            <Label {...props} />
            <Wrapper {...props}>
                <Prepend {...props} />

                <div className="flex flex-col relative">
                    <div className="flex">
                        <div>
                            {value(name) ? (
                                <div
                                    className="h-5 w-5 bg-gray-700 rounded mr-2 bg-center bg-cover"
                                    style={{
                                        backgroundImage: `url(https://${
                                            // @ts-ignore
                                            value(name)?.bucket
                                        }.s3.ap-southeast-2.amazonaws.com/${
                                            // @ts-ignore
                                            value(name)?.key
                                        })`,
                                    }}
                                ></div>
                            ) : null}
                        </div>
                        <input
                            type="file"
                            accept="image/png, image/jpeg, image/jpg, video/mp4,video/x-m4v,video/*"
                            ref={ref}
                            id={`${id ?? name ?? label}`}
                            {...{ name, disabled, placeholder, onChange, onKeyDown, onKeyUp, onFocus }}
                            {...(onChange ? {} : { onChange: upload })}
                            className="outline-none bg-transparent flex-1 w-full"
                        />
                    </div>
                    <div
                        className={`h-1 absolute -bottom-2 left-0 right-0  w-full overflow-hidden ${
                            uploadProgress === 0 || uploadProgress === 100 ? 'hidden' : 'flex'
                        }`}
                    >
                        <div className="h-2  bg-gray-400 shadow-inner w-full rounded-full">
                            <div
                                className="h-2 bg-green-500 rounded-full"
                                style={{ width: `${uploadProgress}%` }}
                            ></div>
                        </div>
                    </div>
                </div>

                <Append {...props} />
                <PrivacyBarrier {...props} />
            </Wrapper>
            <InlineErrors {...props} />
        </>
    );
});
