<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>SouR</title>
  <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script type="text/javascript">
	var a = [];
	var b = [];
  
	function handlePress(e) {
		
		if (!b.includes(e.path)) {
			var element = document.querySelector("#unique");
			a.push(e);
			b.push(e.path);
			var x = document.createElement("img");
			x.setAttribute("src", e.path);
			x.setAttribute("width", "200");
			x.setAttribute("alt", e.type);
			element.appendChild(x);
		}
		var element2 = document.querySelector("#pricing");
		element2.textContent = element2.textContent.split(' ')[0] + ' ' + String(Number(element2.textContent.split(' ')[1]) + Number(e.price)) + ' ' + element2.textContent.split(' ')[2];
	}
	</script>
</head>

<body>

  <nav class="top-bar">
	
	<a href="index.html"><img src="proiect%20tw/Travel.jpg" alt="TW" class="logo"></a>
	<ul>
      <li>
        <a href="https://www.google.com/search?q=travel+blog&rlz=1C1CHBF_enRO817RO817&oq=travel+blog&aqs=chrome..69i57j0l5.3070j0j7&sourceid=chrome&ie=UTF-8">Blog</a>
      </li>
      <li>
        <a href="">About us</a>
      </li>
      <li>
        <a href="https://www.skyscanner.com">Plane Tickets</a>
      </li>
      <li>
        <a href="mailto:oursite@ourdomain.ro?Subject=SOURISSUE" target="_top">Contact Us</a>
      </li>
    </ul>
</nav>


<main class="flex">
    <section class="options">
        <h3> Options </h3>
        <div id="hideOptions" class="hideO1">
            <h5 class="bbox"> First you should set your trip </h5>
            <a class="bbutton" href="#popup1"> Press this Button to open the map </a>
        </div>
		<form action="createVar.php" method="post">
        <div id="popup1" class="overlay">
            <div class="popup">
                <h5> Choose the cities you'll visit during your trip </h5>
                <a class="close" href="#">&times;</a>
                    <p>  </p>
					<div class="gridcontainer">
					<input class="item" type="checkbox" name="city1" value="Paris"> Paris<br>
					<input class="item" type="checkbox" name="city2" value="Barcelona"> Barcelona<br>
					<input class="item" type="checkbox" name="city3" value="Berlin"> Berlin<br>
					<input class="item" type="checkbox" name="city4" value="Londra"> Londra<br>
					<input class="item" type="checkbox" name="city5" value="Iasi"> Iasi<br>
					<input class="item" type="checkbox" name="city6" value="Bucuresti"> Bucuresti<br>
					<input class="item" type="checkbox" name="city7" value="Budapesta"> Budapesta<br>
					<input class="item" type="checkbox" name="city8" value="Istanbul"> Istanbul<br>
					<input class="item" type="checkbox" name="city9" value="Praga"> Praga<br>
					<input class="item" type="checkbox" name="city10" value="Haga"> Haga<br>
					<input class="item" type="checkbox" name="city11" value="Copenhaga"> Copenhaga<br>
					<input class="item" type="checkbox" name="city12" value="Oslo"> Oslo<br>
					<input class="item" type="checkbox" name="city13" value="Rio de Janeiro"> Rio de Janeiro<br>
					<input class="item" type="checkbox" name="city14" value="Los Angeles"> Los Angeles<br>
					<input class="item" type="checkbox" name="city15" value="New York"> New York<br>
                    <a id="buttonHide" class="buttondown" href="#hideOptions">Submit</a>
                </div>
            </div>
        </div>
        <div id="dropD">
			
            Check the boxes for the wished souvenirs categories
			<br><br>
			<label class="date1" > Your trip start date:
				<input class="date" type="date" name="startDate" required>
			</label>
			<label class="date1"> Your trip end date:
				<input class="date" type="date"  name="endDate" required>
			</label>
			<br>
            <label class="container">Kids Toys
                <input type="checkbox" value="fun" name="attr1">
                <span class="checkmark"></span>
            </label>
            <label class="container" >Traditional items
                <input type="checkbox" value="historical" name="attr2">
                <span class="checkmark"></span>
            </label>
            <label class="container" >Fashion/ Clothing
                <input type="checkbox" value="cosmetics" name="attr3">
                <span class="checkmark"></span>
            </label>
            <label class="container" >10 $ Deals
                <input type="checkbox" name="attr4">
                <span class="checkmark" data-href="#dropIN"></span>
            </label>
			<label class="container" >Tehnology
                <input type="checkbox" name="attr5" value="practical">
                <span class="checkmark"></span>
            </label>
			<button id="buttonHide" class="buttondown">Submit</button>
			</form>
        </div>
    </section>
	<section class="mainContent">
        <h3>Your results are: </h3>
        <div id="photo-container">
<?php
	if (isset($_POST['startDate'])) {
		$startDate = $_POST['startDate'];
		$sArr = explode('-', $startDate);
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
	if (!($rez = $mysql->query ("select path, price, type from products where type in ('$attr1', '$attr2', '$attr3', '$attr5') and city in ('$city1', '$city2', '$city3', '$city4', '$city5', '$city6', '$city7', '$city8', '$city9', '$city10', '$city11', '$city12', '$city13', '$city14', '$city15') and (start is NULL or (($sArr[1] || '/' || $sArr[2]) > start and ($eArr[1] || '/' || $eArr[2]) > end))"))) {
		die ('A survenit o eroare la interogare');
	}
}
else {
	if (!($rez = $mysql->query ("select path, price, type from products where type in ('$attr1', '$attr2', '$attr3', '$attr5') and city in ('$city1', '$city2', '$city3', '$city4', '$city5', '$city6', '$city7', '$city8', '$city9', '$city10', '$city11', '$city12', '$city13', '$city14', '$city15') and (start is NULL or (($sArr[1] || '/' || $sArr[2]) > start and ($eArr[1] || '/' || $eArr[2]) > end) and price <= 10)"))) {
		die ('A survenit o eroare la interogare');
	}
}

$returnedString = "";

while ($inreg = $rez->fetch_assoc()) {
	 $returnedString .= ('<div class=photo-wrapper><img src=' . $inreg['path'] . '   class=photo-item alt=' . $inreg['type'] . ' onclick=handlePress(' . json_encode($inreg) . ')><p>Price: ' . $inreg['price'] . '</p></div>');
}

echo $returnedString;
			
$mysql->close();
	
?>
</div>

	</section>
	<section class="rightSide">
        <h3>Your selected item: </h3>
        <div class ="buyitem">
		<div id= "unique">
        
        </div>
		<p style="text-align: center" id="pricing">Price: 0 $</p>
        <button>Buy online!</button>
        </div>
        <div id="export">
            <p>Export your shopping list: </p><select>
                <option value="0">Please select a format:</option>
                <option value="HTML">HTML</option>
                <option value="CSV">CSV</option>
                <option value="JSON">JSON</option>
                <option VALUE="XML">XML</option>
            </select><button type="submit"><i class="far fa-check-circle"></i></button>
        </div>
	</section>
  </main>

	<script src="try.js"></script>

</body>

</html>
