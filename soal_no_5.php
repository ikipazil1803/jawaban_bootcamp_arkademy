<?php
function generateRandomString($length = 32) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',ceil($length/strlen($x)) )),1,$length);
}
function cetak($total = 1)
{
    $data = [];
    for ($i = 1; $i <= $total; $i++) {
        $hasil = generateRandomString();
        if (!in_array($hasil, $data)) {
            $data[] = $hasil;
            echo $hasil."\n";
        } else {
            $i--;
        }
    }
}
echo cetak(5);