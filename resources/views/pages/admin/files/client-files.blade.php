<div class="flex flex-col h-full">
    <div class="flex flex-col border-b border-gray-200 mx-8 py-5">
        <div class=" text-2xl mb-2 mt-4 font-semibold text-gray-700">
            Client files
        </div>

        <span class="flex items-center text-xs ">
            <div class=" pr-2 h-20 w-24 -ml-4">
                <x-ui.folder wire:click="reload" icon="collection" />
            </div>
            <span>
                <div class="mb-1 text-blue-600">
                    {{ implode(', ', [count($files) . ' Files', count($clients) . ' Folders']) }}
                </div>
                <nav class="text-gray-500 font-bold" aria-label="Breadcrumb">
                    <ol class="list-none p-0 inline-flex">
                        <li class="flex items-center">
                            <button wire:click="reload" class="hover:text-gray-800 focus:outline-none">Client
                                files</button>
                            @if (isset($client))
                                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 320 512">
                                    <path
                                        d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                                </svg>
                            @endif
                        </li>
                        @if (isset($client))
                            <li>
                                <button wire:click="load('{{ $client->id }}')"
                                    class="text-gray-400 font-normal focus:outline-none"
                                    aria-current="page">{{ $client->name }}</button>
                            </li>
                        @endif
                    </ol>
                </nav>
            </span>
        </span>



    </div>

    @if (!$client)

        @if (count($clients) < 1)
            <div class="flex flex-grow">
                <x-common.empty-notice title="No clients with files">
                    <x-icon.outline icon="folder" />
                </x-common.empty-notice>
            </div>
        @else
            @foreach ($clients as $client)
                <div class="flex relative flex-wrap m-5">
                    <div class="p-3 h-52 w-48">
                        <x-ui.folder wire:click="load('{{ $client->id }}')" :name="$client->name"
                            :items="$client->files()->owned()->count()">
                            @slot('icon')
                                <span class="flex flex-col items-center w-8 h-8">
                                    <x-ui.avatar :name="$client->name" rounded="rounded-sm" long />
                                </span>
                            @endslot
                        </x-ui.folder>
                    </div>
                </div>
            @endforeach
        @endif
    @else
        <div class="flex relative flex-wrap m-5">
            @include('pages.files.parts.files')


            <div class="p-3 h-48 w-48 m-4 flex flex-col space-y-2  rounded">
                <button
                    class="flex h-full relative focus:outline-none bg-gray-50 flex-col overflow-hidden hover:bg-gray-100 rounded-lg focus:bg-gray-50 focus:ring-2 ring-gray-100"
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Files\Create', [
    'client' => $client,
    'user' => auth()->guard('admin')->user(),
]) }}">
                    <div class="h-full w-full  flex flex-col items-center justify-center relative text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Add files
                    </div>

                    <div class="absolute inset-0 rounded overflow-hidden" wire:loading
                        wire:target="{{ $this->opens('App\Http\Livewire\Admin\Files\Create', [
    'client' => $client,
    'user' => auth()->guard('admin')->user(),
]) }}">
                        <x-ui.loading-indicator :loading="true" bg="bg-gray-50 bg-opacity-80"
                            spinner="border-gray-600" />
                    </div>

                </button>
            </div>
        </div>
        @if ($this->on('App\Http\Livewire\Admin\Files\Create'))
            @livewire('admin.files.create', $this->parameters('App\Http\Livewire\Admin\Files\Create'))
        @endif

        @if ($this->on('App\Http\Livewire\Admin\Files\Rename'))
            @livewire('admin.files.rename', $this->parameters('App\Http\Livewire\Admin\Files\Rename'))
        @endif

        @if ($this->on('App\Http\Livewire\Admin\Files\Delete'))
            @livewire('admin.files.delete', $this->parameters('App\Http\Livewire\Admin\Files\Delete'))
        @endif

        @if ($this->on('App\Http\Livewire\Admin\Files\Tag'))
            @livewire('admin.files.tag', $this->parameters('App\Http\Livewire\Admin\Files\Tag'))
        @endif

        @if ($this->on('App\Http\Livewire\Admin\Files\Share'))
            @livewire('admin.files.share', $this->parameters('App\Http\Livewire\Admin\Files\Share'))
        @endif

    @endif

</div>
