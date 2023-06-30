import React from 'react';

interface Props {
    size?: string;
    variant?: string;
    label: string;
}

const variants: { [key: string]: { [key: string]: string } } = {
    red: { dot: ' bg-red-600', label: 'text-red-600' },
    green: { dot: ' bg-green-600', label: 'text-green-600' },
    yellow: { dot: ' bg-yellow-600', label: 'text-yellow-600' },
    gray: { dot: ' bg-gray-600', label: 'text-gray-600' },
};

const sizes: { [key: string]: { [key: string]: string } } = {
    xs: { dot: ' h-2 w-2', label: 'text-xs' },
    sm: { dot: ' h-4 w-4', label: 'text-xs' },
    md: { dot: ' h-4 w-4', label: 'text-sm' },
    xl: { dot: ' h-2 w-2', label: 'text-xs' },
};

export default function Status({ size = 'md', variant = 'green', label }: Props): JSX.Element {
    return (
        <div className="flex items-center space-x-1">
            <span className={`${sizes[size].dot} ${variants[variant].dot} rounded-full  block`}></span>
            <span className={`${sizes[size].label} ${variants[variant].label} font-bold`}>{label}</span>
        </div>
    );
}
