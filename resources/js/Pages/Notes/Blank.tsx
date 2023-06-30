
import React from 'react';
import Field from '../../Components/Form/Field';

export interface CardProps {

}

const Blank = (props: CardProps): JSX.Element => {
    return (
        <div className="flex-1 space-y-4">
            <div className="pb-2">
                <Field type="tinymce" name="homework" size="sm" variant="opaque" defer={false} />
            </div>
        </div>
    );
};

export default Blank;