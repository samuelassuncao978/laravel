<x-ui.form.field type="" bold label="Expiry">
    <div wire:ignore x-init="
            cardExpiry = elements.create('cardExpiry',{ style });
            cardExpiry.mount($refs.cvc);
            cardExpiry.on('change', function(event) {
                if (event.complete) {
                //   alert('ready')
                } else if (event.error) {
                    // show validation to customer
                }
            });
    " x-ref="cvc" class="w-full bg-transparent focus:outline-none py-3 px-4"></div>
</x-ui.form.field>
