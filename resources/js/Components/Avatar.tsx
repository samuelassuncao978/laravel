import React from 'react';

interface Props {
    name: string;
}

function stringToHslColor(str: string, s: number, l: number) {
    let hash = 0;
    for (let i = 0; i < str.length; i++) {
        hash = str.charCodeAt(i) + ((hash << 5) - hash);
    }

    const h = hash % 360;
    return 'hsl(' + h + ', ' + s + '%, ' + l + '%)';
}

export default function Avatar({ name }: Props): JSX.Element {
    const status = false;
    const online = true;
    const image = false;
    const circle = false;
    return (
        <span className="relative h-full w-full">
            <span
                className={`overflow-hidden ${
                    circle ? 'rounded-full' : 'rounded'
                }  h-full w-full text-xs text-white bg-gray-500 flex items-center justify-center`}
            >
                {image ? (
                    <img src="{{ $image }}" alt="Brad, Martin" />
                ) : (
                    <div
                        className=" flex items-center justify-center w-full h-full uppercase"
                        style={{ backgroundColor: stringToHslColor(name, 100, 40) }}
                    >
                        <svg viewBox="0 0 21 21" className=" w-3/4 h-3/4">
                            <text
                                x="50%"
                                y="55%"
                                className="text-white fill-current"
                                dominant-baseline="middle"
                                text-anchor="middle"
                            >
                                {name
                                    .split(' ')
                                    .map((n, i, a) => (i === 0 || i + 1 === a.length ? n[0] : null))
                                    .join('')}
                            </text>
                        </svg>
                    </div>
                )}
            </span>
            {status ? (
                <svg viewBox="0 0 36 36" className="h-2 w-2 absolute bottom-0 right-0">
                    <path
                        className={`shadow-inner ${online ? 'text-green-500' : 'text-gray-500'} fill-current`}
                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                        stroke-width="2"
                    />
                    <path
                        className="stroke-current"
                        fill="none"
                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                        stroke-width="2"
                        stroke-dasharray="100, 100"
                    />
                </svg>
            ) : null}
        </span>
    );
}
