document.getElementById('upload-button').onclick = function() {
    const fileInput = document.getElementById('fileInput');
    const formData = new FormData();
    formData.append('fileToUpload', fileInput.files[0]);

    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        loadFiles();
    })
    .catch(error => console.error('Error:', error));
};

function loadFiles() {
    fetch('list_files.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('fileList').innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
}

// Initial load
loadFiles();