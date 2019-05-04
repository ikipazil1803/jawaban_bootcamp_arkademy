<?php
function perulangan($masukan_perulangan){
  for ($i = 1; $i <= $masukan_perulangan; $i++) {
    if(($i % 3) == 0)  //odd
      {echo "* * * * *". PHP_EOL;}
    else   //even
      {echo "= = = = =". PHP_EOL;}
   }
}
echo perulangan(5)
?>