<div x-data="{
    ready:{
        card: false,
        exp: false,
        cvc: false
    },
    intent(callback){
        this.stripe.createSource(this.cardNumber, {
            type: 'card',
            amount: '{{ $attributes->get('amount') }}', // This is in cents
            currency: 'aud',
            usage: 'single_use'
        }).then((intent) => {
            if (intent.source) {
                const { id, amount, card: { brand, country, exp_month, exp_year, last4, funding } = {}, currency } = intent.source
                $dispatch('input',JSON.stringify({
                    source: id,
                    amount,
                    currency,
                    type: `${brand}/${funding}`,
                    country,
                    card: `---- ---- ---- ${last4}`,
                    expiry: `${(`0${exp_month}`).slice(-2)}/${exp_year}`,
                }));
                callback();
            }
        });
    },
    stripe:null,
    elements: null,
    cardNumber: null,
    style: {
            base: {
                iconColor: 'rgba(55, 65, 81,1)',
                color: 'rgba(55, 65, 81,1)',
                fontWeight: '400',
                fontFamily: 'Arial',
                fontSize: '13.3333px',
                fontSmoothing: 'antialiased',
                ':-webkit-autofill': {
                    color: '#fce883',
                },
                '::placeholder': {
                    color: 'rgba(55, 65, 81,0.5)'
                },
            },
            invalid: {
                iconColor: 'rgba(55, 65, 81,1)',
                color: 'rgba(55, 65, 81,1)'
            },
        }
}" x-init="
    stripe = Stripe('pk_test_YynsCwK3SnrO9m8n0UL61QfA');
    elements = stripe.elements();







">

    {{ $slot }}

</div>
