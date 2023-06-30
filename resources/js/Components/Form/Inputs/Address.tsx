import { HomeIcon } from '@heroicons/react/solid';
import React from 'react';
import { usePlacesWidget } from 'react-google-autocomplete';

import Text from './Text';

interface AddressProperties {
    id?: string;
    label?: string;
    name: string;
    type: string;
    defer?: boolean;
}

export const STREET_TYPE = [
    {
        value: 'Access',
        label: 'Access',
    },
    {
        value: 'Alley',
        label: 'Alley',
    },
    {
        value: 'Alleyway',
        label: 'Alleyway',
    },
    {
        value: 'Amble',
        label: 'Amble',
    },
    {
        value: 'Anchorage',
        label: 'Anchorage',
    },
    {
        value: 'Approach',
        label: 'Approach',
    },
    {
        value: 'Arcade',
        label: 'Arcade',
    },
    {
        value: 'Arterial',
        label: 'Arterial',
    },
    {
        value: 'Artery',
        label: 'Artery',
    },
    {
        value: 'Avenue',
        label: 'Avenue',
    },
    {
        value: 'Banan',
        label: 'Banan',
    },
    {
        value: 'Bank',
        label: 'Bank',
    },
    {
        value: 'Basin',
        label: 'Basin',
    },
    {
        value: 'Bay',
        label: 'Bay',
    },
    {
        value: 'Beach',
        label: 'Beach',
    },
    {
        value: 'Bend',
        label: 'Bend',
    },
    {
        value: 'Block',
        label: 'Block',
    },
    {
        value: 'Boardwalk',
        label: 'Boardwalk',
    },
    {
        value: 'Boulevard',
        label: 'Boulevard',
    },
    {
        value: 'Boulevarde',
        label: 'Boulevarde',
    },
    {
        value: 'Bowl',
        label: 'Bowl',
    },
    {
        value: 'Brace',
        label: 'Brace',
    },
    {
        value: 'Brae',
        label: 'Brae',
    },
    {
        value: 'Break',
        label: 'Break',
    },
    {
        value: 'Bridge',
        label: 'Bridge',
    },
    {
        value: 'Broadway',
        label: 'Broadway',
    },
    {
        value: 'Brow',
        label: 'Brow',
    },
    {
        value: 'Bypass',
        label: 'Bypass',
    },
    {
        value: 'Byway',
        label: 'Byway',
    },
    {
        value: 'Canal',
        label: 'Canal',
    },
    {
        value: 'Causeway',
        label: 'Causeway',
    },
    {
        value: 'Centre',
        label: 'Centre',
    },
    {
        value: 'Centreway',
        label: 'Centreway',
    },
    {
        value: 'Chase',
        label: 'Chase',
    },
    {
        value: 'Circle',
        label: 'Circle',
    },
    {
        value: 'Circlet',
        label: 'Circlet',
    },
    {
        value: 'Circuit',
        label: 'Circuit',
    },
    {
        value: 'Circus',
        label: 'Circus',
    },
    {
        value: 'Close',
        label: 'Close',
    },
    {
        value: 'Cluster',
        label: 'Cluster',
    },
    {
        value: 'Colonnade',
        label: 'Colonnade',
    },
    {
        value: 'Common',
        label: 'Common',
    },
    {
        value: 'Concourse',
        label: 'Concourse',
    },
    {
        value: 'Connection',
        label: 'Connection',
    },
    {
        value: 'Copse',
        label: 'Copse',
    },
    {
        value: 'Corner',
        label: 'Corner',
    },
    {
        value: 'Corso',
        label: 'Corso',
    },
    {
        value: 'Course',
        label: 'Course',
    },
    {
        value: 'Court',
        label: 'Court',
    },
    {
        value: 'Courtyard',
        label: 'Courtyard',
    },
    {
        value: 'Cove',
        label: 'Cove',
    },
    {
        value: 'Crescent',
        label: 'Crescent',
    },
    {
        value: 'Crest',
        label: 'Crest',
    },
    {
        value: 'Cross',
        label: 'Cross',
    },
    {
        value: 'Crossing',
        label: 'Crossing',
    },
    {
        value: 'Crossroad',
        label: 'Crossroad',
    },
    {
        value: 'Crossway',
        label: 'Crossway',
    },
    {
        value: 'Cruiseway',
        label: 'Cruiseway',
    },
    {
        value: 'Cul-De-Sac',
        label: 'Cul-De-Sac',
    },
    {
        value: 'Cutting',
        label: 'Cutting',
    },
    {
        value: 'Dale',
        label: 'Dale',
    },
    {
        value: 'Dell',
        label: 'Dell',
    },
    {
        value: 'Dene',
        label: 'Dene',
    },
    {
        value: 'Deviation',
        label: 'Deviation',
    },
    {
        value: 'Dip',
        label: 'Dip',
    },
    {
        value: 'Distributor',
        label: 'Distributor',
    },
    {
        value: 'Divide',
        label: 'Divide',
    },
    {
        value: 'Dock',
        label: 'Dock',
    },
    {
        value: 'Domain',
        label: 'Domain',
    },
    {
        value: 'Drive',
        label: 'Drive',
    },
    {
        value: 'Driveway',
        label: 'Driveway',
    },
    {
        value: 'Edge',
        label: 'Edge',
    },
    {
        value: 'Elbow',
        label: 'Elbow',
    },
    {
        value: 'End',
        label: 'End',
    },
    {
        value: 'Entrance',
        label: 'Entrance',
    },
    {
        value: 'Esplanade',
        label: 'Esplanade',
    },
    {
        value: 'Estate',
        label: 'Estate',
    },
    {
        value: 'Estuary',
        label: 'Estuary',
    },
    {
        value: 'Expressway',
        label: 'Expressway',
    },
    {
        value: 'Extension',
        label: 'Extension',
    },
    {
        value: 'Fairway',
        label: 'Fairway',
    },
    {
        value: 'Fire Track',
        label: 'Fire Track',
    },
    {
        value: 'Firebreak',
        label: 'Firebreak',
    },
    {
        value: 'Fireline',
        label: 'Fireline',
    },
    {
        value: 'Firetrack',
        label: 'Firetrack',
    },
    {
        value: 'Firetrail',
        label: 'Firetrail',
    },
    {
        value: 'Flat',
        label: 'Flat',
    },
    {
        value: 'Follow',
        label: 'Follow',
    },
    {
        value: 'Footway',
        label: 'Footway',
    },
    {
        value: 'Ford',
        label: 'Ford',
    },
    {
        value: 'Foreshore',
        label: 'Foreshore',
    },
    {
        value: 'Formation',
        label: 'Formation',
    },
    {
        value: 'Freeway',
        label: 'Freeway',
    },
    {
        value: 'Front',
        label: 'Front',
    },
    {
        value: 'Frontage',
        label: 'Frontage',
    },
    {
        value: 'Gap',
        label: 'Gap',
    },
    {
        value: 'Garden',
        label: 'Garden',
    },
    {
        value: 'Gardens',
        label: 'Gardens',
    },
    {
        value: 'Gate',
        label: 'Gate',
    },
    {
        value: 'Gates',
        label: 'Gates',
    },
    {
        value: 'Gateway',
        label: 'Gateway',
    },
    {
        value: 'Glade',
        label: 'Glade',
    },
    {
        value: 'Glen',
        label: 'Glen',
    },
    {
        value: 'Grange',
        label: 'Grange',
    },
    {
        value: 'Green',
        label: 'Green',
    },
    {
        value: 'Ground',
        label: 'Ground',
    },
    {
        value: 'Grove',
        label: 'Grove',
    },
    {
        value: 'Gully',
        label: 'Gully',
    },
    {
        value: 'Harbour',
        label: 'Harbour',
    },
    {
        value: 'Heath',
        label: 'Heath',
    },
    {
        value: 'Heights',
        label: 'Heights',
    },
    {
        value: 'Highroad',
        label: 'Highroad',
    },
    {
        value: 'Highway',
        label: 'Highway',
    },
    {
        value: 'Hill',
        label: 'Hill',
    },
    {
        value: 'Hollow',
        label: 'Hollow',
    },
    {
        value: 'Hub',
        label: 'Hub',
    },
    {
        value: 'Interchange',
        label: 'Interchange',
    },
    {
        value: 'Intersection',
        label: 'Intersection',
    },
    {
        value: 'Junction',
        label: 'Junction',
    },
    {
        value: 'Key',
        label: 'Key',
    },
    {
        value: 'Keys',
        label: 'Keys',
    },
    {
        value: 'Landing',
        label: 'Landing',
    },
    {
        value: 'Lane',
        label: 'Lane',
    },
    {
        value: 'Laneway',
        label: 'Laneway',
    },
    {
        value: 'Lees',
        label: 'Lees',
    },
    {
        value: 'Line',
        label: 'Line',
    },
    {
        value: 'Link',
        label: 'Link',
    },
    {
        value: 'Little',
        label: 'Little',
    },
    {
        value: 'Lookout',
        label: 'Lookout',
    },
    {
        value: 'Loop',
        label: 'Loop',
    },
    {
        value: 'Lower',
        label: 'Lower',
    },
    {
        value: 'Mall',
        label: 'Mall',
    },
    {
        value: 'Manor',
        label: 'Manor',
    },
    {
        value: 'Meander',
        label: 'Meander',
    },
    {
        value: 'Mears',
        label: 'Mears',
    },
    {
        value: 'Mew',
        label: 'Mew',
    },
    {
        value: 'Mews',
        label: 'Mews',
    },
    {
        value: 'Mile',
        label: 'Mile',
    },
    {
        value: 'Motorway',
        label: 'Motorway',
    },
    {
        value: 'Mount',
        label: 'Mount',
    },
    {
        value: 'Nook',
        label: 'Nook',
    },
    {
        value: 'Outlet',
        label: 'Outlet',
    },
    {
        value: 'Outlook',
        label: 'Outlook',
    },
    {
        value: 'Parade',
        label: 'Parade',
    },
    {
        value: 'Park',
        label: 'Park',
    },
    {
        value: 'Parklands',
        label: 'Parklands',
    },
    {
        value: 'Parkway',
        label: 'Parkway',
    },
    {
        value: 'Part',
        label: 'Part',
    },
    {
        value: 'Pass',
        label: 'Pass',
    },
    {
        value: 'Passage',
        label: 'Passage',
    },
    {
        value: 'Path',
        label: 'Path',
    },
    {
        value: 'Pathway',
        label: 'Pathway',
    },
    {
        value: 'Piazza',
        label: 'Piazza',
    },
    {
        value: 'Pier',
        label: 'Pier',
    },
    {
        value: 'Place',
        label: 'Place',
    },
    {
        value: 'Plateau',
        label: 'Plateau',
    },
    {
        value: 'Plaza',
        label: 'Plaza',
    },
    {
        value: 'Pocket',
        label: 'Pocket',
    },
    {
        value: 'Point',
        label: 'Point',
    },
    {
        value: 'Port',
        label: 'Port',
    },
    {
        value: 'Portal',
        label: 'Portal',
    },
    {
        value: 'Promenade',
        label: 'Promenade',
    },
    {
        value: 'Pursuit',
        label: 'Pursuit',
    },
    {
        value: 'Quad',
        label: 'Quad',
    },
    {
        value: 'Quadrangle',
        label: 'Quadrangle',
    },
    {
        value: 'Quadrant',
        label: 'Quadrant',
    },
    {
        value: 'Quay',
        label: 'Quay',
    },
    {
        value: 'Quays',
        label: 'Quays',
    },
    {
        value: 'Ramble',
        label: 'Ramble',
    },
    {
        value: 'Ramp',
        label: 'Ramp',
    },
    {
        value: 'Range',
        label: 'Range',
    },
    {
        value: 'Reach',
        label: 'Reach',
    },
    {
        value: 'Reserve',
        label: 'Reserve',
    },
    {
        value: 'Rest',
        label: 'Rest',
    },
    {
        value: 'Retreat',
        label: 'Retreat',
    },
    {
        value: 'Return',
        label: 'Return',
    },
    {
        value: 'Ride',
        label: 'Ride',
    },
    {
        value: 'Ridge',
        label: 'Ridge',
    },
    {
        value: 'Ridgeway',
        label: 'Ridgeway',
    },
    {
        value: 'Right Of Way',
        label: 'Right Of Way',
    },
    {
        value: 'Ring',
        label: 'Ring',
    },
    {
        value: 'Rise',
        label: 'Rise',
    },
    {
        value: 'Rising',
        label: 'Rising',
    },
    {
        value: 'River',
        label: 'River',
    },
    {
        value: 'Riverway',
        label: 'Riverway',
    },
    {
        value: 'Riviera',
        label: 'Riviera',
    },
    {
        value: 'Road',
        label: 'Road',
    },
    {
        value: 'Roads',
        label: 'Roads',
    },
    {
        value: 'Roadside',
        label: 'Roadside',
    },
    {
        value: 'Roadway',
        label: 'Roadway',
    },
    {
        value: 'Ronde',
        label: 'Ronde',
    },
    {
        value: 'Rosebowl',
        label: 'Rosebowl',
    },
    {
        value: 'Rotary',
        label: 'Rotary',
    },
    {
        value: 'Round',
        label: 'Round',
    },
    {
        value: 'Route',
        label: 'Route',
    },
    {
        value: 'Row',
        label: 'Row',
    },
    {
        value: 'Rue',
        label: 'Rue',
    },
    {
        value: 'Run',
        label: 'Run',
    },
    {
        value: 'Service Way',
        label: 'Service Way',
    },
    {
        value: 'Shunt',
        label: 'Shunt',
    },
    {
        value: 'Siding',
        label: 'Siding',
    },
    {
        value: 'Slope',
        label: 'Slope',
    },
    {
        value: 'Sound',
        label: 'Sound',
    },
    {
        value: 'Spur',
        label: 'Spur',
    },
    {
        value: 'Square',
        label: 'Square',
    },
    {
        value: 'Stairs',
        label: 'Stairs',
    },
    {
        value: 'State Highway',
        label: 'State Highway',
    },
    {
        value: 'Steps',
        label: 'Steps',
    },
    {
        value: 'Strand',
        label: 'Strand',
    },
    {
        value: 'Street',
        label: 'Street',
    },
    {
        value: 'Streets',
        label: 'Streets',
    },
    {
        value: 'Strip',
        label: 'Strip',
    },
    {
        value: 'Subway',
        label: 'Subway',
    },
    {
        value: 'Tarn',
        label: 'Tarn',
    },
    {
        value: 'Tarnice Way',
        label: 'Tarnice Way',
    },
    {
        value: 'Terrace',
        label: 'Terrace',
    },
    {
        value: 'Thoroughfare',
        label: 'Thoroughfare',
    },
    {
        value: 'Throughway',
        label: 'Throughway',
    },
    {
        value: 'Tollway',
        label: 'Tollway',
    },
    {
        value: 'Top',
        label: 'Top',
    },
    {
        value: 'Tor',
        label: 'Tor',
    },
    {
        value: 'Towers',
        label: 'Towers',
    },
    {
        value: 'Track',
        label: 'Track',
    },
    {
        value: 'Trail',
        label: 'Trail',
    },
    {
        value: 'Trailer',
        label: 'Trailer',
    },
    {
        value: 'Triangle',
        label: 'Triangle',
    },
    {
        value: 'Trunkway',
        label: 'Trunkway',
    },
    {
        value: 'Turn',
        label: 'Turn',
    },
    {
        value: 'Twist',
        label: 'Twist',
    },
    {
        value: 'Underpass',
        label: 'Underpass',
    },
    {
        value: 'Upper',
        label: 'Upper',
    },
    {
        value: 'Vale',
        label: 'Vale',
    },
    {
        value: 'Viaduct',
        label: 'Viaduct',
    },
    {
        value: 'View',
        label: 'View',
    },
    {
        value: 'Villas',
        label: 'Villas',
    },
    {
        value: 'Vista',
        label: 'Vista',
    },
    {
        value: 'Wade',
        label: 'Wade',
    },
    {
        value: 'Walk',
        label: 'Walk',
    },
    {
        value: 'Walkway',
        label: 'Walkway',
    },
    {
        value: 'Waterway',
        label: 'Waterway',
    },
    {
        value: 'Way',
        label: 'Way',
    },
    {
        value: 'Wharf',
        label: 'Wharf',
    },
    {
        value: 'Woods',
        label: 'Woods',
    },
    {
        value: 'Wynd',
        label: 'Wynd',
    },
    {
        value: 'Yard',
        label: 'Yard',
    },
];

export default (props: AddressProperties): JSX.Element => {
    const { ref } = usePlacesWidget<HTMLInputElement>({
        apiKey: 'AIzaSyByiwqCucxMpk-wohWNUbVA3yePIc2GVXk',
        onPlaceSelected: (place) => console.log(place),
    });

    const Prepend = (): JSX.Element => (
        <span className="flex flex-shrink-0 items-center justify-center mr-2">
            <button
                type="button"
                className="flex focus:outline-none z-10 hover:bg-gray-100 p-1 rounded-full text-xs text-gray-400 hover:text-blue-500"
            >
                <HomeIcon className="h-4 w-4" />
            </button>
        </span>
    );

    return (
        <>
            <Text {...props} ref={ref} prepend={<Prepend />} />
        </>
    );
};
