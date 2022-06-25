<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "orders";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Orders</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">
          Orders 
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>Login</th>
              <th>Address</th>
              <th>Time</th>
              <th>Status</th>
              <th>Products</th>
              <th>Options</th>
            </thead>
            <tbody>
                <?php
               //создаём запрос к БД на вывод товаров из таблицы заказов
               $sql = "SELECT * FROM orders";
                //выполнить sql запрос в базе данных
                $result = $conn->query($sql);
                //ложим в перемеенную $row преобразованные в массив полученные из БД данные о товаре 
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["user_id"] ?></td>
                   
                    <td><?php echo $row["address"] ?></td>
                    <td><?php echo $row["time"] ?></td>
                    <td><?php echo $row["status"] ?></td>
                    <td>
                      <a href="modules/orders/products.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Детальнее</a>
                    </td>
                    <td>
                      <a href="modules/orders/edit.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">EDIT</a> 
                  </td>
                </tr>
              <?php     
              } 
              ?>    
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>  
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?>      