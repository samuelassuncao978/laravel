<div class="flex flex-grow" x-data="{
    window_object_reference: null,
     window_interval_check: null,
    width: 600,
    height: 700,
    assertion: null,
    onComplete(){
        {!! $attributes->get('onComplete') ?? '' !!}
    },
    assert(payload){
        if (window.opener) {
            window.opener.postMessage(payload);
            window.close();
        }
    },
    receiver(event){
        const { data } = event;
        this.assertion = data

        if (window.location.origin === event.origin && this.assertion.complete) {
            this.onComplete()
            this.unload();
            if (data.source === 'lma-login-redirect') {
                window.location.pathname = '/';
            }
        }
    },
    invoke (url, credentials) {
        const top = (screen.height - this.height) / 4, left = (screen.width - this.width) / 2;
        const features = `toolbar=no, menubar=no, width=${this.width}, height=${this.height}, top=${top}, left=${left}`;

        if (this.window_object_reference === null || this.window_object_reference.closed) {
            this.window_object_reference = window.open(url, 'Authenticate', features);
            window.addEventListener('message', event => this.receiver(event), false);
            this.window_interval_check = window.setInterval(()=>{
                if (this.window_object_reference.closed) {
                    this.unload()
                }
            }, 1000);
        } else {
            this.window_object_reference.focus();
        }
    },
    unload(){
        if (this.window_object_reference === null || this.window_object_reference.closed) {
            window.clearInterval(this.window_interval_check);
            window.removeEventListener('message', this.receiver);
            this.window_object_reference = null;
            this.window_interval_check = null;
        }else{

        }
    }
}">
    {{ $slot ?? '' }}
</div>


<script>
    // let windowObjectReference = null;
    // let previousUrl = null;




    // const openSignInWindow = (url, name) => {
    //    // remove any existing event listeners

    //   const width = 600;
    //   const height = 700;

    //    window.removeEventListener('message', receiveMessage);

    //    // window features

    //    // Fixes dual-screen position                             Most browsers      Firefox
    //    const top = (screen.height - height) / 4, left = (screen.width - width) / 2;

    //    const strWindowFeatures =
    //      `toolbar=no, menubar=no, width=${width}, height=${height}, top=${top}, left=${left}`;

    //    if (windowObjectReference === null || windowObjectReference.closed) {
    //      /* if the pointer to the window object in memory does not exist
    //       or if such pointer exists but the window was closed */
    //      windowObjectReference = window.open(url, name, strWindowFeatures);
    //    } else if (previousUrl !== url) {
    //      /* if the resource to load is different,
    //       then we load it in the already opened secondary window and then
    //       we bring such window back on top/in front of its parent window. */
    //      windowObjectReference = window.open(url, name, strWindowFeatures);
    //      windowObjectReference.focus();
    //    } else {
    //      /* else the window reference must exist and the window
    //       is not closed; therefore, we can bring it back on top of any other
    //       window with the focus() method. There would be no need to re-create
    //       the window or to reload the referenced resource. */
    //      windowObjectReference.focus();
    //    }

    //    // add the listener for receiving a message from the popup
    //    window.addEventListener('message', event => receiveMessage(event), false);
    //    // assign the previous URL
    //    previousUrl = url;
    //  };


    //  const post_back = (data)=>{

    //   if (window.opener) {
    //     // send them to the opening window
    //     window.opener.postMessage(data);
    //     // close the popup
    //     window.close();
    //   }

    //  }
</script>
