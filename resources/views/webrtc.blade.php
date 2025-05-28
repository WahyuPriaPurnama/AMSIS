<!DOCTYPE html>
<html>

<head>
    <title>Simple WebRTC Video Call</title>
    <style>
        video {
            width: 45%;
            margin: 10px;
            border: 2px solid #333;
        }
    </style>
</head>

<body>
    <h2>WebRTC Video Call (Local Test)</h2>
    <video id="localVideo" autoplay playsinline muted></video>
    <video id="remoteVideo" autoplay playsinline></video>

    <script>
        const localVideo = document.getElementById('localVideo');
        const remoteVideo = document.getElementById('remoteVideo');

        const peerConnection = new RTCPeerConnection();

        // Ambil kamera & mic
        navigator.mediaDevices.getUserMedia({
                video: true,
                audio: true
            })
            .then(stream => {
                localVideo.srcObject = stream;

                // Tambahkan stream ke peer connection
                stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));
            });

        // Saat menerima track dari peer
        peerConnection.ontrack = event => {
            remoteVideo.srcObject = event.streams[0];
        };

        // Buat offer
        peerConnection.createOffer()
            .then(offer => peerConnection.setLocalDescription(offer))
            .then(() => {
                // Simulasi signaling dengan "loopback" (langsung ke remote)
                const remotePC = new RTCPeerConnection();

                remotePC.ontrack = event => {
                    remoteVideo.srcObject = event.streams[0];
                };

                remotePC.onicecandidate = e => {
                    if (e.candidate) peerConnection.addIceCandidate(e.candidate);
                };

                peerConnection.onicecandidate = e => {
                    if (e.candidate) remotePC.addIceCandidate(e.candidate);
                };

                remotePC.ondatachannel = event => {}; // tidak digunakan di demo ini

                // Ambil stream lokal
                navigator.mediaDevices.getUserMedia({
                        video: true,
                        audio: true
                    })
                    .then(stream => {
                        stream.getTracks().forEach(track => remotePC.addTrack(track, stream));
                    });

                remotePC.setRemoteDescription(peerConnection.localDescription);
                remotePC.createAnswer()
                    .then(answer => remotePC.setLocalDescription(answer))
                    .then(() => {
                        peerConnection.setRemoteDescription(remotePC.localDescription);
                    });
            });
    </script>
</body>

</html>
