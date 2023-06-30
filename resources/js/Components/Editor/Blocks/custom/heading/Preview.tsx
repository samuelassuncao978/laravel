import { Data } from './Block';
import React from 'react';
export default (data: Data): JSX.Element => (
    <section className="text-gray-600 body-font text-left">
        <div className="container px-5 py-6 mx-auto">
            <div className="text-2xl font-bold">{data?.title ?? 'title'}</div>
        </div>
    </section>
);
