<div class="flex flex-col">

   <div class="autocomplete" wire:ignore x-data="{ 
       
    value: @entangle($attributes->wire('model')),

    transformGoogleResponse: (label, res, regionSearchOnly) => {

        var STREET_TYPE = [{
            value: 'Access',
            label: 'Access'
            }, {
            value: 'Alley',
            label: 'Alley'
            }, {
            value: 'Alleyway',
            label: 'Alleyway'
            }, {
            value: 'Amble',
            label: 'Amble'
            }, {
            value: 'Anchorage',
            label: 'Anchorage'
            }, {
            value: 'Approach',
            label: 'Approach'
            }, {
            value: 'Arcade',
            label: 'Arcade'
            }, {
            value: 'Arterial',
            label: 'Arterial'
            }, {
            value: 'Artery',
            label: 'Artery'
            }, {
            value: 'Avenue',
            label: 'Avenue'
            }, {
            value: 'Banan',
            label: 'Banan'
            }, {
            value: 'Bank',
            label: 'Bank'
            }, {
            value: 'Basin',
            label: 'Basin'
            }, {
            value: 'Bay',
            label: 'Bay'
            }, {
            value: 'Beach',
            label: 'Beach'
            }, {
            value: 'Bend',
            label: 'Bend'
            }, {
            value: 'Block',
            label: 'Block'
            }, {
            value: 'Boardwalk',
            label: 'Boardwalk'
            }, {
            value: 'Boulevard',
            label: 'Boulevard'
            }, {
            value: 'Boulevarde',
            label: 'Boulevarde'
            }, {
            value: 'Bowl',
            label: 'Bowl'
            }, {
            value: 'Brace',
            label: 'Brace'
            }, {
            value: 'Brae',
            label: 'Brae'
            }, {
            value: 'Break',
            label: 'Break'
            }, {
            value: 'Bridge',
            label: 'Bridge'
            }, {
            value: 'Broadway',
            label: 'Broadway'
            }, {
            value: 'Brow',
            label: 'Brow'
            }, {
            value: 'Bypass',
            label: 'Bypass'
            }, {
            value: 'Byway',
            label: 'Byway'
            }, {
            value: 'Canal',
            label: 'Canal'
            }, {
            value: 'Causeway',
            label: 'Causeway'
            }, {
            value: 'Centre',
            label: 'Centre'
            }, {
            value: 'Centreway',
            label: 'Centreway'
            }, {
            value: 'Chase',
            label: 'Chase'
            }, {
            value: 'Circle',
            label: 'Circle'
            }, {
            value: 'Circlet',
            label: 'Circlet'
            }, {
            value: 'Circuit',
            label: 'Circuit'
            }, {
            value: 'Circus',
            label: 'Circus'
            }, {
            value: 'Close',
            label: 'Close'
            }, {
            value: 'Cluster',
            label: 'Cluster'
            }, {
            value: 'Colonnade',
            label: 'Colonnade'
            }, {
            value: 'Common',
            label: 'Common'
            }, {
            value: 'Concourse',
            label: 'Concourse'
            }, {
            value: 'Connection',
            label: 'Connection'
            }, {
            value: 'Copse',
            label: 'Copse'
            }, {
            value: 'Corner',
            label: 'Corner'
            }, {
            value: 'Corso',
            label: 'Corso'
            }, {
            value: 'Course',
            label: 'Course'
            }, {
            value: 'Court',
            label: 'Court'
            }, {
            value: 'Courtyard',
            label: 'Courtyard'
            }, {
            value: 'Cove',
            label: 'Cove'
            }, {
            value: 'Crescent',
            label: 'Crescent'
            }, {
            value: 'Crest',
            label: 'Crest'
            }, {
            value: 'Cross',
            label: 'Cross'
            }, {
            value: 'Crossing',
            label: 'Crossing'
            }, {
            value: 'Crossroad',
            label: 'Crossroad'
            }, {
            value: 'Crossway',
            label: 'Crossway'
            }, {
            value: 'Cruiseway',
            label: 'Cruiseway'
            }, {
            value: 'Cul-De-Sac',
            label: 'Cul-De-Sac'
            }, {
            value: 'Cutting',
            label: 'Cutting'
            }, {
            value: 'Dale',
            label: 'Dale'
            }, {
            value: 'Dell',
            label: 'Dell'
            }, {
            value: 'Dene',
            label: 'Dene'
            }, {
            value: 'Deviation',
            label: 'Deviation'
            }, {
            value: 'Dip',
            label: 'Dip'
            }, {
            value: 'Distributor',
            label: 'Distributor'
            }, {
            value: 'Divide',
            label: 'Divide'
            }, {
            value: 'Dock',
            label: 'Dock'
            }, {
            value: 'Domain',
            label: 'Domain'
            }, {
            value: 'Drive',
            label: 'Drive'
            }, {
            value: 'Driveway',
            label: 'Driveway'
            }, {
            value: 'Edge',
            label: 'Edge'
            }, {
            value: 'Elbow',
            label: 'Elbow'
            }, {
            value: 'End',
            label: 'End'
            }, {
            value: 'Entrance',
            label: 'Entrance'
            }, {
            value: 'Esplanade',
            label: 'Esplanade'
            }, {
            value: 'Estate',
            label: 'Estate'
            }, {
            value: 'Estuary',
            label: 'Estuary'
            }, {
            value: 'Expressway',
            label: 'Expressway'
            }, {
            value: 'Extension',
            label: 'Extension'
            }, {
            value: 'Fairway',
            label: 'Fairway'
            }, {
            value: 'Fire Track',
            label: 'Fire Track'
            }, {
            value: 'Firebreak',
            label: 'Firebreak'
            }, {
            value: 'Fireline',
            label: 'Fireline'
            }, {
            value: 'Firetrack',
            label: 'Firetrack'
            }, {
            value: 'Firetrail',
            label: 'Firetrail'
            }, {
            value: 'Flat',
            label: 'Flat'
            }, {
            value: 'Follow',
            label: 'Follow'
            }, {
            value: 'Footway',
            label: 'Footway'
            }, {
            value: 'Ford',
            label: 'Ford'
            }, {
            value: 'Foreshore',
            label: 'Foreshore'
            }, {
            value: 'Formation',
            label: 'Formation'
            }, {
            value: 'Freeway',
            label: 'Freeway'
            }, {
            value: 'Front',
            label: 'Front'
            }, {
            value: 'Frontage',
            label: 'Frontage'
            }, {
            value: 'Gap',
            label: 'Gap'
            }, {
            value: 'Garden',
            label: 'Garden'
            }, {
            value: 'Gardens',
            label: 'Gardens'
            }, {
            value: 'Gate',
            label: 'Gate'
            }, {
            value: 'Gates',
            label: 'Gates'
            }, {
            value: 'Gateway',
            label: 'Gateway'
            }, {
            value: 'Glade',
            label: 'Glade'
            }, {
            value: 'Glen',
            label: 'Glen'
            }, {
            value: 'Grange',
            label: 'Grange'
            }, {
            value: 'Green',
            label: 'Green'
            }, {
            value: 'Ground',
            label: 'Ground'
            }, {
            value: 'Grove',
            label: 'Grove'
            }, {
            value: 'Gully',
            label: 'Gully'
            }, {
            value: 'Harbour',
            label: 'Harbour'
            }, {
            value: 'Heath',
            label: 'Heath'
            }, {
            value: 'Heights',
            label: 'Heights'
            }, {
            value: 'Highroad',
            label: 'Highroad'
            }, {
            value: 'Highway',
            label: 'Highway'
            }, {
            value: 'Hill',
            label: 'Hill'
            }, {
            value: 'Hollow',
            label: 'Hollow'
            }, {
            value: 'Hub',
            label: 'Hub'
            }, {
            value: 'Interchange',
            label: 'Interchange'
            }, {
            value: 'Intersection',
            label: 'Intersection'
            }, {
            value: 'Junction',
            label: 'Junction'
            }, {
            value: 'Key',
            label: 'Key'
            }, {
            value: 'Keys',
            label: 'Keys'
            }, {
            value: 'Landing',
            label: 'Landing'
            }, {
            value: 'Lane',
            label: 'Lane'
            }, {
            value: 'Laneway',
            label: 'Laneway'
            }, {
            value: 'Lees',
            label: 'Lees'
            }, {
            value: 'Line',
            label: 'Line'
            }, {
            value: 'Link',
            label: 'Link'
            }, {
            value: 'Little',
            label: 'Little'
            }, {
            value: 'Lookout',
            label: 'Lookout'
            }, {
            value: 'Loop',
            label: 'Loop'
            }, {
            value: 'Lower',
            label: 'Lower'
            }, {
            value: 'Mall',
            label: 'Mall'
            }, {
            value: 'Manor',
            label: 'Manor'
            }, {
            value: 'Meander',
            label: 'Meander'
            }, {
            value: 'Mears',
            label: 'Mears'
            }, {
            value: 'Mew',
            label: 'Mew'
            }, {
            value: 'Mews',
            label: 'Mews'
            }, {
            value: 'Mile',
            label: 'Mile'
            }, {
            value: 'Motorway',
            label: 'Motorway'
            }, {
            value: 'Mount',
            label: 'Mount'
            }, {
            value: 'Nook',
            label: 'Nook'
            }, {
            value: 'Outlet',
            label: 'Outlet'
            }, {
            value: 'Outlook',
            label: 'Outlook'
            }, {
            value: 'Parade',
            label: 'Parade'
            }, {
            value: 'Park',
            label: 'Park'
            }, {
            value: 'Parklands',
            label: 'Parklands'
            }, {
            value: 'Parkway',
            label: 'Parkway'
            }, {
            value: 'Part',
            label: 'Part'
            }, {
            value: 'Pass',
            label: 'Pass'
            }, {
            value: 'Passage',
            label: 'Passage'
            }, {
            value: 'Path',
            label: 'Path'
            }, {
            value: 'Pathway',
            label: 'Pathway'
            }, {
            value: 'Piazza',
            label: 'Piazza'
            }, {
            value: 'Pier',
            label: 'Pier'
            }, {
            value: 'Place',
            label: 'Place'
            }, {
            value: 'Plateau',
            label: 'Plateau'
            }, {
            value: 'Plaza',
            label: 'Plaza'
            }, {
            value: 'Pocket',
            label: 'Pocket'
            }, {
            value: 'Point',
            label: 'Point'
            }, {
            value: 'Port',
            label: 'Port'
            }, {
            value: 'Portal',
            label: 'Portal'
            }, {
            value: 'Promenade',
            label: 'Promenade'
            }, {
            value: 'Pursuit',
            label: 'Pursuit'
            }, {
            value: 'Quad',
            label: 'Quad'
            }, {
            value: 'Quadrangle',
            label: 'Quadrangle'
            }, {
            value: 'Quadrant',
            label: 'Quadrant'
            }, {
            value: 'Quay',
            label: 'Quay'
            }, {
            value: 'Quays',
            label: 'Quays'
            }, {
            value: 'Ramble',
            label: 'Ramble'
            }, {
            value: 'Ramp',
            label: 'Ramp'
            }, {
            value: 'Range',
            label: 'Range'
            }, {
            value: 'Reach',
            label: 'Reach'
            }, {
            value: 'Reserve',
            label: 'Reserve'
            }, {
            value: 'Rest',
            label: 'Rest'
            }, {
            value: 'Retreat',
            label: 'Retreat'
            }, {
            value: 'Return',
            label: 'Return'
            }, {
            value: 'Ride',
            label: 'Ride'
            }, {
            value: 'Ridge',
            label: 'Ridge'
            }, {
            value: 'Ridgeway',
            label: 'Ridgeway'
            }, {
            value: 'Right Of Way',
            label: 'Right Of Way'
            }, {
            value: 'Ring',
            label: 'Ring'
            }, {
            value: 'Rise',
            label: 'Rise'
            }, {
            value: 'Rising',
            label: 'Rising'
            }, {
            value: 'River',
            label: 'River'
            }, {
            value: 'Riverway',
            label: 'Riverway'
            }, {
            value: 'Riviera',
            label: 'Riviera'
            }, {
            value: 'Road',
            label: 'Road'
            }, {
            value: 'Roads',
            label: 'Roads'
            }, {
            value: 'Roadside',
            label: 'Roadside'
            }, {
            value: 'Roadway',
            label: 'Roadway'
            }, {
            value: 'Ronde',
            label: 'Ronde'
            }, {
            value: 'Rosebowl',
            label: 'Rosebowl'
            }, {
            value: 'Rotary',
            label: 'Rotary'
            }, {
            value: 'Round',
            label: 'Round'
            }, {
            value: 'Route',
            label: 'Route'
            }, {
            value: 'Row',
            label: 'Row'
            }, {
            value: 'Rue',
            label: 'Rue'
            }, {
            value: 'Run',
            label: 'Run'
            }, {
            value: 'Service Way',
            label: 'Service Way'
            }, {
            value: 'Shunt',
            label: 'Shunt'
            }, {
            value: 'Siding',
            label: 'Siding'
            }, {
            value: 'Slope',
            label: 'Slope'
            }, {
            value: 'Sound',
            label: 'Sound'
            }, {
            value: 'Spur',
            label: 'Spur'
            }, {
            value: 'Square',
            label: 'Square'
            }, {
            value: 'Stairs',
            label: 'Stairs'
            }, {
            value: 'State Highway',
            label: 'State Highway'
            }, {
            value: 'Steps',
            label: 'Steps'
            }, {
            value: 'Strand',
            label: 'Strand'
            }, {
            value: 'Street',
            label: 'Street'
            }, {
            value: 'Streets',
            label: 'Streets'
            }, {
            value: 'Strip',
            label: 'Strip'
            }, {
            value: 'Subway',
            label: 'Subway'
            }, {
            value: 'Tarn',
            label: 'Tarn'
            }, {
            value: 'Tarnice Way',
            label: 'Tarnice Way'
            }, {
            value: 'Terrace',
            label: 'Terrace'
            }, {
            value: 'Thoroughfare',
            label: 'Thoroughfare'
            }, {
            value: 'Throughway',
            label: 'Throughway'
            }, {
            value: 'Tollway',
            label: 'Tollway'
            }, {
            value: 'Top',
            label: 'Top'
            }, {
            value: 'Tor',
            label: 'Tor'
            }, {
            value: 'Towers',
            label: 'Towers'
            }, {
            value: 'Track',
            label: 'Track'
            }, {
            value: 'Trail',
            label: 'Trail'
            }, {
            value: 'Trailer',
            label: 'Trailer'
            }, {
            value: 'Triangle',
            label: 'Triangle'
            }, {
            value: 'Trunkway',
            label: 'Trunkway'
            }, {
            value: 'Turn',
            label: 'Turn'
            }, {
            value: 'Twist',
            label: 'Twist'
            }, {
            value: 'Underpass',
            label: 'Underpass'
            }, {
            value: 'Upper',
            label: 'Upper'
            }, {
            value: 'Vale',
            label: 'Vale'
            }, {
            value: 'Viaduct',
            label: 'Viaduct'
            }, {
            value: 'View',
            label: 'View'
            }, {
            value: 'Villas',
            label: 'Villas'
            }, {
            value: 'Vista',
            label: 'Vista'
            }, {
            value: 'Wade',
            label: 'Wade'
            }, {
            value: 'Walk',
            label: 'Walk'
            }, {
            value: 'Walkway',
            label: 'Walkway'
            }, {
            value: 'Waterway',
            label: 'Waterway'
            }, {
            value: 'Way',
            label: 'Way'
            }, {
            value: 'Wharf',
            label: 'Wharf'
            }, {
            value: 'Woods',
            label: 'Woods'
            }, {
            value: 'Wynd',
            label: 'Wynd'
            }, {
            value: 'Yard',
            label: 'Yard'
        }];
        label = label.toLowerCase(); // pick the easily determined properties from response
        var { short_name: postcode = '' } = res.find(curr => curr.types.includes('postal_code')) || {};
        var { short_name: state = '' } = res.find(curr => curr.types.includes('administrative_area_level_1')) || {};
        var { long_name: streetName = '' } = res.find(curr => curr.types.includes('route')) || {};
        var { short_name: streetNumber = '' } = res.find(curr => curr.types.includes('street_number')) || {};
        var { long_name: suburb = '' } = res.find(curr => curr.types.includes('locality')) || {};
        var { long_name: country = ''} = res.find(curr => curr.types.includes('country')) || {};
        var unit = '';  // Google has no concept of street. See if we recognise a streetType from
                        // the route then use that to generate streetName and streetType
                        // streetType default to 'street' if regionSearchOnly is false

        var street = streetName.trim().split(' ');
        var streetTypeWith = street[street.length - 1];
        var streetType = !regionSearchOnly ? 'Street' : '';

        if (STREET_TYPE.find(street_type => street_type.label === streetTypeWith)) {
            streetType = streetTypeWith;
        }
        streetName = streetName.replace(streetType, '').trim(); // edge case, state is listed as JBT for jervis bay when it should be ACT. Naughty Google
        if (state === 'JBT') {
            state = 'ACT';
        } // check for unit / subpremise info by crossreferencing against user input
        var streetNumberData = label.substring(0, label.indexOf(streetName.toLowerCase())).trim();
        if (streetNumberData !== streetNumber) {
            if (streetNumberData.includes('/')) {
                unit = streetNumberData.substring(0, streetNumberData.indexOf('/'));
            } else {
                streetNumber = streetNumberData;
            }
        }
        const capitalize = (word)=> {
            const lower = word.toLowerCase();
            return word.charAt(0).toUpperCase() + lower.slice(1);
        }
        var formattedAddress = function formattedAddress(formatString, addressPart) {
            var concatBefore = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
            var concatAfter = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : '';
            return formatString.concat(concatBefore, addressPart, concatAfter);
            };

        var getFormattedString = address => {
            var formatString = '';
            formatString = address.unit ? formattedAddress(formatString, address.unit, '', '/') : formatString;
          //  formatString = address.deliveryAddress ? formattedAddress(formatString, address.deliveryAddress, '') : formatString;
          //  formatString = address.lotSection ? formattedAddress(formatString, address.lotSection.replace(/lot\s*/gi, ''), 'Lot. ', ' ') : formatString;
            formatString = address.level ? formattedAddress(formatString, address.level, ' Level ', ', ') : formatString;
            formatString = address.buildingName ? formattedAddress(formatString, address.buildingName, ' ', ' ') : formatString;
            formatString = address.streetNumber ? formattedAddress(formatString, address.streetNumber) : formatString;
            formatString = address.streetName ? formattedAddress(formatString, address.streetName, ' ') : formatString;
            formatString = address.streetType ? formattedAddress(formatString, address.streetType, ' ') : formatString;
           // formatString = address.streetSuffix ? formattedAddress(formatString, address.streetSuffix, ' ') : formatString;
            formatString = address.suburb ? formattedAddress(formatString, capitalize(address.suburb), ', ') : formatString;
            formatString = address.state ? formattedAddress(formatString, `${address.state}`.toUpperCase(), ', ') : formatString;
            formatString = address.postcode ? formattedAddress(formatString, address.postcode, ' ') : formatString;
            formatString = address.country ? formattedAddress(formatString, capitalize(address.country), ', ') : formatString;
            return formatString.replace(/^,/g, '').trim();
        };

        return {
            __toString: getFormattedString({
                buildingName: '',
                country,
                level: '',
                postcode,
                state,
                streetName,
                streetNumber,
                streetType,
                suburb,
                unit
            }),
            building_name: '',
            country,
            level: '',
            postcode,
            state,
            street_name: streetName,
            street_number: streetNumber,
            street_type: streetType,
            suburb,
            unit
        };
    }


}" x-init="
        this.componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };
        this.autocomplete = new google.maps.places.Autocomplete(

            (document.querySelector('.autocomplete input')), {
                types: ['geocode'],
                componentRestrictions: {
                    country: 'au'
                }
            });
            this.autocomplete.addListener('place_changed', ()=>{ 
                var place = this.autocomplete.getPlace();
                value = transformGoogleResponse(place.formatted_address,place.address_components,true);
             });

   ">
      

        <x-form.label {{ $attributes }} />
        <span {{ $attributes->only(['class','x-data','@click.away'])->class(['border-gray-300 focus-within:border-blue-400 focus-within:ring-blue-400'=> !$attributes->has('class') ])->merge(['class' => 'flex items-center justify-center relative border-2  bg-white outline-none focus-within:ring-2 focus-within:shadow-inner focus-within:ring-opacity-20 rounded transition-all ease-in-out duration-200 flex-1']) }}>
            <span class="flex flex-shrink-0 items-center justify-center ml-3 text-gray-400 font-bold">
                <span class="h-4 w-4"><x-icon.outline icon="home" /></span>
            </span>
            <input x-model="value.__toString" {{ $attributes->except(['wire:model']) }} placeholder="Search for address:" {{ $attributes->only(['placeholder','autocomplete','autofocus']) }} id="{{ collect($attributes->only(['id','name','wire:model','label']))->first() }}"  class="outline-none bg-transparent px-3 p-2 flex-1 w-full text-lg md:text-sm {{ $attributes->has('rtl') ? 'text-right' : '' }}" />
            <x-form.append {{ $attributes }} />
        </span>
        <x-form.inline-errors {{ $attributes }} />


        <!-- <span class="select-none text-blue-500 text-xs flex items-start leading-5 mt-2 animate-animated animate-faster animate-fadeInDown">
            <span class="h-5 w-5 mr-0.5 flex-shrink-0 leading-none flex">
                <x-icon.outline icon="light-bulb"/>
            </span>
            
            No matches found. Continue typing or <button class="underline font-semibold ml-1">Enter address manually</button>
        </span> -->
   </div>


   <div class="hidden bg-gray-200 inset-0">


   <div class="space-y-4">


        <div class="flex space-x-4">
            <div class="w-1/4">
                <x-form.inputs.textbox label="No:" {{ $attributes->except(['label']) }}></x-form.inputs.textbox>
            </div>
            <div class="w-3/4">
                <x-form.inputs.textbox label="Street:" {{ $attributes->except(['label']) }}></x-form.inputs.textbox>
            </div>
        </div>

        <div class="flex space-x-4">
            <div class="w-3/5">
                <x-form.inputs.textbox label="Country:" {{ $attributes->except(['label']) }}></x-form.inputs.textbox>
            </div>
            <div class="w-2/5">
                <x-form.inputs.textbox label="City:" {{ $attributes->except(['label']) }}></x-form.inputs.textbox>
            </div>
        </div>

        <div class="flex space-x-4">
            <div class="w-3/5">
                <x-form.inputs.textbox label="State:" {{ $attributes->except(['label']) }}></x-form.inputs.textbox>
            </div>
            <div class="w-2/5">
                <x-form.inputs.textbox label="Postcode:" {{ $attributes->except(['label']) }}></x-form.inputs.textbox>
            </div>
        </div>
            
    </div>



   </div>



