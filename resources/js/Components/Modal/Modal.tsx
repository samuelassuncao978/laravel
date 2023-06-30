import React, { ReactNode } from 'react';
import { CSSTransition } from 'react-transition-group';

interface props {
    children: ReactNode;
}

export default function Modal({ children }: props): JSX.Element {
    return (
        <CSSTransition
            in={true}
            timeout={1000}
            classNames={{
                appear: 'transition-all transition ease-in-out duration-1000',
                // appearActive: 'bg-red-500',
                // appearDone: 'bg-red-500',
                // enter: 'my-enter',
                // enterActive: 'my-active-enter',
                // enterDone: 'my-done-enter',
                exit: 'bg-green-500 transition-all transition ease-in-out duration-1000',
                // exitActive: 'my-active-exit',
                // exitDone: 'my-done-exit',
            }}
            appear
        >
            <div className="modal  transition transition-all ease-in-out duration-1000  fixed bg-black bg-opacity-25 inset-0 z-40">
                <div className="fixed left-1/2 top-1/2 transform -translate-y-1/2 -translate-x-1/2 z-50">
                    <div className="relative bg-white shadow rounded-md ">{children}</div>
                </div>
            </div>
        </CSSTransition>
    );
}
