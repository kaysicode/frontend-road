<?php
header('HTTP/1.1 200 OK');
header('Content-Type: text/plain');

// Retrieve 
$design = $_POST['designs'];
$color = $_POST['color'];
$custname = $_POST['custname'];

//  Validate
$design = (isset($design) && $design=='Marvel') ? $design : 'DC';
$color = isset($color) ? implode(', ', $color): 'None';

// Response
echo "Order Summary: \n";
echo "Customer Name: $custname \n";
echo "Your design: $design \n";
echo "Color(s): $color \n";




