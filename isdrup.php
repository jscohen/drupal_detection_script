<?php
/*
 **	This script tests whether multiple URLS are Drupal sites
 **	The script loads the URLs from an external CSV file and stores them into an array
 **	Then we go through the array and check them using CHANGELOG.txt, http headers and /user to see if they are Drupal sites
 ** The results are printed in a CSV file called "results.csv" which appears in the same directory as the script
 ** If you want the results to appear on the screen, uncomment the echo statements which print them
 **
 **
 ** For the future - configure ssl so that https requests work
 **
 ** Script by Jon Cohen 4/30/12
*/
 

// there is an automatic timeout if this takes too long
// we can set this number to 0 if we want the script to continue and override timeouts
// i.e. if we want to do a very large number of URLs as once
set_time_limit(0);

// open the csv file and put its contents into our array
$file = fopen("sample_urls.csv", "r");
$array = fgetcsv($file);
fclose($file);

// initialize prevValue so we can track the previous value of the array
$prevValue = "";

//create our table for display
echo "<table border='1px'>";

$file = fopen("results.csv", "w");

// print the header lines to the CSV file
$header = array("URL", "Is it Drupal?", "Detection Method");
fputcsv($file, $header);

foreach($array as &$value) {

	// if $value is equal to $prevValue it is a duplicate, so skip it
	if($prevValue == $value) {
		continue;
	}
	
	// give prevValue the current value so it will the previous on next iteration
	$prevValue = $value;
	
	//print out the name of the website and the Drupal header
	echo "<tr><td>Website</td><td>";
	print_r($value);
	echo "</td></tr>";
	echo "<tr><td>Is it Drupal?</td>";
	
	// get the http headers for the url at value
	$headers = get_headers($value);
	
	// set headers to false so the loop continues if it is not found
	$hasHeader = false;
	
	// go through the headers and look for the "Expires" header
	// if it is found, print yes and stop the loop
	foreach($headers as &$http) {
		if($http == "Expires: Sun, 19 Nov 1978 05:00:00 GMT") {
			echo "<td>Yes</td>";
			echo "<td>Detected by HTTP header</td>";
			echo "</tr>";
			$output = array($value, "Drupal", "Detected by the HTTP Headers");
			fputcsv($file, $output);
			$hasHeader = true;
			break;
		}
	}
	
	// if the header is found, continue to the next URL
	if($hasHeader) {
		continue;
	}
	
	// look for the CHANGELOG.txt file which comes with Drupal
	$url = $value . "/CHANGELOG.txt";
	
	$head = get_headers($url);
	
	// if the file is found, check that it is a text file since sometimes this redirects to other sites if it is not found, producing false positives
	// output the results in the table and the spreadsheet
	foreach($head as &$http) {
		if($http == "Content-Type: text/plain") {
			echo "<td>Yes</td>";
			echo "<td>Detected by presence of CHANGELOG.txt</td>";
			echo "</tr>";
			$output = array($value, "Drupal", "Detected by the presence of CHANGELOG.txt");
			fputcsv($file, $output);
			$hasHeader = true;
			break;
		}
	}
	
	// if we find the CHANGELOG file, go the next URL
	if($hasHeader) {
		continue;
	}
	
	// if the checks don't work, output that the site is not Drupal
	
	echo "<td>No</td>";
	echo "<td>N/A</td>";
	$output = array($value);
	fputcsv($file, $output);
	
	echo "</tr>";
}

echo "</table>";

// make sure we print out all our content by using the flush function
// this executes after the 5 minutes is over
flush();
fclose($file);

echo "<h1>Check the results.csv file in this directory for the results of the script!</h1>";

?>