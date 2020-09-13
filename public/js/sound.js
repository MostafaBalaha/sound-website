const types = /(\.mp3|\.ogg|\.wav|\.aif)$/i;
const token = document.getElementById('_csrfToken').value

let fileInput = document.getElementById('soundFile');
let fileInput2 = document.getElementById('soundFile2');


$(window).ready(function () {
    $('#uploadSoundFile').on('click',e=>{
        e.preventDefault()

        if(fileInput.files.length == 0){
            alert("Please, choose the sound file")
        }else if(!types.exec(fileInput.value)){
            alert('You haven\'t choose an audio file')
        }
        else{
            audioFile = fileInput.files[0];
            exten = fileInput.value.split('.')[1]
            uploadAudio(audioFile,exten,token)
        }
    })

    $('#uploadSoundFile2').on('click',e=>{
        e.preventDefault()

        if(fileInput2.files.length == 0){
            alert("Please, choose the sound file")
        }else if(!types.exec(fileInput2.value)){
            alert('You haven\'t choose an audio file')
        }
        else{
            audioFile = fileInput2.files[0];
            exten = fileInput2.value.split('.')[1]
            uploadAudio2(audioFile,exten,token)
        }
    })
});


function uploadAudio(audio,exten,csrf){
    let formData = new FormData();
    formData.append('audio',audio);
    formData.append('ext',exten);
    const config = {
        onUploadProgress: function(progressEvent) {
            var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total)
            $('#output').html('');
            if(percentCompleted < 100){
                $('#statusLabel').text('Uploading: '+ percentCompleted + ' %')
            }else{
                $('#statusLabel').text('Waiting for server response')
            }
        }
    };
    axios.post('/api/sound/upload/convert',formData,config,{headers: { 'Content-Type': 'multipart/form-data','X-CSRF-TOKEN': csrf }})
        .then(res => {
            $('#statusLabel').text('Done')
            $('#output').html(' <h2>Result:</h2><div class="alert alert-primary" role="alert">\n' + res.data.transcript +
                '                        </div>');
            console.log(res);
        }).catch(error=>console.log(error));

}

function uploadAudio2(audio,exten,csrf){
    let formData = new FormData();
    formData.append('audio',audio);
    formData.append('ext',exten);
    const config = {
        onUploadProgress: function(progressEvent) {
            var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total)
            $('#output2').html('');
            if(percentCompleted < 100){
                $('#statusLabel2').text('Uploading: '+ percentCompleted + ' %')
            }else{
                $('#statusLabel2').text('Waiting for server response')
            }
        }
    };
    axios.post('/api/sound/upload/emo',formData,config,{headers: { 'Content-Type': 'multipart/form-data','X-CSRF-TOKEN': csrf }})
        .then(res => {
            $('#statusLabel2').text('Done')
            $('#output2').html(' <h2>Result:</h2><div class="alert alert-primary" role="alert">\n' + res.data.emo +
                '                        </div>');
            console.log(res);
        }).catch(error=>console.log(error));

}