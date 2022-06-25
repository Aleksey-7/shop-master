<ul class="nav">
  <li class="nav-item <?php if($page == "home"){echo'active';}?>">
    <a class="nav-link" href="/admin">
      <i class="material-icons">dashboard</i>
      <p>Home</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "users"){echo'active';}?>">
    <a class="nav-link" href="./user.html">
      <i class="material-icons">person</i>
      <p>Users</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "products"){echo'active';}?>">
    <a class="nav-link" href="/admin/products.php">
      <i class="material-icons">content_paste</i>
      <p>Products</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "categories"){echo'active';}?>">
    <a class="nav-link" href="/admin/categories.php">
      <i class="material-icons">format_list_numbered_rtl</i>
      <p>Categories</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "orders"){echo'active';}?>">
    <a class="nav-link" href="/admin/orders.php">
      <i class="material-icons">moped</i>
      <p>Orders</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "log out"){echo'active';}?>">
    <a class="nav-link" href="#">
      <i class="material-icons">open_in_new</i>
      <p>Log out</p>
    </a>
  </li>
</ul>