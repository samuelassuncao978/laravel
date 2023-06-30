import React from 'react';

interface PrivacyBarrierProperties {
    secured?: boolean;
}

export default ({ secured = false }: PrivacyBarrierProperties): JSX.Element | null => {
    return secured ? (
        <div
            className="private-field inset-0 absolute z-50 bg-white"
            style={{
                backgroundImage:
                    // eslint-disable-next-line quotes
                    "url(\"data:image/svg+xml,%3Csvg width='6' height='6' viewBox='0 0 6 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23666666' fill-opacity='0.29' fill-rule='evenodd'%3E%3Cpath d='M5 0h1L0 6V5zM6 5v1H5z'/%3E%3C/g%3E%3C/svg%3E\")",
            }}
        ></div>
    ) : null;
};
