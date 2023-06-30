<div class="modal fixed inset-0 bg-black opacity-25 z-40"></div>
<div {{ $attributes->merge(['class' => 'fixed left-1/2 top-1/2 transform -translate-y-1/2 -translate-x-1/2 z-50']) }}>
    <div class="relative bg-white shadow rounded-md ">
        {{ $slot ?? '' }}
    </div>
</div>
