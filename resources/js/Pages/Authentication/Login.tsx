import { Button, Field } from '@sihq/ui-components';
import { Context, Controller } from '@sihq/ui-components';
import React, { SyntheticEvent, useContext, useState } from 'react';

import Helmet from 'react-helmet';
import { Link } from 'react-router-dom';

const Properties = {
    controller: 'App\\Http\\Controllers\\Authentication\\Login',
};

const Login = Controller(Properties, (): JSX.Element => {
    const { dispatch, dispatching } = useContext(Context);
    const [startDate, setStartDate] = useState(new Date());
    const onSubmit = (e: SyntheticEvent): void => {
        dispatch('submit');
        e.preventDefault();
    };
    return (
        <form {...{ onSubmit }} method="post" className="flex flex-col max-w-sm w-full relative">
            <Helmet>
                <meta charSet="utf-8" />
                <title>Login - Foremind</title>
            </Helmet>
            <div className="text-3xl text-blue-600 mb-8">Sign in</div>
            <div className="flex flex-col space-y-4">
                <div className="flex flex-col">
                    <Field type="text" label="Email" name="email" />
                </div>
                <div className="flex flex-col">
                    <Field type="password" label="Password" name="password" />
                </div>
                <div className="flex items-center justify-between">
                    <div className="flex items-center">
                        <Field type="checkbox" label="remember me" name="remember" />
                    </div>
                    <div className="text-xs">
                        <Link to="/forgot" className="hover:text-blue-500 hover:underline">
                            Forgot your password?
                        </Link>
                    </div>
                </div>
                <div className="flex items-center pt-4 space-x-4">
                    <span>
                        <Button variant="primary" type="submit" disabled={dispatching('submit')}>
                            {dispatching('submit') ? 'checking...' : 'Sign in'}
                        </Button>
                    </span>
                    {/* <span className="text-gray-500">or</span>
                    <span className="font-semibold text-sm">
                        <a href="/register">Sign up here</a>
                    </span> */}
                </div>
            </div>
        </form>
    );
});

export default Login;