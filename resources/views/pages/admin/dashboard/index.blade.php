<x-main>

    <div class="bg-gray-100 flex flex-col p-20 ">

        <div class="text-3xl text-gray-700 leading-tight tracking-tight font-light">
            <div>Good Morning</div>
            <div class="text-2xl text-gray-500">Here is what is happening for you today.</div>
        </div>

        <div class="flex mt-10">
            <div class="w-1/4">
                <div class="p-5 shadow rounded-md bg-white flex flex-col">
                    <div class="flex">

                        <div class="flex flex-col space-y-1 flex-grow overflow-hidden">
                            <span class="text-gray-500 truncate">Geocon \ Midnight appartments</span>
                            <strong class="text-2xl text-gray-700 truncate">Place and finish</strong>
                            <span class="text-gray-700 text-sm">Something else text based</span>
                        </div>
                        <div class="flex-none flex items-center justify-center">
                            <button class="text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </div>

                    </div>

                    <div class="flex space-x-10 mt-10">
                        <div class="flex flex-col space-y-1 flex-1">
                            <span class="text-gray-500">Status</span>
                            <strong class="font-bold text-gray-700 text-xs">
                                <div class="py-0 leading-none rounded-md flex items-center">
                                    <span class="block h-3 w-3 mr-2 bg-green-500 rounded-md"></span>
                                    <span class="block flex-grow">In progress</span>
                                </div>
                            </strong>
                        </div>
                        <div class="w-0.5 bg-gray-300 flex-none"></div>
                        <div class="flex flex-col space-y-1 flex-1">
                            <span class="text-gray-500">Due</span>
                            <strong class="font-bold text-gray-700 text-xs">4pm Today</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>





    <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center px-5 py-5">
        <div class="w-full max-w-3xl">
            <div class="-mx-2 md:flex">
                <div class="w-full md:w-1/3 px-2">
                    <div class="rounded-lg shadow-sm mb-4">
                        <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                            <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                <h4 class="text-sm uppercase text-gray-500 leading-tight">Users</h4>
                                <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">3,682</h3>
                                <p class="text-xs text-green-500 leading-tight">▲ 57.1%</p>
                            </div>
                            <div class="absolute bottom-0 inset-x-0">
                                <canvas id="chart1" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-2">
                    <div class="rounded-lg shadow-sm mb-4">
                        <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                            <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                <h4 class="text-sm uppercase text-gray-500 leading-tight">Subscribers</h4>
                                <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">11,427</h3>
                                <p class="text-xs text-red-500 leading-tight">▼ 42.8%</p>
                            </div>
                            <div class="absolute bottom-0 inset-x-0">
                                <canvas id="chart2" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-2">
                    <div class="rounded-lg shadow-sm mb-4">
                        <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                            <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                <h4 class="text-sm uppercase text-gray-500 leading-tight">Comments</h4>
                                <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">8,028</h3>
                                <p class="text-xs text-green-500 leading-tight">▲ 8.2%</p>
                            </div>
                            <div class="absolute bottom-0 inset-x-0">
                                <canvas id="chart3" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        const chartOptions = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
            tooltips: {
                enabled: false,
            },
            elements: {
                point: {
                    radius: 0
                },
            },
            scales: {
                xAxes: [{
                    gridLines: false,
                    scaleLabel: false,
                    ticks: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: false,
                    scaleLabel: false,
                    ticks: {
                        display: false,
                        suggestedMin: 0,
                        suggestedMax: 10
                    }
                }]
            }
        };
        //
        var ctx = document.getElementById('chart1').getContext('2d');
        var chart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [1, 2, 1, 3, 5, 4, 7],
                datasets: [{
                    backgroundColor: "rgba(101, 116, 205, 0.1)",
                    borderColor: "rgba(101, 116, 205, 0.8)",
                    borderWidth: 2,
                    data: [1, 2, 1, 3, 5, 4, 7],
                }, ],
            },
            options: chartOptions
        });
        //
        var ctx = document.getElementById('chart2').getContext('2d');
        var chart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [2, 3, 2, 9, 7, 7, 4],
                datasets: [{
                    backgroundColor: "rgba(246, 109, 155, 0.1)",
                    borderColor: "rgba(246, 109, 155, 0.8)",
                    borderWidth: 2,
                    data: [2, 3, 2, 9, 7, 7, 4],
                }, ],
            },
            options: chartOptions
        });
        //
        var ctx = document.getElementById('chart3').getContext('2d');
        var chart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [2, 5, 1, 3, 2, 6, 7],
                datasets: [{
                    backgroundColor: "rgba(246, 153, 63, 0.1)",
                    borderColor: "rgba(246, 153, 63, 0.8)",
                    borderWidth: 2,
                    data: [2, 5, 1, 3, 2, 6, 7],
                }, ],
            },
            options: chartOptions
        });
    </script>



    <div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
        <div class="rounded shadow-xl overflow-hidden w-full md:flex" style="max-width:900px"
            x-data="{stockTicker:stockTicker()}" x-init="stockTicker.renderChart()">
            <div class="flex w-full md:w-1/2 px-5 pb-4 pt-8 bg-indigo-500 text-white items-center">
                <canvas id="chart" class="w-full"></canvas>
            </div>
            <div class="flex w-full md:w-1/2 p-10 bg-gray-100 text-gray-600 items-center">
                <div class="w-full">
                    <h3 class="text-lg font-semibold leading-tight text-gray-800" x-text="stockTicker.stockFullName">
                    </h3>
                    <h6 class="text-sm leading-tight mb-2"><span
                            x-text="stockTicker.stockShortName"></span>&nbsp;&nbsp;-&nbsp;&nbsp;Aug 2nd 4:00pm AEST</h6>
                    <div class="flex w-full items-end mb-6">
                        <span class="block leading-none text-3xl text-gray-800"
                            x-text="stockTicker.price.current.toFixed(3)">0</span>
                        <span class="block leading-5 text-sm ml-4 text-green-500"
                            x-text="`${stockTicker.price.high-stockTicker.price.low<0?'▼':'▲'} ${(stockTicker.price.high-stockTicker.price.low).toFixed(3)} (${(((stockTicker.price.high/stockTicker.price.low)*100)-100).toFixed(3)}%)`"></span>
                    </div>
                    <div class="flex w-full text-xs">
                        <div class="flex w-5/12">
                            <div class="flex-1 pr-3 text-left font-semibold">Open</div>
                            <div class="flex-1 px-3 text-right" x-text="stockTicker.price.open.toFixed(3)">0</div>
                        </div>
                        <div class="flex w-7/12">
                            <div class="flex-1 px-3 text-left font-semibold">Market Cap</div>
                            <div class="flex-1 pl-3 text-right" x-text="stockTicker.price.cap.m_formatter()">0</div>
                        </div>
                    </div>
                    <div class="flex w-full text-xs">
                        <div class="flex w-5/12">
                            <div class="flex-1 pr-3 text-left font-semibold">High</div>
                            <div class="px-3 text-right" x-text="stockTicker.price.high.toFixed(3)">0</div>
                        </div>
                        <div class="flex w-7/12">
                            <div class="flex-1 px-3 text-left font-semibold">P/E ratio</div>
                            <div class="pl-3 text-right" x-text="stockTicker.price.ratio.toFixed(2)">0</div>
                        </div>
                    </div>
                    <div class="flex w-full text-xs">
                        <div class="flex w-5/12">
                            <div class="flex-1 pr-3 text-left font-semibold">Low</div>
                            <div class="px-3 text-right" x-text="stockTicker.price.low.toFixed(3)">0</div>
                        </div>
                        <div class="flex w-7/12">
                            <div class="flex-1 px-3 text-left font-semibold">Dividend yield</div>
                            <div class="pl-3 text-right" x-text="`${stockTicker.price.dividend}%`">0%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        Number.prototype.m_formatter = function() {
            return this > 999999 ? (this / 1000000).toFixed(1) + 'M' : this
        };
        let stockTicker = function() {
            return {
                stockFullName: 'SW Limited.',
                stockShortName: 'ASX:SFW',
                price: {
                    current: 2.320,
                    open: 2.230,
                    low: 2.215,
                    high: 2.325,
                    cap: 93765011,
                    ratio: 20.10,
                    dividend: 1.67
                },
                chartData: {
                    labels: ['10:00', '', '', '', '12:00', '', '', '', '2:00', '', '', '', '4:00'],
                    data: [2.23, 2.215, 2.22, 2.25, 2.245, 2.27, 2.28, 2.29, 2.3, 2.29, 2.325, 2.325, 2.32],
                },
                renderChart: function() {
                    let c = false;

                    Chart.helpers.each(Chart.instances, function(instance) {
                        if (instance.chart.canvas.id == 'chart') {
                            c = instance;
                        }
                    });

                    if (c) {
                        c.destroy();
                    }

                    let ctx = document.getElementById('chart').getContext('2d');

                    let chart = new Chart(ctx, {
                        type: "line",
                        data: {
                            labels: this.chartData.labels,
                            datasets: [{
                                label: '',
                                backgroundColor: "rgba(255, 255, 255, 0.1)",
                                borderColor: "rgba(255, 255, 255, 1)",
                                pointBackgroundColor: "rgba(255, 255, 255, 1)",
                                data: this.chartData.data,
                            }, ],
                        },
                        layout: {
                            padding: {
                                right: 10
                            }
                        },
                        options: {
                            legend: {
                                display: false,
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        fontColor: "rgba(255, 255, 255, 1)",
                                    },
                                    gridLines: {
                                        display: false,
                                    },
                                }],
                                xAxes: [{
                                    ticks: {
                                        fontColor: "rgba(255, 255, 255, 1)",
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, .2)",
                                        borderDash: [5, 5],
                                        zeroLineColor: "rgba(255, 255, 255, .2)",
                                        zeroLineBorderDash: [5, 5]
                                    },
                                }]
                            }
                        }
                    });
                }
            }
        }
    </script>



    <div class="flex items-center justify-center w-screen h-screen text-black bg-gray-100">

        <!-- Component Start -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="w-48 bg-white shadow-2xl p-6 rounded-2xl">
                <div class="flex items-center">
                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-pink-100">
                        <svg class="w-4 h-4 stroke-current text-pink-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-sm font-medium text-gray-500">Followers</span>
                </div>
                <span class="block text-4xl font-semibold mt-4">1,320</span>
                <div class="flex text-xs mt-3 font-medium">
                    <span class="text-green-500">+8%</span>
                    <span class="ml-1 text-gray-500">last 14 days</span>
                </div>
            </div>
            <div class="w-48 bg-white shadow-2xl p-6 rounded-2xl">
                <div class="flex items-center">
                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-red-100">
                        <svg class="w-4 h-4 stroke-current text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-sm font-medium text-gray-500">Likes</span>
                </div>
                <span class="block text-4xl font-semibold mt-4">3,814</span>
                <div class="flex text-xs mt-3 font-medium">
                    <span class="text-green-500">+12%</span>
                    <span class="ml-1 text-gray-500">last 14 days</span>
                </div>
            </div>
            <div class="w-48 bg-white shadow-2xl p-6 rounded-2xl">
                <div class="flex items-center">
                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-blue-100">
                        <svg class="w-4 h-4 stroke-current text-blue-600" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-sm font-medium text-gray-500">Comments</span>
                </div>
                <span class="block text-4xl font-semibold mt-4">264</span>
                <div class="flex text-xs mt-3 font-medium">
                    <span class="text-red-500">-2%</span>
                    <span class="ml-1 text-gray-500">last 14 days</span>
                </div>
            </div>
        </div>
        <!-- Component End  -->



    </div>

    <div class="flex flex-col items-center justify-center w-screen h-screen px-10 py-20 text-gray-700 bg-gray-100">

        <!--
