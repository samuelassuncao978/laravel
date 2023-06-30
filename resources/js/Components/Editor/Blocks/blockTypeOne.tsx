import React from 'react';
import { TypeEditorBlock } from '../Types';
import { TypeField } from '../../Form/Types';

export default {
    name: 'block-type-one',
    fields: [
        { type: 'text', name: 'title', label: 'Title:' } as TypeField,
        { type: 'text', name: 'subtitle', label: 'Subtitle:' } as TypeField,
        { type: 'textarea', name: 'description', label: 'Description:' } as TypeField,
        { type: 'image', name: 'image', label: 'Image:' } as TypeField,
    ],
    preview: (data) => (
        <section className="text-gray-600 body-font">
            <div className="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div className="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 className="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                        {data?.title}
                        <br className="hidden lg:inline-block" />
                        {data?.subtitle}
                    </h1>
                    <p className="mb-8 leading-relaxed whitespace-pre-wrap">{`${data?.description}`}</p>
                </div>
                <div className="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 flex items-start justify-center">
                    <img
                        className="object-cover object-center rounded "
                        alt="hero"
                        src={`https://${data?.image?.bucket}.s3.ap-southeast-2.amazonaws.com/${data?.image?.key}`}
                    />
                </div>
            </div>
        </section>
    ),
} as TypeEditorBlock;
