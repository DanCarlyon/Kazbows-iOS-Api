<?php
header("Content-Type: text/html");
include '../api/AltoRouter.php';
$router = new AltoRouter();
$router->setBasePath('');

$router->addMatchTypes(array('uId'=>'[a-zA-Z0-9_.-]*'));

/* Setup the URL routing. This is production ready. */
$router->map('GET','/api', 'null.php');

$router->map('GET','/api/products', 'products.php');
$router->map('GET','/api/product/[i:id]', 'product.php');

$router->map('GET','/api/categories', 'categories.php');
$router->map('GET','/api/category/[i:id]', 'category.php');

//$router->map('POST','/api/like/[i:id]/[uId:device]/', 'like.php');
$router->map('GET','/api/like/[i:id]/[uId:device]/', 'like.php');

//$router->map('GET','/api/bag', 'test.php');
/* Match the current request */
$match = $router->match();
if($match) {
    //print_r($match);
  require $match['target'];
}
else {
  header("HTTP/1.0 404 Not Found");
  //require '404.html';
    print_r('404');
    print_r($match);
}
?>