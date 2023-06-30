import { Data } from './Block';
import React from 'react';
export default (data: Data): JSX.Element => (
    <section className="text-gray-600 body-font overflow-hidden">
        <div className="container px-5 py-12 mx-auto">
            <div className="flex flex-wrap -m-12">
                <div className="p-12 md:w-1/2 flex flex-col items-start text-left">
                    <span className="inline-block py-1 text-blue-500 text-xs font-medium tracking-widest">
                        {data?.one?.subtitle ?? 'subtitle'}
                    </span>
                    <h2 className="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">
                        {data?.one?.title ?? 'Roof party normcore before they sold out, cornhole vape'}
                    </h2>
                    <p className="leading-relaxed mb-8 whitespace-pre-wrap">
                        {data?.one?.description ??
                            'Live-edge letterpress cliche, salvia fanny pack humblebrag narwhal portland. VHS man braid palo santo hoodie brunch trust fund. Bitters hashtag waistcoat fashion axe chia unicorn. Plaid fixie chambray 90s, slow-carb etsy tumeric. Cray pug you probably havent heard of them hexagon kickstarter craft beer pork chic.'}
                    </p>
                </div>
                <div className="p-12 md:w-1/2 flex flex-col items-start text-left">
                    <span className="inline-block py-1  text-blue-500 text-xs font-medium tracking-widest">
                        {data?.two?.subtitle ?? 'subtitle'}
                    </span>
                    <h2 className="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">
                        {data?.two?.title ?? 'Roof party normcore before they sold out, cornhole vape'}
                    </h2>
                    <p className="leading-relaxed mb-8 whitespace-pre-wrap">
                        {data?.two?.description ??
                            'Live-edge letterpress cliche, salvia fanny pack humblebrag narwhal portland. VHS man braid palo santo hoodie brunch trust fund. Bitters hashtag waistcoat fashion axe chia unicorn. Plaid fixie chambray 90s, slow-carb etsy tumeric. Cray pug you probably havent heard of them hexagon kickstarter craft beer pork chic.'}
                    </p>
                </div>
            </div>
        </div>
    </section>
);