</div>





<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByiwqCucxMpk-wohWNUbVA3yePIc2GVXk&libraries=places"
async defer></script>




<style>
    .pac-container {
        background-color: #fff;
        position: absolute !important;
        z-index: 1000;
        border-radius: 2px;
        border-top: 1px solid #d9d9d9;
        font-family: Arial, sans-serif;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        overflow: hidden;

        /* Original ^ */
        font-weight: 400;
        font-size: 0.875rem;
        font-family: inherit;
        --tw-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        border-radius: 0.25rem;
    }

    .pac-logo:after {
        content: "";
        padding: 1px 1px 1px 0;
        height: 16px;
        text-align: right;
        display: block;
        background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/powered-by-google-on-white3.png);
        background-position: center;
        background-repeat: no-repeat;
        background-size: 120px 14px;
        /* Original ^ */
        display:none;
        margin: 10px;
        opacity: 0.5;
    }

    .hdpi.pac-logo:after {
        background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/powered-by-google-on-white3_hdpi.png);
        /* Original ^ */
        display:none;
    }

    .pac-item {
        cursor: default;
        padding: 0 4px;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        line-height: 30px;
        text-align: left;
        border-top: 1px solid #e6e6e6;
        font-size: 11px;
        color: #666;
        /* Original ^ */
        display: flex;
        flex-direction: column;
        font-weight: 400;
        font-size: 0.575rem;
        font-family: inherit;
        padding: 0.475rem 0.875rem;
        line-height: 0.875rem;
        margin: 0px;


    }

    .pac-item:hover {
        background-color: #fafafa;
        /* Original ^ */
        --tw-bg-opacity: 1;
        background-color: rgba(59, 130, 246, var(--tw-bg-opacity));
        --tw-text-opacity: 1;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
    }

    .pac-item-selected,
    .pac-item-selected:hover {
        background-color: #ebf2fe;

        /* Original ^ */
        --tw-bg-opacity: 1;
        background-color: rgba(59, 130, 246, var(--tw-bg-opacity));
        --tw-text-opacity: 1;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
    }

    .pac-item:hover .pac-item-query,
    .pac-item-selected:hover .pac-item-query,
    .pac-item-selected .pac-item-query {
        --tw-text-opacity: 1;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
    }


    .pac-matched {
        font-weight: 700
    }

    .pac-item-query {
        font-size: 13px;
        padding-right: 3px;
        color: #000;
        /* Original ^ */
        display: block;
        color: #333;
    }

    .pac-icon {
        width: 15px;
        height: 20px;
        margin-right: 7px;
        margin-top: 6px;
        display: inline-block;
        vertical-align: top;
        background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/autocomplete-icons.png);
        background-size: 34px;

        /* Original ^ */
        background: #666;
        flex-shrink: 0;
        width: 20px;
        display: none;
    }

    .hdpi .pac-icon {
        background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/autocomplete-icons_hdpi.png);
        /* Original ^ */
        background: none;
    }

    .pac-icon-search {
        background-position: -1px -1px
    }

    .pac-item-selected .pac-icon-search {
        background-position: -18px -1px
    }

    .pac-icon-marker {
        background-position: -1px -161px
    }

    .pac-item-selected .pac-icon-marker {
        background-position: -18px -161px
    }

    .pac-placeholder {
        color: gray
    }

    /* .pac-container {
    z-index: 10000 !important;
    width: auto !important;
    position: initial !important;
    left: 0 !important;
    right: 0 !important;
    display: block !important;
}
.pac-container:empty{
    display: none !important;
} */

</style>
