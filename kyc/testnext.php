<?php
$startDate = "01-01-2024";
$futureDate=date('d-m-Y', strtotime('+1 year', strtotime($startDate)) );
echo $futureDate;
?>