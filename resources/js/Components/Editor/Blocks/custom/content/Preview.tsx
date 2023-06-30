import { Data } from './Block';
import React from 'react';
export default (data: Data): JSX.Element => (
    <section className="text-gray-600 body-font text-left">
        <div className="container px-5 px-6 mx-auto">
            <div className="whitespace-pre-wrap">{data?.content ?? 'content'}</div>
        </div>
    </section>
);
