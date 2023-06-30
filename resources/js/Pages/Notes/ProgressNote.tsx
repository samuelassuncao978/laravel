
import React from 'react';
import Field from '../../Components/Form/Field';

export interface CardProps {
    edit?: string;
    note?: string;
}

const ProgressNote = (props: CardProps): JSX.Element => {
    const { edit, note } = props;
    return (
        <div className="flex-1 space-y-4">
            <h3 className="text-4xl">Progress Note</h3>
            <div className={`${edit == 'false' ? 'bg-gray-200' : ''} pb-2`}>
                {edit == 'false' ? (
                    <span className="text-center text-blue-500 font-bold p-2">Patient progress report</span>
                ) : (
                    <Field type="tinymce" name="assessment" size="sm" variant="opaque" label="Patient progress report" defer={false} />
                )}
            </div>

            <div className={`${edit == 'false' ? 'bg-gray-200' : ''} pb-2`}>
                {edit == 'false' ? (
                    <span className="text-center text-blue-500 font-bold p-2">Assessment</span>
                ) : (
                    <Field type="tinymce" name="assessment" size="sm" variant="opaque" label="Assessment" defer={false} />
                )}
            </div>

            <div className={`${edit == 'false' ? 'bg-gray-200' : ''} pb-2`}>
                {edit == 'false' ? (
                    <span className="text-center text-blue-500 font-bold p-2">Treatment</span>
                ) : (
                    <Field type="tinymce" name="treatment" size="sm" variant="opaque" label="Treatment" defer={false} />
                )}
            </div>
        </div>
    );
};

export default ProgressNote;