import { Data } from './Block';
import React from 'react';
export default (data: Data): JSX.Element => (
    <section className="text-gray-600 body-font text-left">
        <div className="container px-5 py-12 mx-auto">
            <div className="flex flex-wrap -mx-4 -my-8">
                <div className="py-8 px-4 lg:w-1/3">
                    <div className="h-full flex items-start">
                        <div className="flex-grow pl-6">
                            <h2 className="tracking-widest text-xs title-font font-medium text-blue-500 mb-1">
                                {data?.one?.subtitle ?? 'subtitle'}
                            </h2>
                            <h1 className="title-font text-xl font-medium text-gray-900 mb-3">
                                {data?.one?.title ?? 'title'}
                            </h1>
                            <p className="leading-relaxed mb-5 whitespace-pre-wrap">
                                {data?.one?.description ??
                                    'Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.'}
                            </p>
                        </div>
                    </div>
                </div>
                <div className="py-8 px-4 lg:w-1/3">
                    <div className="h-full flex items-start">
                        <div className="flex-grow pl-6">
                            <h2 className="tracking-widest text-xs title-font font-medium text-blue-500 mb-1">
                                {data?.two?.subtitle ?? 'subtitle'}
                            </h2>
                            <h1 className="title-font text-xl font-medium text-gray-900 mb-3">
                                {data?.two?.title ?? 'title'}
                            </h1>
                            <p className="leading-relaxed mb-5 whitespace-pre-wrap">
                                {data?.two?.description ??
                                    'Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.'}
                            </p>
                        </div>
                    </div>
                </div>
                <div className="py-8 px-4 lg:w-1/3">
                    <div className="h-full flex items-start">
                        <div className="flex-grow pl-6">
                            <h2 className="tracking-widest text-xs title-font font-medium text-blue-500 mb-1">
                                {data?.three?.subtitle ?? 'subtitle'}
                            </h2>
                            <h1 className="title-font text-xl font-medium text-gray-900 mb-3">
                                {data?.three?.title ?? 'title'}
                            </h1>
                            <p className="leading-relaxed mb-5 whitespace-pre-wrap">
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
