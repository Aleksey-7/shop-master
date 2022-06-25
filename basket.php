<?php
include "configs/db.php";
include "parts/header.php";
?>
     
<div class="row" id="products">
    <table class="table table-dark">
	  <thead>
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Title</th>
	      <th scope="col">Count</th>
        <th scope="col">Costs</th>
        <th scope="col">Options</th>
	    </tr>
	  </thead>
	  <tbody>
        <?php
            // если есть выбранный куки корзины
            if (isset($_COOKIE["basket"])) {
    	        // преобразуем JSON в массив данных
    	        $basket = json_decode($_COOKIE["basket"], true);
    	        // цикл вывода названия и айди выбранных товаров в корзине
    	        for ($i = 0; $i < count($basket["basket"]); $i++) {
    	            $sql = "SELECT * FROM products WHERE id=" . $basket["basket"][$i]["product_id"];
    	            $result = $conn->query($sql);
    	            $product = mysqli_fetch_assoc($result);  
    	        ?>
                    <tr>
					    <th scope="row"><?php echo $product["id"] ?></th>
					    <td><?php echo $product["title"] ?></td>
					    <td>
                <input type="number" id="count" name="count" value="<?php echo  $basket["basket"][$i]["count"] ?>"
                 onchange="changeCountBasket(this,  <?php echo $product["id"] ?>)">
              </td>
              <td><?php echo number_format($product["cost"] * $basket["basket"][$i]["count"]) ?></td>
              <td>
                <button onclick="deleteProductBasket(this, <?php echo $product["id"] ?>)" class="btn btn-danger">Delete</button>
              </td>
					</tr>
    	        <?php	
    	        }
	        }
        ?> 
	  </tbody>
    </table>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Оформить заказ</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="/modules/basket/order.php">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Ваше имя</label>
                    <input name="username" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Ваш адрес</label>
                    <input name="address" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Ваш телефон</label>
                    <input name="phone" type="text" class="form-control">
                  </div>
                </div>
              </div>
              
            
              <button name="submit" value="1" type="submit" class="btn btn-success pull-right">Оформить заказ</button>
              <div class="clearfix"></div>

            </form>
        </div>
      </div>
  </div>
</div>
<?php
include "parts/footer.php";
?>
