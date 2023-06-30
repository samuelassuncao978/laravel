<div class="flex-grow flex min-h-full flex-col items-center justify-center bg-gray-100">
    <div class="flex w-full p-4">
        <div class="flex flex-grow flex-col justify-center items-center">
            <span class="h-20 w-20 text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" xml:space="preserve">
                    <g>
                        <path d="M77.4,16.9h-6.7v7.6c0,3.2-2.6,5.9-5.9,5.9s-5.9-2.6-5.9-5.9v-7.6H41.2v7.6c0,3.2-2.6,5.9-5.9,5.9c-3.2,0-5.9-2.6-5.9-5.9   v-7.6h-6.8c-3.8,0-6.9,3.1-6.9,6.9v59.8c0,3.8,3.1,6.9,6.9,6.9h54.8c3.8,0,6.9-3.1,6.9-6.9V23.8C84.3,20,81.2,16.9,77.4,16.9z    M80.3,83.6c0,1.6-1.3,2.9-2.9,2.9H22.6c-1.6,0-2.9-1.3-2.9-2.9V42.9h60.7V83.6z" />
                        <path d="M35.3,27.4c1.6,0,2.9-1.3,2.9-2.9V12.4c0-1.6-1.3-2.9-2.9-2.9s-2.9,1.3-2.9,2.9v12.1C32.4,26.1,33.7,27.4,35.3,27.4z" />
                        <path d="M64.8,27.4c1.6,0,2.9-1.3,2.9-2.9V12.4c0-1.6-1.3-2.9-2.9-2.9s-2.9,1.3-2.9,2.9v12.1C61.9,26.1,63.2,27.4,64.8,27.4z" />
                        <path d="M42.9,62.6l3.6-3v18.2c0,1,0.4,1.8,1.1,2.5c0.6,0.7,1.5,1.1,2.5,1.1c2,0,3.5-1.6,3.5-3.5V59.6l3.6,3c1.5,1.3,3.8,1.1,5-0.4   c0.5-0.7,0.8-1.4,0.8-2.3c0-1-0.4-2-1.3-2.7l-9.4-7.8c0,0-0.9-0.8-2.3-0.8s-2.3,0.9-2.3,0.9l-9.4,7.7c-0.8,0.7-1.3,1.7-1.3,2.7   c0,0.8,0.3,1.6,0.8,2.3C39.1,63.7,41.4,63.9,42.9,62.6z" />
                    </g>
                </svg>
            </span>
            <span class="text-2xl mt-2">Connect calendar</span>
            <span>Please choose your calendar type below to continue.</span>
        </div>
    </div>
    <div class="flex w-full">
        <div class="w-1/2 flex p-4">
            <button  onclick="outlook()" class="h-56 flex-grow flex flex-col justify-center items-center bg-white border-2 border-gray-200 hover:border-gray-700 rounded-lg p-5 text-gray-700 text-2xl">
                <span class="h-8 w-8 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                        <path style="fill:#1976D2;" d="M496,112.011H272c-8.832,0-16,7.168-16,16s7.168,16,16,16h177.376l-98.304,76.448l-70.496-44.832
                        l-17.152,27.008l80,50.88c2.592,1.664,5.6,2.496,8.576,2.496c3.456,0,6.944-1.12,9.824-3.36L480,160.715v207.296H272
                        c-8.832,0-16,7.168-16,16s7.168,16,16,16h224c8.832,0,16-7.168,16-16v-256C512,119.179,504.832,112.011,496,112.011z" />
                        <path style="fill:#2196F3;" d="M282.208,19.691c-3.648-3.04-8.544-4.352-13.152-3.392l-256,48C5.472,65.707,0,72.299,0,80.011v352
                        c0,7.68,5.472,14.304,13.056,15.712l256,48c0.96,0.192,1.952,0.288,2.944,0.288c3.712,0,7.328-1.28,10.208-3.68
                        c3.68-3.04,5.792-7.584,5.792-12.32v-448C288,27.243,285.888,22.731,282.208,19.691z" />
                        <path style="fill:#FAFAFA;" d="M144,368.011c-44.096,0-80-43.072-80-96s35.904-96,80-96s80,43.072,80,96
                        S188.096,368.011,144,368.011z M144,208.011c-26.464,0-48,28.704-48,64s21.536,64,48,64s48-28.704,48-64
                        S170.464,208.011,144,208.011z" />
                    </svg>
                </span>
                <span>Outlook</span>
                <span class="text-xs text-gray-300">Click to connect</span>
            </button>
        </div>
        <div class="w-px my-8 flex-grow bg-gray-200 flex-shrink-0"></div>
        <div class="w-1/2 flex p-4">
            <button onclick="gmail()" class="h-56 flex-grow flex flex-col justify-center items-center bg-white border-2 border-gray-200 hover:border-gray-700  p-5 rounded-lg text-gray-700 text-2xl">
                <span class="h-8 w-8  mb-4 ">
                    <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g>
                            <polygon points="484.973,122.808 452.288,451.017 59.712,451.017 33.379,129.16 256,253.802  " style="fill:#F2F2F2;" />
                            <polygon points="473.886,60.983 256,265.659 38.114,60.983 256,60.983  " style="fill:#F2F2F2;" />
                        </g>
                        <path d="M59.712,155.493v295.524H24.139C10.812,451.017,0,440.206,0,426.878V111.967l39,1.063L59.712,155.493  z" style="fill:#F14336;" />
                        <path d="M512,111.967v314.912c0,13.327-10.812,24.139-24.152,24.139h-35.56V155.493l19.692-46.525  L512,111.967z" style="fill:#D32E2A;" />
                        <path d="M512,85.122v26.845l-59.712,43.526L256,298.561L59.712,155.493L0,111.967V85.122  c0-13.327,10.812-24.139,24.139-24.139h13.975L256,219.792L473.886,60.983h13.962C501.188,60.983,512,71.794,512,85.122z" style="fill:#F14336;" />
                        <polygon points="59.712,155.493 0,146.235 0,111.967 " style="fill:#D32E2A;" />
                    </svg>
                </span>
                 <span>Gmail</span>
                <span class="text-xs text-gray-300">Click to connect</span>


            </button>
        </div>
    </div>
    <script>
        const state = "{{ $this->oauth_payload() }}";
        function gmail(){
            const url = '{{ config('services.google.authorize_url') }}';
            const payload = {
                client_id: '{{ config('services.google.client_id') }}',
                response_type: 'code',
                response_mode: 'form_post',
                access_type: 'offline',
                prompt: 'select_account consent',
                scope: 'https://www.googleapis.com/auth/calendar',
                redirect_uri: '{{ config('services.google.redirect_uri') }}',
                state: state
            }
            const endpoint = `${url}?`+ (new URLSearchParams(payload).toString());
            window.location.assign(endpoint);
        }

        function outlook(){
            const url = '{{ config('services.microsoft_graph.authorize_url') }}';
            const payload = {
                client_id: '{{ config('services.microsoft_graph.client_id') }}',
                response_type: "code",
                response_mode: "form_post",
                scope: '{{ config('services.microsoft_graph.scope') }}',
                redirect_uri: '{{ config('services.microsoft_graph.redirect_uri') }}',
                state: state
            }
            const endpoint = `${url}?`+ (new URLSearchParams(payload).toString());
            window.location.assign(endpoint);
        }
    </script>
</div>
