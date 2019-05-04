<?php
function is_valid_username($username){
$regex_uname = preg_match('@[a-z]@', $username);
if(!$regex_uname || strlen($username) == 8){
    echo "Username, merupakan kombinasi dari huruf kecil. Dengan panjang tepat 8 karakter.";
}else{
    echo " username True";
    }
}
function is_valid_password($password){
    $regex_password = preg_match('@[a-zA-Z0-9]@',$password);
    if(!$regex_password || strlen($password) == 8){
    echo "Password, merupakan kombinasi dari huruf kecil, huruf besar, angka, dan karakter spesial. Dengan panjang minimal 8 karakter.";
}else{
    echo "Password Valid";
    }
}
echo is_valid_password('‘qazW_123’');
echo is_username_valid('zeronull');