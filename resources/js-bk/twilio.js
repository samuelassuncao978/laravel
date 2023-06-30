var Video = require('twilio-video');

window.$twilio = {
    room: null,
    token: null,
    local: {
        selected: {
            videoinput: null,
            audioinput: null,
            audiooutput: null,
        },
        tracks: {
            audio: null,
            video: null,
        },
    },
    remote: {},

    disconnect: () => {
        const { $twilio } = window;
        $twilio.room.disconnect();
        $twilio.room = null;
        const mediaContainer = document.getElementById('remote-participants');
        while (mediaContainer.firstChild) {
            mediaContainer.removeChild(mediaContainer.firstChild);
        }
    },
    connect: async (event) => {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }
        const { $twilio } = window;
        if (!$twilio.room) {
            const { local, token } = window.$twilio;
            // await $twilio.applyVideoInputDeviceChange();
            // await $twilio.applyAudioInputDeviceChange();
            console.log(
                'tracks',
                Object.values(local.tracks).filter((track) => track !== null),
            );
            $twilio.room = await Video.connect(token, {
                tracks: Object.values(local.tracks).filter((track) => track !== null),
            });
            // await $twilio.applyVideoInputDeviceChange();
            // await $twilio.applyAudioInputDeviceChange();

            $twilio.room.participants.forEach($twilio.participants.connected);
            $twilio.room.on('participantConnected', $twilio.participants.connected);
            $twilio.room.on('participantDisconnected', () => {
                console.log('disconnect');
            });

            $twilio.room.once('disconnected', (error) => {
                console.log(`Room disconnected ${error}`);
            });

            $twilio.room.on('dominantSpeakerChanged', function (participant) {
                console.log('A new RemoteParticipant is now the dominant speaker:', participant);
            });

            window.addEventListener('beforeunload', () => {
                window.$twilio.room.disconnect();
            });
        }

        return $twilio.room;
    },
    participants: {
        connected: (participant) => {
            const { tracks } = window.$twilio;
            const mediaContainer = document.getElementById('remote-participants');
            let participantDiv = document.getElementById(participant.identity);
            if (!participantDiv) {
                participantDiv = document.createElement('div');
                participantDiv.id = participant.identity;
                participantDiv.className = 'bg-green-50 w-full h-full flex';
                mediaContainer.appendChild(participantDiv);
            }
            participant.tracks.forEach((publication) => {
                tracks.published(publication, participantDiv);
            });
            participant.on('trackPublished', (publication) => {
                tracks.published(publication, participantDiv);
            });

            participant.on('trackUnpublished', tracks.unpublished);

            console.log("Participant '" + participant.identity + "' joined the room");
        },
        disconnected: (participant) => {
            console.log("Participant '" + participant.identity + "' left the room");
            const participantDiv = document.getElementById(participant.identity);
            participantDiv.parentNode.removeChild(participantDiv);
        },
    },
    tracks: {
        attach: (track, container) => {
            const element = track.attach();
            element.className = 'object-cover';
            container.appendChild(element);
        },
        detach: (track) => {
            track.detach().forEach((element) => {
                element.srcObject = null;
                element.remove();
            });
        },
        published: (publication, container) => {
            const { tracks } = window.$twilio;
            if (publication.kind === 'audio') {
            } else {
                console.log('Track was of kind ' + publication.kind + ' was published:' + publication.isSubscribed);
                if (publication.isSubscribed) {
                    tracks.attach(publication.track, container);
                }
                publication.on('subscribed', (track) => {
                    console.log('Subscribed to ' + publication.kind + ' track');
                    tracks.attach(track, container);
                });
                publication.on('unsubscribed', tracks.detatch);
            }
        },
        unpublished: (publication) => {
            console.log(publication.kind + ' track was unpublished.');
        },
    },

    applyVideoInputDeviceChange: async (event) => {
        const { local } = window.$twilio;
        if (event) {
            event.preventDefault();
            event.stopPropagation();
            local.selected.videoinput = event.target.value;
        }
        local.tracks.video = await window.$twilio.applyInputDeviceSelection(
            local.selected.videoinput,
            local.tracks.video,
            'video',
        );
        return local.tracks.video;
    },

    applyAudioInputDeviceChange: async (event) => {
        const { local } = window.$twilio;
        if (event) {
            event.preventDefault();
            event.stopPropagation();
            local.selected.audioinput = event.target.value;
        }
        local.tracks.audio = await window.$twilio.applyInputDeviceSelection(
            local.selected.audioinput,
            local.tracks.audio,
            'audio',
        );
        return local.tracks.audio;
    },

    applyAudioOutputDeviceChange: (event) => {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
            local.selected.audiooutput = event.target.value;
        }
        const { local } = window.$twilio;

        // Note: not supported on safari
        if (local.selected.audiooutput) {
            applyAudioOutputDeviceSelection(
                local.selected.audiooutput,
                document.querySelector('audio#audioinputpreview'),
            );
        }
    },

    waveform: require('./twilio.waveform'),
    getDevicesOfKind: (deviceInfos, kind) => {
        return deviceInfos.filter(function (deviceInfo) {
            return deviceInfo.kind === kind;
        });
    },
    applyAudioOutputDeviceSelection: (deviceId, audio) => {
        return typeof audio.setSinkId === 'function'
            ? audio.setSinkId(deviceId)
            : Promise.reject('This browser does not support setting an audio output device');
    },
    applyInputDeviceSelection: (deviceId, localTrack, kind) => {
        var constraints = { deviceId: { exact: deviceId } };
        if (localTrack) {
            return localTrack.restart(constraints).then(function () {
                return localTrack;
            });
        }
        return kind === 'audio' ? Video.createLocalAudioTrack(constraints) : Video.createLocalVideoTrack(constraints);
    },
    ensureMediaPermissions: () => {
        return navigator.mediaDevices
            .enumerateDevices()
            .then(function (devices) {
                return devices.every(function (device) {
                    return !(device.deviceId && device.label);
                });
            })
            .then(function (shouldAskForMediaPermissions) {
                if (shouldAskForMediaPermissions) {
                    return navigator.mediaDevices
                        .getUserMedia({ audio: true, video: true })
                        .then(function (mediaStream) {
                            mediaStream.getTracks().forEach(function (track) {
                                track.stop();
                            });
                        });
                }
            });
    },
    getDeviceSelectionOptions: () => {
        // before calling enumerateDevices, get media permissions (.getUserMedia)
        // w/o media permissions, browsers do not return device Ids and/or labels.
        return window.$twilio.ensureMediaPermissions().then(function () {
            return navigator.mediaDevices.enumerateDevices().then(function (deviceInfos) {
                var kinds = ['audioinput', 'audiooutput', 'videoinput'];
                return kinds.reduce(function (deviceSelectionOptions, kind) {
                    deviceSelectionOptions[kind] = window.$twilio.getDevicesOfKind(deviceInfos, kind);
                    return deviceSelectionOptions;
                }, {});
            });
        });
    },
};
