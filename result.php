<?php
function result(){
if (isset($_POST['startDate'])) {
    $startDate = $_POST['startDate'];
    $sArr = explode('-', $startDate);
    $_SESSION['startDate'] = $startDate;
}
if (isset($_POST['endDate'])) {
    $endDate = $_POST['endDate'];
    $eArr = explode('-', $endDate);
}
if (isset($_POST['attr1'])) {
    $attr1 = $_POST['attr1'];
}
else {
    $attr1 = false;
}
if (isset($_POST['attr2'])) {
    $attr2 = $_POST['attr2'];
}
else {
    $attr2 = false;
}
if (isset($_POST['attr3'])) {
    $attr3 = $_POST['attr3'];
}
else {
    $attr3 = false;
}
if (isset($_POST['attr4'])) {
    $attr4 = $_POST['attr4'];
}
else {
    $attr4 = false;
}
if (isset($_POST['attr5'])) {
    $attr5 = $_POST['attr5'];
}
else {
    $attr5 = false;
}
if (isset($_POST['city1'])) {
    $city1 = $_POST['city1'];
}
else {
    $city1 = "";
}
if (isset($_POST['city2'])) {
    $city2 = $_POST['city2'];
}
else {
    $city2 = "";
}
if (isset($_POST['city3'])) {
    $city3 = $_POST['city3'];
}
else {
    $city3 = "";
}
if (isset($_POST['city4'])) {
    $city4 = $_POST['city4'];
}
else {
    $city4 = "";
}
if (isset($_POST['city5'])) {
    $city5 = $_POST['city5'];
}
else {
    $city5 = "";
}
if (isset($_POST['city6'])) {
    $city6 = $_POST['city6'];
}
else {
    $city6 = "";
}
if (isset($_POST['city7'])) {
    $city7 = $_POST['city7'];
}
else {
    $city7 = "";
}
if (isset($_POST['city8'])) {
    $city8 = $_POST['city8'];
}
else {
    $city8 = "";
}
if (isset($_POST['city9'])) {
    $city9 = $_POST['city9'];
}
else {
    $city9 = "";
}
if (isset($_POST['city10'])) {
    $city10 = $_POST['city10'];
}
else {
    $city10 = "";
}
if (isset($_POST['city11'])) {
    $city11 = $_POST['city11'];
}
else {
    $city11 = "";
}
if (isset($_POST['city12'])) {
    $city12 = $_POST['city12'];
}
else {
    $city12 = "";
}
if (isset($_POST['city13'])) {
    $city13 = $_POST['city13'];
}
else {
    $city13 = "";
}
if (isset($_POST['city14'])) {
    $city14 = $_POST['city14'];
}
else {
    $city14 = "";
}
if (isset($_POST['city15'])) {
    $city15 = $_POST['city15'];
}
else {
    $city15 = "";
}


$mysql = new mysqli (
    'localhost',
    'root',
    '',
    'sour'
);
if (mysqli_connect_errno()) {
    die ('Conexiunea a esuat...');
}
if (!$attr4) {
    if (!($rez = $mysql->query ("select path, price, name,  id, type from products where type in ('$attr1', '$attr2', '$attr3', '$attr5') and city in ('$city1', '$city2', '$city3', '$city4', '$city5', '$city6', '$city7', '$city8', '$city9', '$city10', '$city11', '$city12', '$city13', '$city14', '$city15') and (start is NULL or (($sArr[1] || '/' || $sArr[2]) > start and ($eArr[1] || '/' || $eArr[2]) > end))"))) {
        die ('A survenit o eroare la interogare');
    }
}
else {
    if (!($rez = $mysql->query ("select path, price, name, id, type from products where type in ('$attr1', '$attr2', '$attr3', '$attr5') and city in ('$city1', '$city2', '$city3', '$city4', '$city5', '$city6', '$city7', '$city8', '$city9', '$city10', '$city11', '$city12', '$city13', '$city14', '$city15') and (start is NULL or (($sArr[1] || '/' || $sArr[2]) > start and ($eArr[1] || '/' || $eArr[2]) > end) and price <= 10)"))) {
        die ('A survenit o eroare la interogare');
    }

}
return $rez;}
/*$returnedString = "";

while ($inreg = $rez->fetch_assoc()) {
    $returnedString .= ('<div class=photo-wrapper><img src=' . $inreg['path'] . '   class=photo-item alt=' . $inreg['type'] . ' onclick=handlePress(' . json_encode($inreg) . ')><p>Price: ' . $inreg['price'] . '</p></div>');
}

echo $returnedString;

$mysql->close();*/
?>