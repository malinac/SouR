<?php
$option = $_POST['exportoption'];
$mysql = new mysqli (
    'localhost',
    'root',
    '',
    'sour'
);
$fn = fopen("newfile.txt", "r");
if ($option = 'CSV') {
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
}
/*
else if($option = 'JSON') {
    $nf = fopen("products.json", "w") or die("Unable to open file!");
    while (!feof($fn)) {
        $id = trim(fgets($fn));
        if (!empty($id)) {
            $sql = "SELECT * FROM PRODUCTS where id =" . $id;
            $result = mysqli_query($mysql, $sql);
            $row = mysqli_fetch_row($result);
            fwrite($nf, '[');
            if ($result === false) {
                echo "error while executing mysql: " . mysqli_error($mysql);
            } else {
                $s_array[] = array('id' => $row[0],
                    'name' => $row[1]);
                fwrite($nf, json_encode($s_array));
            }
        }

    }
}
*/
fclose($nf);
fclose($fn);

