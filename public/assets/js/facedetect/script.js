const video = document.getElementById('video');

Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('/models'),
    faceapi.nets.faceExpressionNet.loadFromUri('/models'),
    faceapi.nets.ageGenderNet.loadFromUri('/models'),
]).then(getUserMedia);

async function getMedia(){
    let stream = null;
    const cameraParam = {
        audio : false,
        video : true,
    }
    try {
        stream = await navigator.mediaDevices.getUserMedia(cameraParam);
        video.srcObject = stream;
    } catch (error){
        console.error(error);
    }
}

function getUserMedia(){

    let stream = null;
    const cameraParam = {
        audio : false,
        video : true,
    }
    navigator.mediaDevices.getUserMedia(cameraParam)
        .then((stream) => {
           video.srcObject = stream;
        })
        .catch((err) => {
            /* handle the error */
            console.error(err);
        });
}

video.addEventListener('play', () => {
    const canvas = faceapi.createCanvasFromMedia(video);
    document.body.append(canvas);

    const displaySize = {
        width : video.width,
        height : video.height,
    }
    faceapi.matchDimensions(canvas, displaySize);

    setInterval(async ()=> {
        const detections =  
                    await faceapi
                        .detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
                        .withFaceLandmarks()
                        .withFaceExpressions()
                        .withAgeAndGender();

        const resizeDetections = faceapi.resizeResults(detections, displaySize);
        canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);

        faceapi.draw.drawDetections(canvas, resizeDetections);
        faceapi.draw.drawFaceLandmarks(canvas, resizeDetections);
        faceapi.draw.drawFaceExpressions(canvas, resizeDetections);
        faceapi.draw.drawAgeGender(canvas, resizeDetections);

    }, 100);
})