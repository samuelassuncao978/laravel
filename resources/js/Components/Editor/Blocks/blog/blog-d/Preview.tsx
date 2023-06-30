import { Data } from './Block';
import React from 'react';
export default (data: Data): JSX.Element => (
    <section className="text-gray-600 body-font overflow-hidden text-left">
        <div className="container px-5 py-12 mx-auto">
            <div className="-my-8 divide-y-2 divide-gray-100">
                <div className="py-8 flex flex-wrap md:flex-nowrap">
                    <div className="md:flex-grow">
                        <h2 className="text-2xl font-medium text-gray-900 title-font mb-2">
                            {data?.one?.title ?? 'title'}
                        </h2>
                        <p className="leading-relaxed whitespace-pre-wrap">
                            {data?.one?.description ??
                                'Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.'}
                        </p>
                    </div>
                </div>
                <div className="py-8 flex flex-wrap md:flex-nowrap">
                    <div className="md:flex-grow">
                        <h2 className="text-2xl font-medium text-gray-900 title-font mb-2">
                            {data?.two?.title ?? 'title'}
                        </h2>
                        <p className="leading-relaxed whitespace-pre-wrap">
                            {data?.two?.description ??
                                'Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.'}
                        </p>
                    </div>
                </div>
                <div className="py-8 flex flex-wrap md:flex-nowrap">
                    <div className="md:flex-grow">
                        <h2 className="text-2xl font-medium text-gray-900 title-font mb-2">
                            {data?.three?.title ?? 'title'}
                        </h2>
                        <p className="leading-relaxed whitespace-pre-wrap">
                            {data?.three?.description ??
                                'Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.'}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
);
