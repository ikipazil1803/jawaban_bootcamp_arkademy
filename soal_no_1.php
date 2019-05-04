<?php
    $nama = "nama adalah String";
    $addres = "isi_alamat adalah String";
    $hobies = ["hobies1","hobies2"];
    $is_meried = (TRUE?TRUE:FALSE);
    $school = ['highschool' => 'as', 'university' => 'aba'];
    $skills = ['skills' => ['as', 'aba']];
    $array = [$nama,$addres,$hobies,$is_meried,$school,$skills];
    $result = json_encode($array);
    print_r($array);