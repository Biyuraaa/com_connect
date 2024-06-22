<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
<title>My Activity</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset("assets/css/dashboard.css") }}" />
<!-- Font Awesome Cdn Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

<style>
  table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
  }

  th, td {
      border: 1px solid #151414b6;
      padding: 10px;
      text-align: left;
  }

  th {
      background-color: #6ba488bc;
      color: white;
  }

  tr:nth-child(even) {
      background-color: #f2f2f2;
  }

  button, input[type="text"] {
      padding: 10px;
      border: none;
      border-radius: 5px;
      margin-bottom: 10px;
  }

  button {
      background-color: #007bff;
      color: white;
      cursor: pointer;
  }

  button:hover {
      background-color: #0056b3;
  }

  .fa-edit, .fa-trash-alt, .fa-search, .fa-bell, .fa-eye {
      color: white;
      cursor: pointer;
      margin-right: 5px;
  }

  nav {
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      width: 250px;
      background-color: #454f48e0;
      padding-top: 50px;
      transition: all 0.3s;
      z-index: 9999;
      color: white;
      overflow-x: hidden;
      scrollbar-width: none;
  }

  .side_navbar a, .side_navbar span {
      color: #f9f9f9;
  }

  .side_navbar i {
      color: #dadfce;
  }

  .side_navbar a:hover {
      background-color: #6ba488bc;
      color: #fbfffde0;
      border-radius: 25px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  }

  .overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 9998;
      display: none;
  }

  .toggle-btn {
      position: absolute;
      top: 10px;
      right: 5px;
      color: #dadfce;
      cursor: pointer;
      z-index: 9999;
  }

  #sidebar.hide {
      width: 60px;
  }

  .overlay.collapsed {
      display: none;
  }

  .summary {
      margin-top: 20px;
      display: flex;
      flex-wrap: nowrap;
      overflow-x: auto;
  }

  .summary-item {
      width: calc(25% - 20px);
      margin-right: 20px;
      margin-bottom: 20px;
      padding: 20px;
      border-radius: 10px;
      background-color: #f8f9fa;
  }

  .summary-item.icon-wrapper {
      display: flex;
      align-items: center;
  }

  .summary-item.icon-counter {
      margin-left: 5px;
      padding: 5px 10px;
      background-color: #007bff;
      color: white;
      border-radius: 15px;
      font-weight: bold;
      font-size: 1.5rem;
  }

  .summary-item i {
      font-size: 36px;
      margin-right: 10px;
      padding: 10px;
      background-color: rgba(255, 255, 255, 0.5);
      border-radius: 50%;
  }

  .new-users, .total-users, .communities, .volunteer-activities {
      background-color: #60bcd3d7;
      border: 2px solid #817c74;
      color: #000;
  }

  .cardName {
      color: var(--black2);
      font-size: 1.1rem;
      margin-top: 5px;
  }

  .activities-and-recent-users {
      display: flex;
  }

  .activities {
      flex: 2;
      margin-right: 20px;
  }

  .recent-users {
      flex: 1;
  }

  .user-card {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
  }

  .user-card img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
  }

  .user-card i {
      font-size: 24px;
      margin-right: 10px;
  }

  td.status-soon {
      padding: 10px;
      background-color: #007bff;
      color: white;
  }

  td.status-on-progress {
      padding: 10px;
      background-color: #ffc107;
  }

  td.status-done {
      padding: 10px;
      background-color: #28a745;
      color: white;
  }

  .profile-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 10px;
      margin-bottom: 20px;
  }

  .profile-details {
      flex-grow: 1;
      margin-left: 20px;
  }

  .profile-details h3 {
      margin-bottom: 10px;
  }

  .profile-details p {
      margin: 5px 0;
  }

  .profile-image {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      overflow: hidden;
  }

  .profile-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
  }

  .change-photo {
      font-size: 14px;
      color: #007bff;
      cursor: pointer;
  }

  .search_box {
      position: absolute;
      top: 20px;
      right: 20px;
      display: flex;
      align-items: center;
  }

  .search_box input[type="text"] {
      padding: 10px;
      border-radius: 5px;
      border: none;
      outline: none;
  }

  .search_box i {
      margin-left: 5px;
      color: #007bff;
      cursor: pointer;
  }

  .side_navbar .hidden-text {
      display: none;
  }

  nav.collapsed {
      width: 50px;
  }

  .main-body.collapsed {
      margin-left: 50px;
  }
</style>

</head>

<body>
<header class="header">
  <div class="profile-and-search">
    <div class="logo"></div>
  </div>
</header>
@include('components.sidebar')

<div class="overlay" onclick="toggleSidebar()"></div>

@yield('content')

<script>
  document.getElementById('change-photo').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('profile-picture').src = e.target.result;
      }
      reader.readAsDataURL(file);
    }
  });

  // Tambahkan kode ini ke dashboard.js
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.querySelector('.overlay');
    const mainBody = document.querySelector('.main-body');
    sidebar.classList.toggle('hidden');
    overlay.classList.toggle('hidden');
    const itemNavs = sidebar.querySelectorAll('.item-nav');  // Select all elements with class "item-nav" within the sidebar
      itemNavs.forEach(itemNav => itemNav.classList.toggle('hidden'));
    if (sidebar.classList.contains('hidden')) {
      sidebar.style.width = '100px'; // Mengubah lebar sidebar saat disembunyikan
    } else {
      sidebar.style.width = '250px'; // Mengembalikan lebar sidebar saat ditampilkan kembali
    }
    mainBody.classList.toggle('hidden'); // Toggle class collapsed pada main-body
  }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
