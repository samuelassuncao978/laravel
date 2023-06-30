<div class="scroll-shadow relative overflow-hidden flex" style="max-height:50vh; " x-data="scroll_shadow()"
    x-init="init()">
    <div class="overflow-y-scroll flex flex-col scrollbar scrollbar-thumb-gray-500 flex-grow" x-ref="content">
        <x-messenger.conversations :conversations="$conversations" />
    </div>
</div>
