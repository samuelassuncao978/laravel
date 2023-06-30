
import React from 'react';
import Field from '../../Components/Form/Field';

export interface CardProps {

}

const InitialConsultation = (props: CardProps): JSX.Element => {
    return (
        <div className="flex-1 space-y-4">
            <h3 className="text-4xl">Initial Consultation</h3>
            <div className="pb-2">
                <Field type="tinymce" name="presenting" size="sm" variant="opaque" label="Presenting Complaint" defer={false} />
            </div>

            <div className="pb-2">
                <Field type="tinymce" name="complaint" size="sm" variant="opaque" label="Complaint history" defer={false} />
            </div>

            <div className="pb-2">
                <Field type="tinymce" name="medical" size="sm" variant="opaque" label="Medical history" defer={false} />
            </div>

            <div className="pb-2">
                <Field type="tinymce" name="medication" size="sm" variant="opaque" label="Medication" defer={false} />
            </div>

            <div className="pb-2">
                <Field type="tinymce" name="assessment" size="sm" variant="opaque" label="Assessment" defer={false} />
            </div>

            <div className="pb-2">
                <Field type="tinymce" name="treatment" size="sm" variant="opaque" label="Treatment" defer={false} />
            </div>

            <div className="pb-2">
                <Field type="tinymce" name="treatment_plan" size="sm" variant="opaque" label="Treatment Plan" defer={false} />
            </div>
        </div>
    );
};

export default InitialConsultation;