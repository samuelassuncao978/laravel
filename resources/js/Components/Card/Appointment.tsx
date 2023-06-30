import Moment from 'react-moment';
import React from 'react';
import _ from 'lodash';
import moment from 'moment';

export interface CardProps {
    address?: string;
    name?: string;
    type?: string;
    date?: string;
    time?: string;
}

const Appointment = (props: CardProps): JSX.Element => {
    const { address, name, type, date, time } = props;
    return (
        <div className="h-full w-full cursor-default overflow-hidden relative group ease-in-out">
            <h3 className="text-black text-lg title-font font-medium mb-2">{name}</h3>
            <div className="flex justify-between w-full mb-3">
                <div className="flex items-center text-sm text-black/70 dark:text-white/50 space-x-2">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.23403 1.43818C9.23403 0.97638 9.60841 0.602051 10.0702 0.602051C10.5319 0.602051 10.9063 0.97638 10.9063 1.43818V2.43389H11.6334C12.5569 2.43389 13.3057 3.1826 13.3057 4.10615V12.2264C13.3057 13.15 12.5569 13.8986 11.6334 13.8986H1.72968C0.806185 13.8986 0.0574245 13.15 0.0574245 12.2264V4.10615C0.0574245 3.1826 0.806185 2.43389 1.72968 2.43389H2.56867V1.43818C2.56867 0.97638 2.94305 0.602051 3.4048 0.602051C3.86655 0.602051 4.24093 0.97638 4.24093 1.43818V2.43389H9.23403V1.43818ZM9.96033 4.73217C10.4209 4.73217 10.7944 5.10558 10.7944 5.56626C10.7944 6.02689 10.4209 6.40035 9.96033 6.40035H3.40235C2.94183 6.40035 2.56867 6.02689 2.56867 5.56626C2.56867 5.10558 2.94183 4.73217 3.40235 4.73217H9.96033Z" fill="#4B84EE" />
                    </svg>

                    <span className="text-center text-gray-600">
                        <Moment format="dddd MMMM Do">{date}</Moment>
                    </span>
                </div>
            </div>
            <div className="flex justify-between w-full mb-3">
                <div className="flex items-center text-sm text-black/70 dark:text-white/50 space-x-2">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99987 13.7927C10.7515 13.7927 13.7927 10.7515 13.7927 6.99987C13.7927 3.24829 10.7515 0.207031 6.99987 0.207031C3.24829 0.207031 0.207031 3.24829 0.207031 6.99987C0.207031 10.7515 3.24829 13.7927 6.99987 13.7927ZM7.25564 2.98818C7.72583 2.98818 8.107 3.36934 8.107 3.83953V6.41855C8.107 6.69975 8.22539 6.96795 8.43317 7.15743L9.97255 8.56128C10.3237 8.88149 10.3476 9.42614 10.0259 9.77589C9.70955 10.1197 9.17624 10.1472 8.82625 9.83773L6.74183 7.99445C6.52719 7.80464 6.40428 7.53187 6.40428 7.24534V3.83953C6.40428 3.36934 6.78545 2.98818 7.25564 2.98818Z" fill="#4B84EE" />
                    </svg>

                    <span className="text-center text-gray-600">
                        <Moment date={time} format="hh:mm a" />
                    </span>
                </div>
            </div>

            <div className="flex justify-between w-full mb-3">
                <div className="flex items-center text-sm text-black/70 dark:text-white/50 space-x-2">
                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.59983 14.8078C5.23672 14.092 0.864614 11.4579 0.864614 7.1175C0.864614 3.72865 3.61182 0.981445 7.00067 0.981445C10.3895 0.981445 13.1367 3.72865 13.1367 7.1175C13.1367 11.4579 8.76461 14.092 7.40151 14.8078C7.14931 14.9402 6.85202 14.9402 6.59983 14.8078ZM7.00067 9.74723C5.5483 9.74723 4.37093 8.56986 4.37093 7.1175C4.37093 5.66513 5.5483 4.48776 7.00067 4.48776C8.45303 4.48776 9.6304 5.66513 9.6304 7.1175C9.6304 8.56986 8.45303 9.74723 7.00067 9.74723Z" fill="#4B84EE" />
                    </svg>
                    {type == 'video-call' ? (
                        <span className="text-center text-gray-600">Attend Appointment</span>
                    ) : type == 'telephone-call' ? (
                        <span className="text-center text-gray-600">Await Call</span>
                    ) : (
                        <span className="text-center text-gray-600">{address}</span>
                    )}
                </div>
            </div>
        </div>
    );
};

export default Appointment;