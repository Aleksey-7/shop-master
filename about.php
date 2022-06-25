<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/admin/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/admin/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Shop
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="/admin/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/admin/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="/admin/assets/img/sidebar-1.jpg">
      <div class="logo"><a href="#" class="simple-text logo-normal">
        Shop-Master  
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
		  <li class="nav-item <?php if($page == "story"){echo'active';}?>">
		    <a class="nav-link" href="#">
		      <i class="material-icons">dashboard</i>
		      <p>Our Story</p>
		    </a>
		  </li>
		  <li class="nav-item <?php if($page == "liders"){echo'active';}?>">
		    <a class="nav-link" href="#">
		      <i class="material-icons">person</i>
		      <p>Best Staff</p>
		    </a>
		  </li>
		  <li class="nav-item <?php if($page == "brands"){echo'active';}?>">
		    <a class="nav-link" href="#">
		      <i class="material-icons">content_paste</i>
		      <p>Our Brands</p>
		    </a>
		  </li>
		  <li class="nav-item <?php if($page == "followers"){echo'active';}?>">
		    <a class="nav-link" href="#">
		      <i class="material-icons">format_list_numbered_rtl</i>
		      <p>Followers</p>
		    </a>
		  </li>
		  <li class="nav-item <?php if($page == "log out"){echo'active';}?>">
		    <a class="nav-link" href="#">
		      <i class="material-icons">open_in_new</i>
		      <p>Log out</p>
		    </a>
		  </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="/">Home</a></li>
             <li class="breadcrumb-item active" aria-current="page">About</li>
            </ol>
          </nav>
    </div>
    <div class="col-lg-8 col-md-12">
     <div class="card">
      <div class="card-header card-header-warning">
        <h4 class="card-title">Best Staff</h4>
        <p class="card-category"></p>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
          <thead class="text-warning">
            <th>ID</th>
            <th>Name</th>
            <th>Post</th>
            <th>Country</th>
            <th>City</th>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Anton</td>
              <td>Account Manadger</td>
              <td>Ukraine</td>
              <td>Lviv</td>
            </tr>
          </tbody>
        </table>
       </div>
     </div>
   </div>
</body>





