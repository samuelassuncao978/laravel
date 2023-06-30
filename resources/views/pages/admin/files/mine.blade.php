<div class="flex flex-col h-full">
    <div class="flex flex-col border-b border-gray-200 mx-8 py-5">
        <div class=" text-2xl mb-2 mt-4 font-semibold text-gray-700">
            My files
        </div>

        <span class="flex items-center text-xs ">
            <div class=" pr-2 h-20 w-24 -ml-4">
                <x-ui.folder wire:click="reload" icon="collection" />
            </div>
            <span>
                <div class="mb-1 text-blue-600">
                    {{ implode(', ', [count($files) . ' Files', count($folders) . ' Folders']) }}
                </div>
                <nav class="text-gray-500 font-bold" aria-label="Breadcrumb">
                    <ol class="list-none p-0 inline-flex">
                        <li class="flex items-center">
                            <button wire:click="reload" class="hover:text-gray-800 focus:outline-none">My files</button>
                            @if (isset($parent))
                                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 320 512">
                                    <path
                                        d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                                </svg>
                            @endif
                        </li>
                        @if (isset($parent))
                            @foreach ($parent->path() as $folder)
                                <li wire:key="path-{{ $folder->id }}" class="flex items-center">
                                    <button wire:click="load('{{ $folder->id }}')"
                                        class="hover:text-gray-800 focus:outline-none">{{ $folder->name }}</button>
                                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 320 512">
                                        <path
                                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                                    </svg>
                                </li>
                            @endforeach
                            <li>
                                <button wire:click="load('{{ $parent->id }}')"
                                    class="text-gray-400 font-normal focus:outline-none"
                                    aria-current="page">{{ $parent->name }}</button>
                            </li>
                        @endif
                    </ol>
                </nav>
            </span>
        </span>


    </div>
    <div class="flex relative flex-wrap m-5">

        @include('pages.files.parts.folders')
        @include('pages.files.parts.files')

        @include('pages.files.parts.add')
    </div>


    @if ($this->on('App\Http\Livewire\Admin\Files\Create'))
        @livewire('admin.files.create', $this->parameters('App\Http\Livewire\Admin\Files\Create'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Files\View'))
        @livewire('admin.files.view',$this->parameters('App\Http\Livewire\Admin\Files\View'))
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

    @if ($this->on('App\Http\Livewire\Admin\Folders\Create'))
        @livewire('admin.folders.create', $this->parameters('App\Http\Livewire\Admin\Folders\Create'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Folders\Edit'))
        @livewire('admin.folders.edit', $this->parameters('App\Http\Livewire\Admin\Folders\Edit'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Folders\Tag'))
        @livewire('admin.folders.tag', $this->parameters('App\Http\Livewire\Admin\Folders\Tag'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Folders\Delete'))
        @livewire('admin.folders.delete', $this->parameters('App\Http\Livewire\Admin\Folders\Delete'))
    @endif


</div>
