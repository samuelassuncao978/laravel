<div class="scroll-shadow h-full relative overflow-hidden" x-data="scroll_shadow()" x-init="init()">
    <div class="scroller space-y-4 py-3 p-5  overflow-y-scroll scrollbar scrollbar-thumb-gray-300 h-full"
        x-ref="content">
        {{ $slot ?? '' }}
    </div>
</div>
