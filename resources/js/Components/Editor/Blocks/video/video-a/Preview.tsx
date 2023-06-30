import { Data } from './Block';
import React from 'react';
export default (data: Data): JSX.Element => (
    <section className="text-gray-600 body-font">
        <div className="container px-5 py-12 mx-auto">
            <div className="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 111.34"><title>video</title><path d="M23.59,0h75.7a23.68,23.68,0,0,1,23.59,23.59V87.75A23.56,23.56,0,0,1,116,104.41l-.22.2a23.53,23.53,0,0,1-16.44,6.73H23.59a23.53,23.53,0,0,1-16.66-6.93l-.2-.22A23.46,23.46,0,0,1,0,87.75V23.59A23.66,23.66,0,0,1,23.59,0ZM54,47.73,79.25,65.36a3.79,3.79,0,0,1,.14,6.3L54.22,89.05a3.75,3.75,0,0,1-2.4.87A3.79,3.79,0,0,1,48,86.13V50.82h0A3.77,3.77,0,0,1,54,47.73ZM7.35,26.47h14L30.41,7.35H23.59A16.29,16.29,0,0,0,7.35,23.59v2.88ZM37.05,7.35,28,26.47H53.36L62.43,7.38v0Zm32,0L59.92,26.47h24.7L93.7,7.35Zm31.32,0L91.26,26.47h24.27V23.59a16.32,16.32,0,0,0-15.2-16.21Zm15.2,26.68H7.35V87.75A16.21,16.21,0,0,0,12,99.05l.17.16A16.19,16.19,0,0,0,23.59,104h75.7a16.21,16.21,0,0,0,11.3-4.6l.16-.18a16.17,16.17,0,0,0,4.78-11.46V34.06Z" /></svg>
                <span className="inline-block h-1 w-10 rounded bg-blue-500 mt-8 mb-6"></span>
                <h2 className="text-gray-900 font-medium title-font tracking-wider text-sm">
                    {data?.author ?? 'HOLDEN CAULFIELD'}
                </h2>
                <p className="text-gray-500">{data?.title ?? 'Senior Product Designer'}</p>
            </div>
        </div>
    </section>
);
