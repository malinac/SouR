<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>SouR</title>
  <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script type="text/javascript">
	function handlePress(e) {
		var element = document.querySelector("#unique");
		console.log(element);
		var x = document.createElement("img");
		x.setAttribute("src", e.path);
		x.setAttribute("width", "200");
		x.setAttribute("alt", e.type);
		element.appendChild(x);
		
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
        <div id="popup1" class="overlay">
            <div class="popup">
                <h5> Set your trip on the map </h5>
                <a class="close" href="#">&times;</a>
                <div class="content">
                    <p> Embeeded map API </p>
					<div class="mapouter">
					<div class="gmap_canvas">
					<iframe style="width:450px; height:300px; border:none; display:block; overflow: hidden; margin: auto" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=1&ie=UTF8&iwloc=&output=embed" >
					</iframe>
                    </div>

					</div>
                    <a id="buttonHide" class="buttondown" href="#hideOptions">Submit</a>
                </div>
            </div>
        </div>
        <div id="dropD">
			
            Check the boxes for the wished souvenirs categories
			<br><br>
			<form action="createVar.php" method="post">
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
	if (!($rez = $mysql->query ("select path, price, type from products where type in ('$attr1', '$attr2', '$attr3', '$attr5') and (start is NULL or (($sArr[1] || '/' || $sArr[2]) > start and ($eArr[1] || '/' || $eArr[2]) > end))"))) {
		die ('A survenit o eroare la interogare');
	}
}
else {
	if (!($rez = $mysql->query ("select path, price, type from products where type in ('$attr1', '$attr2', '$attr3', '$attr5') and (start is NULL or (($sArr[1] || '/' || $sArr[2]) > start and ($eArr[1] || '/' || $eArr[2]) > end) and price <= 10)"))) {
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