NOTES
For the purpose of this demo, the heights of the bars are simply relying on native Tailwind CSS classes.
In a proper implementation, where it represents real data, these height should be dynamically generated based on the data that feeds them.
-->

        <!-- Component Start -->
        <div class="flex flex-col items-center w-full max-w-screen-md p-6 pb-6 bg-white rounded-lg shadow-xl sm:p-8">
            <h2 class="text-xl font-bold">Monthly Revenue</h2>
            <span class="text-sm font-semibold text-gray-500">2020</span>
            <div class="flex items-end flex-grow w-full mt-2 space-x-2 sm:space-x-3">
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$37,500</span>
                    <div class="relative flex justify-center w-full h-8 bg-indigo-200"></div>
                    <div class="relative flex justify-center w-full h-6 bg-indigo-300"></div>
                    <div class="relative flex justify-center w-full h-16 bg-indigo-400"></div>
                    <span class="absolute bottom-0 text-xs font-bold">Jan</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$45,000</span>
                    <div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
                    <div class="relative flex justify-center w-full h-6 bg-indigo-300"></div>
                    <div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
                    <span class="absolute bottom-0 text-xs font-bold">Feb</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$47,500</span>
                    <div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
                    <div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
                    <div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
                    <span class="absolute bottom-0 text-xs font-bold">Mar</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$50,000</span>
                    <div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
                    <div class="relative flex justify-center w-full h-6 bg-indigo-300"></div>
                    <div class="relative flex justify-center w-full h-24 bg-indigo-400"></div>
                    <span class="absolute bottom-0 text-xs font-bold">Apr</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$47,500</span>
                    <div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
                    <div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
                    <div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
                    <span class="absolute bottom-0 text-xs font-bold">May</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$55,000</span>
                    <div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
                    <div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
                    <div class="relative flex justify-center w-full h-24 bg-indigo-400"></div>
                    <span class="absolute bottom-0 text-xs font-bold">Jun</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$60,000</span>
                    <div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
                    <div class="relative flex justify-center w-full h-16 bg-indigo-300"></div>
                    <div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
                    <span class="absolute bottom-0 text-xs font-bold">Jul</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$57,500</span>
                    <div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
                    <div class="relative flex justify-center w-full h-10 bg-indigo-300"></div>
                    <div class="relative flex justify-center w-full h-24 bg-indigo-400"></div>
                    <span class="absolute bottom-0 text-xs font-bold">Aug</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$67,500</span>
                    <div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
                    <div class="relative flex justify-center w-full h-10 bg-indigo-300"></div>
                    <div class="relative flex justify-center w-full h-32 bg-indigo-400"></div>
                    <span class="absolute bottom-0 text-xs font-bold">Sep</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$65,000</span>
                    <div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
                    <div class="relative flex justify-center w-full h-12 bg-indigo-300"></div>
                    <div class="relative flex justify-center w-full bg-indigo-400 h-28"></div>
                    <span class="absolute bottom-0 text-xs font-bold">Oct</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$70,000</span>
                    <div class="relative flex justify-center w-full h-8 bg-indigo-200"></div>
                    <div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
                    <div class="relative flex justify-center w-full h-40 bg-indigo-400"></div>
                    <span class="absolute bottom-0 text-xs font-bold">Nov</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$75,000</span>
                    <div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
                    <div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
                    <div class="relative flex justify-center w-full h-40 bg-indigo-400"></div>
                    <span class="absolute bottom-0 text-xs font-bold">Dec</span>
                </div>
            </div>
            <div class="flex w-full mt-3">
                <div class="flex items-center ml-auto">
                    <span class="block w-4 h-4 bg-indigo-400"></span>
                    <span class="ml-1 text-xs font-medium">Existing</span>
                </div>
                <div class="flex items-center ml-4">
                    <span class="block w-4 h-4 bg-indigo-300"></span>
                    <span class="ml-1 text-xs font-medium">Upgrades</span>
                </div>
                <div class="flex items-center ml-4">
                    <span class="block w-4 h-4 bg-indigo-200"></span>
                    <span class="ml-1 text-xs font-medium">New</span>
                </div>
            </div>
        </div>
        <!-- Component End  -->

    </div>


    <div class="flex flex-col items-center justify-center w-screen h-screen px-10 py-20 text-gray-700 bg-gray-100">

        <!--
 NOTES
 For the purpose of this demo, the heights of the bars are simply relying on native Tailwind CSS classes.
 In a proper implementation, where it represents real data, these height should be dynamically generated based on the data that feeds them.
 -->

        <!-- Component Start -->
        <div
            class="flex flex-col items-center w-full max-w-screen-md p-6 pb-6 mt-10 bg-white rounded-lg shadow-xl sm:p-8">
            <h2 class="text-xl font-bold">Monthly Revenue</h2>
            <span class="text-sm font-semibold text-gray-500">2020</span>
            <div class="flex items-end flex-grow w-full mt-2 space-x-2 sm:space-x-3">
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$37,500</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-6 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-16 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Jan</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$45,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-10 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-6 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-20 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Feb</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$47,500</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-10 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-20 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Mar</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$50,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-10 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-6 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-24 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Apr</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$47,500</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-10 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-20 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">May</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$55,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-24 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Jun</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$60,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-16 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-20 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Jul</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$57,500</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-10 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-24 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Aug</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$67,500</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-10 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-32 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Sep</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$65,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow bg-indigo-400 h-28"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Oct</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$70,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-40 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Nov</span>
                </div>
                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$75,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-40 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Dec</span>
                </div>
            </div>
            <div class="flex w-full mt-3">
                <div class="flex items-center ml-auto">
                    <span class="block w-4 h-4 bg-indigo-400"></span>
                    <span class="ml-1 text-xs font-medium">Existing</span>
                </div>
                <div class="flex items-center ml-4">
                    <span class="block w-4  h-4 bg-indigo-300"></span>
                    <span class="ml-1 text-xs font-medium">Upgrades</span>
                </div>
                <div class="flex items-center ml-4">
                    <span class="block w-4  h-4 bg-indigo-200"></span>
                    <span class="ml-1 text-xs font-medium">New</span>
                </div>
            </div>
        </div>
        <!-- Component End  -->
    </div>

</x-main>
