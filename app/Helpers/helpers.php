<?php 

function formatDate($timestamp, $format = 'D, d M Y') {
	$date = date_create($timestamp);
	$dateFormatted = date_format($date, $format);

	return $dateFormatted;
}
