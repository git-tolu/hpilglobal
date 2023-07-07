<?php
private function subtractRelativeMonth(DateTime $incomingDate): DateTime
{
    $year = $incomingDate->format('Y');
    $month = $incomingDate->format('m');
    $day = $incomingDate->format('d');
    $daysInOldMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    if ($month == 1) { //It's January, so we have to go back to December of prior year
        $month = 12;
        $year--;
    } else {
        $month--;
    }
    $daysInNewMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    if ($day > $daysInNewMonth && $month == 2) { //New month is Feb
        $day = $daysInNewMonth;
    }
    if ($day > 29 && $daysInOldMonth > $daysInNewMonth) {
        $day = $daysInNewMonth;
    }
    $adjustedDate = new \DateTime($year . '-' . $month . '-' . $day);
    return $adjustedDate;
}
?>