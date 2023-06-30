<div class="flex flex-grow">
    <x-sidebar>
        @include('pages.admin.files.sidebar')
    </x-sidebar>
    <x-main>






        @if ($this->pge()->loaded === 'App\Http\Livewire\Admin\Files\Mine')
            @livewire('admin.files.mine',$this->pge()->parameters(),key('App\Http\Livewire\Admin\Files\Mine'))
        @endif

        @if ($this->pge()->loaded === 'App\Http\Livewire\Admin\Files\Tagged')
            @livewire('admin.files.tagged', $this->pge()->parameters(),key($this->pge()->parameters('tag')->id))
        @endif

        @if ($this->pge()->loaded === 'App\Http\Livewire\Admin\Files\ClientFiles')
            @livewire('admin.files.client-files',
            $this->pge()->parameters(),key('App\Http\Livewire\Admin\Files\ClientFiles'))
        @endif

        @if ($this->pge()->loaded === 'App\Http\Livewire\Admin\Files\Search')
            @livewire('admin.files.search',
            $this->pge()->parameters(),key('search-'.$this->pge()->parameters('search')))
        @endif

        @if ($this->pge()->loaded === 'shared-with-me')
            <div>Shared files</div>
        @endif


        @if ($this->on('App\Http\Livewire\Admin\Tags\Create'))
            @livewire('admin.tags.create', $this->parameters('App\Http\Livewire\Admin\Tags\Create'))
        @endif

        @if ($this->on('App\Http\Livewire\Admin\Tags\Edit'))
            @livewire('admin.tags.edit', $this->parameters('App\Http\Livewire\Admin\Tags\Edit'))
        @endif

        @if ($this->on('App\Http\Livewire\Admin\Tags\Delete'))
            @livewire('admin.tags.delete', $this->parameters('App\Http\Livewire\Admin\Tags\Delete'))
        @endif





    </x-main>
</div>
