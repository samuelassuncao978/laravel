<div class="relative flex" x-data="{manual: false, focus:false, value: null}" @click.away="manual = false">
    <input x-cloak id="autocomplete" placeholder="" type="text" name="{{ $name ?? '' }}[text]"
        value="{{ optional($value)['text'] ?? '' }}" @focus="geolocate(); focus = true" x-show="!manual"
        class="pl-8 appearance-none outline-none focus:ring-2  focus:shadow-inner shadow-sm ring-gray-300 focus:border-gray-400 block w-full bg-white text-gray-500 text-sm border border-gray-100 rounded py-3 px-4" />

    <svg x-cloak x-show="!manual" viewBox="0 0 24 24"
        class="w-4 absolute text-gray-400 top-1/2 transform translate-x-0.5 -translate-y-1/2 left-2"
        stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
    </svg>
    <!-- <div class="absolute left-2 bottom-1/2 transform translate-y-1/2 translate-x-1">
        <div style="border-top-color:transparent" class="border-solid animate-spin  rounded-full border-gray-400 border h-3 w-3"></div>
    </div> -->

    <button type="button" :class="{'bg-gray-200': manual }" x-cloak
        class="absolute focus:outline-none z-10 right-2 p-2 rounded-full top-1/2 transform -translate-y-1/2 text-xs text-gray-400 hover:text-blue-500"
        @click="manual = !manual">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path
                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
        </svg>
    </button>



    <div class="ring-2 space-y-2 shadow-inner bg-white ring-gray-300 border border-gray-400 rounded-md p-3 pr-12 w-full"
        x-show="manual">

        <div class="flex space-x-2">
            <div class="flex text-xs items-center flex-shrink-0">
                <span class="w-14 flex-shrink-0">No:</span>
                <input id="street_number" name="{{ $name ?? '' }}[street_number]"
                    value="{{ optional($value)['street_number'] ?? '' }}" autofocus
                    class="px-2 py-1 w-10 appearance-none outline-none focus:shadow-inner shadow-sm ring-gray-300 focus:border-gray-400 block bg-gray-100  text-gray-500 border border-gray-100 rounded" />
            </div>
            <div class="flex flex-grow text-xs items-center">
                <span class="w-14 flex-shrink-0">Route:</span>
                <input id="route" name="{{ $name ?? '' }}[route]" value="{{ optional($value)['route'] ?? '' }}"
                    class="px-2 py-1 appearance-none outline-none focus:shadow-inner shadow-sm ring-gray-300 focus:border-gray-400 block w-full bg-gray-100 text-gray-500 border border-gray-100 rounded" />
            </div>
        </div>
        <div class="flex space-x-2">
            <div class="flex flex-auto text-xs items-center flex-shrink-0">
                <span class="w-14 flex-shrink-0">City:</span>
                <input id="locality" name="{{ $name ?? '' }}[locality]"
                    value="{{ optional($value)['locality'] ?? '' }}"
                    class="px-2 py-1 appearance-none outline-none  focus:shadow-inner shadow-sm ring-gray-300 focus:border-gray-400 block w-full bg-gray-100 text-gray-500 border border-gray-100 rounded" />
            </div>
        </div>
        <div class="flex space-x-2">
            <div class="flex text-xs items-center flex-shrink-0 flex-auto">
                <span class="w-14 flex-shrink-0">State:</span>
                <span class="relative flex flex-auto">
                    <select id="administrative_area_level_1" name="{{ $name ?? '' }}[administrative_area_level_1]"
                        value="{{ optional($value)['administrative_area_level_1'] ?? '' }}"
                        class="px-2 pr-6 py-1 appearance-none outline-none  focus:shadow-inner shadow-sm ring-gray-300 focus:border-gray-400 block w-full bg-gray-100 text-gray-500 text-xs border border-gray-100 rounded">
                        <option value="ACT">ACT</option>
                        <option value="NSW">NSW</option>
                        <option value="NT">NT</option>
                        <option value="QLD">QLD</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="VIC">VIC</option>
                        <option value="WA">WA</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-3/5 text-gray-400 top-1/2 transform -translate-y-1/2 right-1 absolute pointer-events-none"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                    </svg>
                </span>
            </div>
            <div class="flex text-xs items-center">
                <span class="w-16 flex-shrink-0">Postcode:</span>
                <input id="postal_code" name="{{ $name ?? '' }}[postal_code]"
                    value="{{ optional($value)['postal_code'] ?? '' }}"
                    class="px-2 py-1 appearance-none outline-none focus:shadow-inner shadow-sm ring-gray-300 focus:border-gray-400 block w-full bg-gray-100 text-gray-500 border border-gray-100 rounded" />
            </div>
        </div>
        <div class="flex space-x-2">
            <div class="flex text-xs flex-auto items-center flex-shrink-0">
                <span class="w-14 flex-shrink-0">Country:</span>
                <span class="relative flex flex-auto">
                    <select id="country" name="{{ $name ?? '' }}[country]"
                        value="{{ optional($value)['country'] ?? '' }}"
                        class="px-2 pr-6 py-1 appearance-none outline-none focus:shadow-inner shadow-sm ring-gray-300 focus:border-gray-400 block w-full bg-gray-100 text-gray-500 text-xs border border-gray-100 rounded">
                        <option value="Australia">Australia</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-3/5 text-gray-400 top-1/2 transform -translate-y-1/2 right-1 absolute pointer-events-none"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                    </svg>
                </span>
            </div>
        </div>
    </div>
</div>


<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByiwqCucxMpk-wohWNUbVA3yePIc2GVXk&libraries=places&callback=initAutocomplete"
async defer></script>

<script>
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */
            (document.getElementById('autocomplete')), {
                types: ['geocode'],
                componentRestrictions: {
                    country: "au"
                }
            });

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>


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
        /* display:none; */
        margin: 10px;
        opacity: 0.5;
    }

    .hdpi.pac-logo:after {
        background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/powered-by-google-on-white3_hdpi.png);
        /* Original ^ */
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
