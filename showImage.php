<?php
include 'result.php';
$mysql = new mysqli (
    'localhost',
    'root',
    '',
    'sour'
);
$rez = result();
$returnedString = "";
$newfile = fopen("newfile.txt","w") or die("Unable to open file!");
while ($inreg = $rez->fetch_assoc()) {
    $returnedString .= ('<div class=photo-wrapper><img src=' . $inreg['path'] . '   class=photo-item alt=' . $inreg['type'] . ' onclick=handlePress(' . json_encode($inreg) . ')><p>Price: ' . $inreg['price'] . '</p></div>'."\n");
    $txt = $inreg['id']."\n";
    fwrite($newfile, $txt);
}
fclose($newfile);
echo $returnedString;
$mysql->close();