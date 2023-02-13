<?php
include '..\Model\model.php';

//Routing
$url = basename($_SERVER['REQUEST_URI']);

//echo "$url";

switch ($url) {
    case 'users.php':
      users();
      break;
    case 'advertisements.php':
        advertisement();
      break;
    default:
      notFound();
      break;
}

function users(){
    echo getUsers();
}
function advertisement(){
  echo getAds();

}

function notFound(){
    echo "Not found";
}
