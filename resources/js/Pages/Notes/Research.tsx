
import React from 'react';
import Field from '../../Components/Form/Field';

export interface CardProps {

}

const Research = (props: CardProps): JSX.Element => {
    return (
        <div className="flex-1 space-y-4">
            <h3 className="text-4xl">Research</h3>
            <div className="pb-2">
                <Field type="tinymce" name="homework" size="sm" variant="opaque" label="Homework" defer={false} />
            </div>

            <div className="pb-2">
                <Field type="tinymce" name="client_excerpt" size="sm" variant="opaque" label="Client Excerpt" defer={false} />
            </div>

            <div className="pb-2">
                <Field type="tinymce" name="topics_covered" size="sm" variant="opaque" label="Topics Covered" defer={false} />
            </div>

            <div className="pb-2">
                <Field type="tinymce" name="observation" size="sm" variant="opaque" label="Today's Observation" defer={false} />
            </div>

            <div className="pb-2">
                <div className="flex mb-2">
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="abuse" value="option1" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="abuse">Abuse</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="accommodation" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="accommodation">Accommodation</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="additions" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="additions">Additions</label>
                        </div>
                    </div>
                </div>
                <div className="flex mb-2">
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="alchol" value="option1" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="alchol">Alcolhol and other drugs</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="anger" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="anger">Anger management</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="anxiety" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="anxiety">Anxiety</label>
                        </div>
                    </div>
                </div>
                <div className="flex mb-2">
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="bullying" value="option1" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="bullying">Bullying</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="crisis" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="crisis">Crisis Support</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="depression" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="depression">Depression</label>
                        </div>
                    </div>
                </div>
                <div className="flex mb-2">
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="employment" value="option1" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="employment">Employment</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="financial" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="financial">Financial Support</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="forgiveness" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="forgiveness">Forgiveness</label>
                        </div>
                    </div>
                </div>
                <div className="flex mb-2">
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="grief" value="option1" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="grief">Grief & Loss</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="identity" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="identity">Identity</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="mental" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="mental">Mental Health</label>
                        </div>
                    </div>
                </div>
                <div className="flex mb-2">
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="parenting" value="option1" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="parenting">Parenting</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="relationships" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="relationships">Relationships</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="shame" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="shame">Shame</label>
                        </div>
                    </div>
                </div>
                <div className="flex mb-2">
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="stress" value="option1" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="stress">Stress</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="suicide" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="suicide">Suicide</label>
                        </div>
                    </div>
                    <div className="lg:w-1/3 w-1/2">
                        <div className="form-check">
                            <input className="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="trauma" value="option2" />
                                <label className="form-check-label inline-block text-gray-800" htmlFor="trauma">Trauma</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Research;