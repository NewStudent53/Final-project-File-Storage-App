<?php
session_start();
include("connect.php");

?>

<html><head>
<title>File Manager - Trash</title>
<link rel="stylesheet" type="text/css" href="styles/trash.css">
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
      <div class="nav-item" id="myfiles">My Files</div>
      <div class="nav-item active" id="trash">Trash</div>
    </div>
    <div class="main-content">
      <div class="header">
        <div class="search-bar">
          <input type="text" placeholder="Search in Trash...">
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
        }
       }
       ?>
      </p>
          </span>
        </div>
      </div>
      <h2>Trash</h2>
      <p>Files in the trash will be automatically deleted after 30 days.</p>
      <ul class="trash-list">
        <li class="trash-item">
          <div class="file-icon">📄</div>
          <div class="file-details">
            <div class="file-name">Old Project Proposal.docx</div>
            <div class="file-info">Deleted: 3 days ago • Size: 2.5 MB</div>
          </div>
          <div class="action-buttons">
            <button class="btn btn-recover">Recover</button>
            <button class="btn btn-delete">Delete</button>
          </div>
        </li>
        <li class="trash-item">
          <div class="file-icon">📊</div>
          <div class="file-details">
            <div class="file-name">Q1 Report Draft.xlsx</div>
            <div class="file-info">Deleted: 1 week ago • Size: 5.1 MB</div>
          </div>
          <div class="action-buttons">
            <button class="btn btn-recover">Recover</button>
            <button class="btn btn-delete">Delete</button>
          </div>
        </li>
        <li class="trash-item">
          <div class="file-icon">🖼️</div>
          <div class="file-details">
            <div class="file-name">Old Logo Design.png</div>
            <div class="file-info">Deleted: 2 weeks ago • Size: 1.8 MB</div>
          </div>
          <div class="action-buttons">
            <button class="btn btn-recover">Recover</button>
            <button class="btn btn-delete">Delete</button>
          </div>
        </li>
        <li class="trash-item">
          <div class="file-icon">📁</div>
          <div class="file-details">
            <div class="file-name">Archived Projects</div>
            <div class="file-info">Deleted: 3 weeks ago • Size: 256 MB</div>
          </div>
          <div class="action-buttons">
            <button class="btn btn-recover">Recover</button>
            <button class="btn btn-delete">Delete</button>
          </div>
        </li>
      </ul>
      <div class="empty-trash">
        <div class="empty-trash-icon">🗑️</div>
        <h3>Trash is Empty</h3>
        <p>There are no items in the trash.</p>
      </div>
    </div>
  </div>

  <script>
    document.querySelectorAll('.nav-item').forEach(item => {
      item.addEventListener('click', function() {
        if (!this.classList.contains('active')) {
        //  alert(`Navigating to ${this.textContent}`);
        }
      });
    });

    document.querySelectorAll('.btn-recover').forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.stopPropagation();
        const fileName = this.closest('.trash-item').querySelector('.file-name').textContent;
        alert(`Recovering ${fileName}`);
        this.closest('.trash-item').remove();
      });
    });

    document.querySelectorAll('.btn-delete').forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.stopPropagation();
        const fileName = this.closest('.trash-item').querySelector('.file-name').textContent;
        if (confirm(`Are you sure you want to permanently delete ${fileName}?`)) {
          alert(`Permanently deleted ${fileName}`);
          this.closest('.trash-item').remove();
        }
      });
    });

    document.querySelector('.search-bar input').addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      document.querySelectorAll('.trash-item').forEach(item => {
        const fileName = item.querySelector('.file-name').textContent.toLowerCase();
        if (fileName.includes(searchTerm)) {
          item.style.display = 'flex';
        } else {
          item.style.display = 'none';
        }
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
      const filesElement = document.getElementById('myfiles');
      if (filesElement) {
        filesElement.addEventListener('click', function() {
          window.location.href = 'myfiles.php';
        });
      }
    });

  </script>
</body></html>