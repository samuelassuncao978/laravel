<x-ui.form.field type="" bold label="Card">
    <div class="relative flex flex-grow">
        <div wire:ignore x-ref="cardnumber" x-init="
            cardNumber = elements.create('cardNumber',{ style });
            cardNumber.mount($refs.cardnumber);
            cardNumber.on('change', function(event) {
                if (event.complete) {
                //   alert('ready')
                } else if (event.error) {
                    // show validation to customer
                }
            });
    " class="w-full bg-transparent focus:outline-none py-3 px-4 ml-8">

        </div>
        <div
            class=" absolute left-1 top-1/2 transform -translate-y-1/2 py-2 px-3 text-gray-800 flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded overflow-hidden">
            <span class="h-4 w-4">
                <x-icon.solid icon="credit-card" />
            </span>
        </div>


    </div>
</x-ui.form.field>
