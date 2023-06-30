import React, { useContext } from 'react';
import { Context, Controller } from '@sihq/ui-components';
import Link from '../../Components/Link';

import { LoginIcon } from '@heroicons/react/outline';

const Properties = {
    controller: 'App\\Http\\Controllers\\Authentication\\Logout',
};

const Logout = Controller(Properties, (): JSX.Element => {
    const { dispatching } = useContext(Context);
    return (
        <div className="flex flex-col items-center justify-center relative  space-y-8">
            <div className="rounded-full border-8 border-gray-200 text-blue-500 p-8">
                <LoginIcon className="h-20 w-20" />
            </div>
            <div className="text-center max-w-sm">
                {dispatching('onMount') ? (
                    <div className="font-semibold text-blue-500">Logging out...</div>
                ) : (
                    <>
                        <div className="font-semibold text-blue-500">Logged out!</div>
                        <div className="text-gray-500 text-sm mt-2">You have been successfully logged out.</div>
                        <div className="font-semibold pt-8">
                            <Link to="/">back to login</Link>
                        </div>
                    </>
                )}
            </div>
        </div>
    );
});

export default Logout;