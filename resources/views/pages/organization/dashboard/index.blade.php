
<div class="bg-white flex flex-col flex-grow">
    <x-frontend-layout>
        <div class="flex flex-wrap">

                <div class="flex flex-wrap flex-grow">
                    <div class="w-1/2 md:w-1/4 p-2 md:p-4 flex">
                        <div class="bg-gray-100 flex-grow flex flex-col rounded-xl p-2 md:p-5">
                            <div class="flex items-center text-gray-700 font-semibold">
                                <span class="h-5 w-5 mr-2 text-blue-500">
                                    <x-icon.solid icon="user-circle" />
                                </span>
                                Sessions this month
                            </div>
                            <div class="pt-8 pb-5 flex flex-col flex-grow">
                                <span class="text-4xl pb-2 text-gray-600">4</span>
                            </div>
                            <div class=" space-x-2 flex h-2 w-full">
                                <div class="bg-blue-500 rounded-full h-full" style="width:25%;"></div>
                                <div class="bg-gray-500 rounded-full h-full flex-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 md:w-1/4 p-2 md:p-4 flex">
                        <div class="bg-gray-100 flex-grow flex flex-col rounded-xl p-2 md:p-5">
                            <div class="flex items-center text-gray-700 font-semibold">
                                <span class="h-5 w-5 mr-2 text-blue-500">
                                    <x-icon.solid icon="scale" />
                                </span>
                                Utilisation Rate
                            </div>
                            <div class="pt-8 pb-5 flex flex-col">
                                <span class="text-4xl pb-2 text-gray-600">19%</span>
                            </div>
                            <div>
                                <div class=" text-xs mb-2">60 / 120 Sessions for this month</div>
                                <div class="flex space-x-1">
                                    <div class="rounded-l bg-blue-500 h-2 flex-1"></div>
                                    <div class="bg-blue-500 h-2 flex-1"></div>
                                    <div class="bg-gray-500 h-2 flex-1"></div>
                                    <div class="bg-gray-500 h-2 flex-1"></div>
                                    <div class="bg-gray-500 h-2 flex-1"></div>
                                    <div class="rounded-r bg-gray-500 h-2 flex-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 md:w-1/4 p-2 md:p-4 flex">
                        <div class="bg-gray-100 flex-grow flex flex-col rounded-xl p-2 md:p-5">
                            <div class="flex items-center text-gray-700 font-semibold">
                                <span class="h-5 w-5 mr-2 text-blue-500">
                                    <x-icon.solid icon="qrcode" />
                                </span>
                                Remaining Sessions
                            </div>
                            <div class="pt-8 pb-5 flex flex-col flex-grow">
                                <span class="text-4xl pb-2 text-gray-600">28</span>

                            </div>
                            <div class=" space-x-2 flex h-2 w-full">
                                <div class="bg-blue-500 rounded-full h-full" style="width:75%;"></div>
                                <div class="bg-gray-500 rounded-full h-full flex-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 md:w-1/4 p-2 md:p-4 flex">
                        <div class="bg-gray-100 flex-grow flex flex-col rounded-xl p-2 md:p-5">
                            <div class="flex items-center text-gray-700 font-semibold">
                                <span class="h-5 w-5 mr-2 text-blue-500">
                                    <x-icon.solid icon="calendar" />
                                </span>
                                Est depletion date
                            </div>
                            <div class="pt-8 pb-5 flex flex-col">
                                <span class="text-4xl pb-2 text-gray-600">28th June</span>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="flex flex-wrap w-full">


                    <div class="w-full md:w-2/5 p-5 flex">
                        <div class="rounded-xl bg-gray-100  w-full relative">
                            <div class="p-2 md:p-5 flex flex-col">
                                <div class="flex items-center text-gray-700 font-semibold">
                                    <span class="h-5 w-5 mr-2 text-blue-500">
                                        <x-icon.solid icon="office-building" />
                                    </span>
                                    Site utilisation
                                </div>
                                <div class="mt-4 flex space-x-4">
                                    <div class="flex items-center text-xs text-gray-700">
                                        <span class="h-3 w-3 mr-2 rounded-full bg-blue-500"></span>
                                        Site One
                                    </div>
                                    <div class="flex items-center text-xs text-gray-700">
                                        <span class="h-3 w-3 mr-2 rounded-full bg-purple-500"></span>
                                        Site Two
                                    </div>
                                    <div class="flex items-center text-xs text-gray-700">
                                        <span class="h-3 w-3 mr-2 rounded-full bg-green-500"></span>
                                        Site Three
                                    </div>
                                </div>
                            </div>
                            <div class="  flex items-center justify-center">
                                <div class="w-2/6">
                                    <table class="chart">
                                        <caption> CSS Pie Chart from HTML Table </caption>
                                        <thead>
                                            <tr>
                                                <th scope="col"> Month </th>
                                                <th scope="col"> Stats </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"> 2005 </th>
                                                <td style="--start: 0; --size: 0.10; --color: var(--colors-blue-500); opacity:0.8;">
                                                    <span class="data"> 100 </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> 2010 </th>
                                                <td
                                                    style="--start: 0.10; --size: 0.18; --color: var(--colors-purple-500);  opacity:0.8;">
                                                    <span class="data"> 180 </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> 2015 </th>
                                                <td
                                                    style="--start: 0.28; --size: 0.72; --color: var(--colors-green-500);  opacity:0.8;">
                                                    <span class="data"> 560 </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-3/5 p-5 flex">
                        <div class="rounded-xl bg-gray-100  w-full relative">
                            <div class="p-2 md:p-5 flex flex-col">
                                <div class="flex items-center text-gray-700 font-semibold">
                                    <span class="h-5 w-5 mr-2 text-blue-500">
                                        <x-icon.solid icon="presentation-chart-line" />
                                    </span>
                                    Quarterly Historic Usage
                                </div>
                                <div class="mt-4 flex space-x-4">
                                    <div class="flex items-center text-xs text-gray-700">
                                        <span class="h-3 w-3 mr-2 rounded-full bg-blue-500"></span>
                                        Site One
                                    </div>
                                    <div class="flex items-center text-xs text-gray-700">
                                        <span class="h-3 w-3 mr-2 rounded-full bg-purple-500"></span>
                                        Site Two
                                    </div>
                                    <div class="flex items-center text-xs text-gray-700">
                                        <span class="h-3 w-3 mr-2 rounded-full bg-green-500"></span>
                                        Site Three
                                    </div>
                                </div>
                            </div>
                            <div class="h-52">
                                <table id="area-example-8" class="charts-css area multiple hide-data show-labels">
                                    <caption> Area Example #8 </caption>
                                    <thead>
                                        <tr>
                                            <th scope="col"> Year </th>
                                            <th scope="col"> Progress 1 </th>
                                            <th scope="col"> Progress 2 </th>
                                            <th scope="col"> Progress 3 </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $rows = [
                                                [['color' => '--colors-green-500'], ['color' => '--colors-blue-500'], ['color' => '--colors-purple-500']],
                                                [['color' => '--colors-green-500'], ['color' => '--colors-blue-500'], ['color' => '--colors-purple-500']],
                                                [['color' => '--colors-green-500'], ['color' => '--colors-blue-500'], ['color' => '--colors-purple-500']],
                                                [['color' => '--colors-green-500'], ['color' => '--colors-blue-500'], ['color' => '--colors-purple-500']],
                                                [['color' => '--colors-green-500'], ['color' => '--colors-blue-500'], ['color' => '--colors-purple-500']],
                                                [['color' => '--colors-green-500'], ['color' => '--colors-blue-500'], ['color' => '--colors-purple-500']],
                                                [['color' => '--colors-green-500'], ['color' => '--colors-blue-500'], ['color' => '--colors-purple-500']],
                                                [['color' => '--colors-green-500'], ['color' => '--colors-blue-500'], ['color' => '--colors-purple-500']],
                                                [['color' => '--colors-green-500'], ['color' => '--colors-blue-500'], ['color' => '--colors-purple-500']],
                                                [['color' => '--colors-green-500'], ['color' => '--colors-blue-500'], ['color' => '--colors-purple-500']],
                                                [['color' => '--colors-green-500'], ['color' => '--colors-blue-500'], ['color' => '--colors-purple-500']],
                                                [['color' => '--colors-green-500'], ['color' => '--colors-blue-500'], ['color' => '--colors-purple-500']],
                                            ];
                                        @endphp
                                        @foreach ($rows as $row_key => $row)
                                            <tr>
                                                <th scope="row">
                                                    <div class="text-gray-700 font-normal">WK {{ $row_key + 1 }}</div>

                                                </th>
                                                @foreach ($row as $column_key => $column)
                                                    @php
                                                        $rows[$row_key][$column_key]['start'] = optional(optional(optional($rows)[$row_key - 1])[$column_key])['end'] ?? rand(0, 9);
                                                        $rows[$row_key][$column_key]['end'] = rand(0, 9);

                                                    @endphp
                                                    <td
                                                        style="opacity:0.6; --start:0.{{ $rows[$row_key][$column_key]['start'] }}; --size:0.{{ $rows[$row_key][$column_key]['end'] }}; --color: var({{ $rows[$row_key][$column_key]['color'] ?? '' }});">
                                                        <span class="data"> 40 </span>
                                                        <span class="tooltip"> Data:
                                                            {{ $rows[$row_key][$column_key]['start'] }} <br> More info... </span>
                                                    </td>
                                                @endforeach

                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
    </x-frontend-layout>
</div>
