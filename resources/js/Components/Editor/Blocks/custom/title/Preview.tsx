import { Data } from './Block';
import React from 'react';
export default (data: Data): JSX.Element => (
    <section className="text-gray-600 body-font text-left">
        <div className="container px-5 pt-6 pb-12 mx-auto">
            <div className="flex items-center justify-center">
                <img
                    className="lg:h-64 md:h-48 w-full object-cover object-center rounded-lg"
                    src={
                        data?.image
                            ? `https://${data?.image?.bucket}.s3.ap-southeast-2.amazonaws.com/${data?.image?.key}`
                            : 'https://dummyimage.com/720x400'
                    }
                    alt="blog"
                />
            </div>
            <div className="text-2xl font-bold mt-5">{data?.title ?? 'title'}</div>
        </div>
    </section>
);
