<?php 
include "configs/db.php";
include "parts/header.php";

// номер страницы соответствует GET запросу иначе номер страницы 1
if (!isset($_GET["page"])) $page = 1; else $page = $_GET["page"]; 
// выводим общее число товаров из БД таблицы
$count_query = $conn->query("SELECT COUNT(*) FROM products");
// создаём массив данных
$count_array = $count_query->fetch_array(MYSQLI_NUM);
// создаём начальную точку отсчёта данных массива
$count = $count_array[0];
// создаём лимит товаров на одну страницу
$limit = 6;
// выводим на каждой последующей странице ещё по 6 товаров
$start = ($page * $limit) - $limit;
// получаем количество страниц = целому числу
$length = ceil($count / $limit);
// запрос в БД на получение товаров согласно требованиям выше
$query = $conn->query("SELECT * FROM products LIMIT $start, $limit");
//setcookie("basket", "", 0, "/");
?>

<div class="row" id="products">
<?php
	while ($row = mysqli_fetch_assoc($query)) {
	   include "parts/product_card.php";
	}
?>	
</div>
<div class="row">
	<div class="col-4 offset-4">
        <input type="hidden" value="1" id="current-page">
		<button class="btn btn-primary btn-lg" id="show-more">Показать ещё</button>	 
	</div>	
</div>
<ul class="pagination pagination-sm">
	<li class="page-item active" aria-current="page">
		<?php
        foreach (range(1, $length) as $p){
        ?>    
           <li class="page-item <?php if($_GET["page"] == $p){ echo 'active'; } ?>"><a class="page-link" href="index.php?page=<?php echo $p; ?>"><?php echo $p; ?></a>
           </li>
        <?php  
        }
		?>
	</li>
</ul>
<?php include "parts/footer.php"; ?>

	