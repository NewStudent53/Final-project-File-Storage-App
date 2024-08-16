<?php
session_start();
include("connect.php");
?>

<html><head>
<title>File Manager - My Files</title>
<link rel="stylesheet" href="stylefiles.css">
</head>
<body>
  <div class="dashboard">
  <div class="sidebar">
      <svg class="logo" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="leafGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:#4CAF50;stop-opacity:1" />
            <stop offset="100%" style="stop-color:#81C784;stop-opacity:1" />
          </linearGradient>
          <linearGradient id="folderGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:#2196F3;stop-opacity:1" />
            <stop offset="100%" style="stop-color:#64B5F6;stop-opacity:1" />
          </linearGradient>
        </defs>
        <path d="M50,80 L250,80 L250,250 L50,250 Z" fill="url(#folderGradient)" />
        <path d="M50,80 L130,80 L150,50 L250,50 L250,80" fill="url(#folderGradient)" />
        <path d="M150,100 Q200,150 150,200 Q100,150 150,100" fill="url(#leafGradient)" />
        <path d="M140,170 A30,30 0 1,1 170,140" fill="none" stroke="#FFC107" stroke-width="10" stroke-linecap="round" />
        <path d="M170,200 A30,30 0 1,1 140,170" fill="none" stroke="#FFC107" stroke-width="10" stroke-linecap="round" />
        <path d="M200,170 A30,30 0 1,1 170,200" fill="none" stroke="#FFC107" stroke-width="10" stroke-linecap="round" />
        <polygon points="137,168 143,162 149,174" fill="#FFC107" />
        <polygon points="172,203 166,197 178,191" fill="#FFC107" />
        <polygon points="203,168 197,174 191,162" fill="#FFC107" />
      </svg>
      <div class="nav-item" id="dashboard">Homepage</div>
      <div class="nav-item active" id="myfiles">My Files</div>
      <div class="nav-item" id="trash">Trash</div>
    </div>
    <div class="main-content">
      <div class="header">
        <div class="search-bar">
          <input type="text" placeholder="Search in My Files...">
        </div>
        <div class="user-info">
          <img src="https://i.pravatar.cc/100" alt="User Avatar" class="user-avatar">
          <span>
          <?php 
       if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['username'];
            echo $row['Id'];
            $id = $row['Id'];
            $user_id = $row['Id'];
            echo $user_id;
        }
       }
       ?>
      </p>
          </span>
        </div>
      </div>
      <h2>My Files</h2>
      <div class="sort-options">
        <select>
          <option>Sort by: Name</option>
          <option>Sort by: Date Modified</option>
          <option>Sort by: Size</option>
          <option>Sort by: Type</option>
        </select>
      </div>
      <div class="file-grid" id="file-grid">
        <!-- File cards will be dynamically added here -->
      </div>
    </div>
  </div>
  <div class="upload-btn" id="upload-btn">+</div>

  <form action="subir-archivo.php" method="post" enctype="multipart/form-data">  <div id="upload-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Upload File</h2>
      <input type="hidden" name="user_id" value="<?php echo $id; ?>">
      <input type="file" name="archivo_fls"> 
      input
      <button id="upload-button" name="Upload">Upload</button>
    </div>
  </form>


  <script>
document.addEventListener('DOMContentLoaded', () => {
    const userId = <?php echo $id; ?>; // Tu variable user_id
    fetch(`userfiles.php?user_id=${userId}`)
        .then(response => response.json())
        .then(data => {
            const filesFromServer = data.map(file => ({
                name: file.name,
                type: file.type.split('/')[0],
                modified: file.modified
            }));

            const files = [
                ...filesFromServer
            ];

            renderFiles(files);
        })
        .catch(error => console.error('Error:', error));
});

function renderFiles(files) {
    const fileGrid = document.getElementById('file-grid');
    fileGrid.innerHTML = '';
    files.forEach(file => {
        const fileCard = document.createElement('div');
        fileCard.className = 'file-card';
        fileCard.innerHTML = `
            <div class="file-icon">${getFileIcon(file.type)}</div>
            <div class="file-name">${file.name}</div>
            <div class="file-info">Modified: ${file.modified}</div>
            <div class="file-actions">
                <span class="file-action view-action">👁️ View</span>
                <span class="file-action delete-action">🗑️ Delete</span>
            </div>
        `;
        fileGrid.appendChild(fileCard);

        // Add event listeners for view and delete actions
        fileCard.querySelector('.view-action').addEventListener('click', () => viewFile(file));
        fileCard.querySelector('.delete-action').addEventListener('click', () => deleteFile(file));
    });
}

function getFileIcon(type) {
    switch(type) {
        case 'document': return '📄';
        case 'spreadsheet': return '📊';
        case 'image': return '🖼️';
        case 'folder': return '📁';
        case 'video': return '📽️';
        case 'text': return '📝';
        default: return '📄';
    }
}

function viewFile(file) {
    alert(`Viewing ${file.name}`);
    // Here you would implement the actual file viewing logic
}

function deleteFile(file) {
    if (confirm(`Are you sure you want to delete ${file.name}?`)) {
        const index = files.indexOf(file);
        if (index > -1) {
            files.splice(index, 1);
            renderFiles(files);
        }
    }
}

const uploadBtn = document.getElementById('upload-btn');
const uploadModal = document.getElementById('upload-modal');
const closeBtn = document.getElementsByClassName('close')[0];
const fileInput = document.getElementById('file-input');
const uploadButton = document.getElementById('upload-button');

uploadBtn.onclick = function() {
    uploadModal.style.display = "block";
}

closeBtn.onclick = function() {
    uploadModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == uploadModal) {
        uploadModal.style.display = "none";
    }
}

uploadButton.onclick = function() {
    const newFiles = fileInput.files;
    for (let i = 0; i < newFiles.length; i++) {
        const file = newFiles[i];
        files.push({
            name: file.name,
            type: file.type.split('/')[0],
            modified: 'Just now'
        });
    }
    
    renderFiles(files);
    uploadModal.style.display = "none";
    fileInput.value = ''; // Clear the file input


    // Initial render
    renderFiles();
  }

    // Other event listeners (sorting, navigation) remain the same
    document.querySelector('.sort-options select').addEventListener('change', function() {
      const sortBy = this.value.split(': ')[1].toLowerCase();
      files.sort((a, b) => {
        if (a[sortBy] < b[sortBy]) return -1;
        if (a[sortBy] > b[sortBy]) return 1;
        return 0;
      });
      renderFiles();
    });

    document.querySelectorAll('.nav-item').forEach(item => {
      item.addEventListener('click', function() {
        document.querySelector('.nav-item.active').classList.remove('active');
        this.classList.add('active');
      });
    });

    document.addEventListener('DOMContentLoaded', function() {
      const dashboardElement = document.getElementById('dashboard');
      if (dashboardElement) {
        dashboardElement.addEventListener('click', function() {
          window.location.href = 'dashboard.php';
        });
      }
    });

    document.addEventListener('DOMContentLoaded', function() {
      const trashElement = document.getElementById('trash');
      if (trashElement) {
        trashElement.addEventListener('click', function() {
          window.location.href = 'trash.php';
        });
      }
    });

  </script>
</body></html>