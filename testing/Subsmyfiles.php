<?php
session_start();
include("connect.php");
//include("connectuser.php")
?>

<html><head>
<title>File Manager - My Files</title>
<link rel="stylesheet" href="stylefiles.css">
</head>
<body>
  <div class="dashboard">
    <div class="sidebar">
      <svg class="logo" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
        <!-- ... (SVG content remains the same) ... -->
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
        }
       }
       ?>
      </p>
          </span>
        </div>
      </div>
      <div class="breadcrumb">
        <a href="/dashboard">Home</a> <span>></span> <strong>My Files</strong>
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
      <input type="file" name="archivo_fls">
      <button id="upload-button" name="Upload">Upload</button>
    </div>
  </div>
  </form>


  <script>
    // Sample file data
    const files = [
      { name: "Project Proposal.docx", type: "document", modified: "2 days ago" },
      { name: "Q2 Report.xlsx", type: "spreadsheet", modified: "1 week ago" },
      { name: "Logo Design.png", type: "image", modified: "3 days ago" },
      { name: "Client Meetings", type: "folder", modified: "Yesterday" },
      { name: "Product Demo.mp4", type: "video", modified: "5 days ago" },
      { name: "Meeting Notes.txt", type: "text", modified: "4 hours ago" },
      { name: "Budget Forecast.xlsx", type: "spreadsheet", modified: "1 day ago" },
      { name: "Assets", type: "folder", modified: "2 weeks ago" }
    ];

    const fileGrid = document.getElementById('file-grid');
    const uploadBtn = document.getElementById('upload-btn');
    const uploadModal = document.getElementById('upload-modal');
    const closeBtn = document.getElementsByClassName('close')[0];
    const fileInput = document.getElementById('file-input');
    const uploadButton = document.getElementById('upload-button');

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

    function renderFiles() {
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

    function viewFile(file) {
      alert(`Viewing ${file.name}`);
      // Here you would implement the actual file viewing logic
    }

    function deleteFile(file) {
      if (confirm(`Are you sure you want to delete ${file.name}?`)) {
        const index = files.indexOf(file);
        if (index > -1) {
          files.splice(index, 1);
          renderFiles();
        }
      }
    }

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
      
      renderFiles();
      uploadModal.style.display = "none";
      fileInput.value = ''; // Clear the file input
    }

    // Initial render
    renderFiles();

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