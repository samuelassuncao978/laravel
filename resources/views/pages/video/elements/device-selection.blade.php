<div class="flex flex-col" x-data="{
        deviceSelections: {
            audioinput: $refs.audio_input,
            audiooutput: $refs.audio_output,
            videoinput: $refs.video_input
        },
        init(){
            window.$twilio.getDeviceSelectionOptions()
                .then((deviceSelectionOptions)=>{
                ['audioinput', 'audiooutput', 'videoinput'].forEach((kind)=>{
                    var kindDeviceInfos = deviceSelectionOptions[kind];
                    var select = this.deviceSelections[kind];
                    [].slice.call(select.children).forEach(function(option) {
                        option.remove();
                    });
                    kindDeviceInfos.forEach(function(kindDeviceInfo) {
                        var deviceId = kindDeviceInfo.deviceId;
                        var label = kindDeviceInfo.label || 'Device [ id: '
                        + deviceId.substr(0, 5) + '... ]';

                        var option = document.createElement('option');
                        option.value = deviceId;
                        option.appendChild(document.createTextNode(label));
                        select.appendChild(option);
                    });
                    const { local } = window.$twilio
                    local.selected.videoinput = this.deviceSelections.videoinput.value
                    local.selected.audiooutput = this.deviceSelections.audiooutput.value
                    local.selected.audioinput = this.deviceSelections.audioinput.value
                });
            });
            navigator.mediaDevices.ondevicechange = this.options;

        }
    }">
    <div class="flex">
        <div>Video: </div>
        <div><select x-ref="video_input" x-on:change="window.$twilio.applyAudioInputDeviceChange"></select></div>
    </div>
    <div class="flex">
        <div>Audio:</div>
        <div><select x-ref="audio_output" x-on:change="window.$twilio.applyAudioOutputDeviceChange"></select></div>
    </div>
    <div class="flex">
        <div>Mic:</div>
        <div><select x-ref="audio_input" x-on:change="window.$twilio.applyAudioInputDeviceChange"></select></div>

    </div>
</div>
