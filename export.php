<?php
$option = $_POST['exportoption'];
$mysql = new mysqli (
    'localhost',
    'root',
    '',
    'sour'
);
$fn = fopen("newfile.txt", "r");

if ($option == 'CSV') {
    $nf = fopen("products.csv", "w") or die("Unable to open file!");
    while(! feof($fn)) {
    $id = trim(fgets($fn));
    if (!empty($id)) {
        $sql = "SELECT * FROM PRODUCTS where id =" . $id;
        $result = mysqli_query($mysql, $sql);
        $row = mysqli_fetch_row($result);
        if ($result === false) {
            echo "error while executing mysql: " . mysqli_error($mysql);
        } else {
                $s = $row[0] . ',' . $row[1] . ',' . $row[2]."\n";
                fwrite($nf, $s);
            }

        }
    }
    fclose($nf);
    echo file_get_contents("products.csv");
}

elseif($option == 'JSON') {
    $nf = fopen("products.json", "w") or die("Unable to open file!");
    while (!feof($fn)) {
        $id = trim(fgets($fn));
        if (!empty($id)) {
            $sql = "SELECT * FROM PRODUCTS where id =" . $id;
            $result = mysqli_query($mysql, $sql);
            $row = mysqli_fetch_row($result);
            if ($result === false) {
                echo "error while executing mysql: " . mysqli_error($mysql);
            } else {
                $s_array[] = array('id' => $row[0],
                    'name' => $row[1]);
            }
        }
    }
    $jsone = json_encode($s_array);
    fwrite($nf, $jsone);
    fclose($nf);
    echo file_get_contents("products.json");
}

elseif($option == 'XML'){
    $xml=new DOMDocument("1.0");
    $xml->formatOutput=true;
    $top=$xml->createElement("List_of_Recomandations");
    $xml->appendChild($top);
    while (!feof($fn)) {
        $id = trim(fgets($fn));
        if (!empty($id)) {
            $sql = "SELECT * FROM PRODUCTS where id =" . $id;
            $result = mysqli_query($mysql, $sql);
            $row = mysqli_fetch_row($result);
            if ($result === false) {
                echo "error while executing mysql: " . mysqli_error($mysql);
            } else {
                $product = $xml->createElement("product");
                $top->appendChild($product);
                $name = $xml->createElement("name", $row[1]);
                $product->appendChild($name);
                $price = $xml->createElement("price", $row[4]);
                $product->appendChild($price);
            }
        }
    }
    echo "<xmp>".$xml->saveXML()."</xmp>";
}


fclose($fn);

