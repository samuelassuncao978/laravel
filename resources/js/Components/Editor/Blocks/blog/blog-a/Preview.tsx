import { Data } from './Block';
import React from 'react';
export default (data: Data): JSX.Element => (
    <section className="text-gray-600 body-font">
        <div className="container px-5 py-12 mx-auto">
            <div className="flex flex-wrap -m-4">
                <div className="p-4 md:w-1/3">
                    <div className="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img
                            className="lg:h-48 md:h-36 w-full object-cover object-center"
                            src={
                                data?.one?.image
                                    ? `https://${data?.one?.image?.bucket}.s3.ap-southeast-2.amazonaws.com/${data?.one?.image?.key}`
                                    : 'https://dummyimage.com/720x400'
                            }
                            alt="blog"
                        />
                        <div className="p-6 text-left">
                            <h2 className="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 uppercase">
                                {data?.one?.subtitle ?? 'subtitle'}
                            </h2>
                            <h1 className="title-font text-lg font-medium text-gray-900 mb-3">
                                {data?.one?.title ?? 'title'}
                            </h1>
                            <p className="leading-relaxed mb-3 whitespace-pre-wrap">
                                {data?.one?.description ??
                                    'Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.'}
                            </p>
                        </div>
                    </div>
                </div>
                <div className="p-4 md:w-1/3">
                    <div className="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img
                            className="lg:h-48 md:h-36 w-full object-cover object-center"
                            src={
                                data?.two?.image
                                    ? `https://${data?.two?.image?.bucket}.s3.ap-southeast-2.amazonaws.com/${data?.two?.image?.key}`
                                    : 'https://dummyimage.com/720x400'
                            }
                            alt="blog"
                        />
                        <div className="p-6 text-left">
                            <h2 className="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 uppercase">
                                {data?.two?.subtitle ?? 'subtitle'}
                            </h2>
                            <h1 className="title-font text-lg font-medium text-gray-900 mb-3">
                                {data?.two?.title ?? 'title'}
                            </h1>
                            <p className="leading-relaxed mb-3 whitespace-pre-wrap">
                                {data?.two?.description ??
                                    'Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.'}
                            </p>
                        </div>
                    </div>
                </div>
                <div className="p-4 md:w-1/3">
                    <div className="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img
                            className="lg:h-48 md:h-36 w-full object-cover object-center"
                            src={
                                data?.three?.image
                                    ? `https://${data?.three?.image?.bucket}.s3.ap-southeast-2.amazonaws.com/${data?.three?.image?.key}`
                                    : 'https://dummyimage.com/720x400'
                            }
                            alt="blog"
                        />
                        <div className="p-6 text-left">
                            <h2 className="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 uppercase">
                                {data?.three?.subtitle ?? 'subtitle'}
                            </h2>
                            <h1 className="title-font text-lg font-medium text-gray-900 mb-3">
                                {data?.three?.title ?? 'title'}
                            </h1>
                            <p className="leading-relaxed mb-3 whitespace-pre-wrap">
                                {data?.three?.description ??
                                    'Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.'}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
);
