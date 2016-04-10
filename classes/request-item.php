<?php require '../includes/config.php';

ini_set("display_errors",1);

echo "Request";



$stmt = $db->prepare('SELECT memberID, username,email FROM members WHERE username = :username ');
//$stmt->execute(array(':username' => $_SESSION['username']));
$stmt->execute(array(':username' => $_SESSION['username']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$username = $row['username'];
$id = $row['memberID'];
$buy = $_REQUEST['citybuy'];

echo "$username $id";

$id = $row['memberID'];
$itemName = $_REQUEST['itemName'];
$itemDescription = $_REQUEST['itemDescription'];
$itemCategory = $_REQUEST['category'];
$url = $_REQUEST['url'];
$status ='open';
list($cityBuy,$countryBuy) = explode(',', $buy);


//$countryBuy = substr($cityBuy, strpos($cityBuy, ",") + 1);    
$transaction = $_REQUEST['citytrans'];
list($cityTransaction,$countryTransaction) = explode(',', $transaction);
$pay = $_REQUEST['paid'];


$Destination = '../userfiles/item-pic';
if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
    $NewImageName= 'default.jpg';
    move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
}
 else{
    $RandomNum = rand(0, 9999999999);
    $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
    $ImageType = $_FILES['ImageFile']['type'];
    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.','',$ImageExt);
    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
}

echo "$id $itemName $itemDescription $itemCategory $NewImageName $url $cityBuy $countryBuy $cityTransaction $countryTransaction $pay";

//insert into database with a prepared statement
$stmt = $db->prepare('INSERT INTO request (memberID,item,itemDesc,itemCategory,itemPic,itemUrl,cityRequest,countryRequest,cityDeal,countryDeal,pay,status) 
						VALUES (:memberID, :item, :itemDesc, :itemCategory, :itemPic, :itemUrl, :cityRequest, :countryRequest, :cityDeal, :countryDeal, :pay, :status)');
$stmt->execute(array(
	':memberID' => $id,
	':item' => $itemName,
	':itemDesc' => $itemDescription,
	':itemCategory' => $itemCategory,
	':itemPic' => $NewImageName,
	':itemUrl' => $url,
	':cityRequest' => $cityBuy,
	':countryRequest'  => $countryBuy,
	':cityDeal' => $cityTransaction,
	':countryDeal' => $countryTransaction,
	':pay' => $pay,
	':status' => $status
));


//redirect to index page
	header('Location: ../index.html');
	exit;
?>
