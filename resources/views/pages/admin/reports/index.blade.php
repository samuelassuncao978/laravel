<div class="flex flex-grow">
    @include('pages.admin.reports.sidebar')
    <x-main>
        @if ('roles' === $this->pge()->loaded)

        @elseif('journeys' === $this->pge()->loaded)

        @endif
        @include('pages.admin.reports.report')
    </x-main>
</div>
