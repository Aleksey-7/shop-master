
// переменная с ссылкой на начальную страницу интернет-магазина
var siteURL = "http://shop-master.local/";

var btnShowMore = document.querySelector("#show-more");
if(btnShowMore) {
    // функция добавления товаров на страницу AJAX методом и GET запросом
    btnShowMore.onclick = function() {
        
        var currentPageInput = document.querySelector("#current-page");
        var ajax = new XMLHttpRequest();
            ajax.open("GET", siteURL + "modules/products/get-more.php?page=" + currentPageInput.value, false);
            ajax.send();

        currentPageInput.value = +currentPageInput.value + 1;        
       
        
        if (ajax.response == "") {
            btnShowMore.style.display = "none";
        }
        var productsBlock = document.querySelector("#products");
            productsBlock.innerHTML = productsBlock.innerHTML + ajax.response;
          
    }
}

// функция добавления товара в корзину AJAX методом и POST запросом
function addToBasket(btn) {
   
    var ajax = new XMLHttpRequest();
        ajax.open("POST", siteURL + "/modules/basket/add-basket.php", false);
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        ajax.send("id=" + btn.dataset.id);

    var response = JSON.parse(ajax.response);
   

    var btnGoBasket = document.querySelector("#go-basket span");
        btnGoBasket.innerText = response.count;

}

// Удаление товара с корзины
function deleteProductBasket(obj, id) {
    console.dir(obj.parentNode.parentNode);

    var ajax = new XMLHttpRequest();
        ajax.open("POST", siteURL + "/modules/basket/delete.php", false);
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        ajax.send("id=" + id);

        alert("Product deleted");

    // Удалить строку с товаром
    obj.parentNode.parentNode.remove();

}

function changeCountBasket(obj, id, cost) {

    var ajax = new XMLHttpRequest();
        ajax.open("POST", siteURL + "/modules/basket/count.php", false);
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        ajax.send("id=" + id + "&count=" + obj.value + "&cost=" + cost);

    var totalPrice = document.querySelector("#count"+id);
    var totalCost = obj.value * cost;
        totalPrice.innerHTML = totalCost;
}

