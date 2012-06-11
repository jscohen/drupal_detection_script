drupal_detection_script
=======================

Jon Cohen
Isovera
6/11/2012

Drupal Detection Script with Sample CSV file

Contents
=======================

1. Intro
2. Setting up the script
3. How it works
4. Current bugs and future fixes

1. Intro
========================
This script detects whether a URL is in Drupal or not.  
It is based on checking URLs in bulk.  The sample CSV shows how URLs should be formatted for maximum effectiveness.
The script was written by Jon Cohen for Isovera.

2. Setting up the script
========================
To run the script, all you need to do is put the script and the CSV file on a web server.  If you are using XAMPP for example, just put the two docs in the 
htdocs folder.  Then open up a browser and type in the url http://yourdomain.com/is_drup.php.  For XAMPP, replace youdomain.com with localhost.

You can use any spreadsheet with any number of URLS so long as it is formatted like the sample CSV shown here.  It is important that the URLS are in full:
i.e. http://www.google.com instead of just google.com and that they are in the CSV horizontally.

3. How it Works
========================
The script detects whether a site is made with Drupal using two methods.  
The first is checking the HTTP header for a Drupal-specific easter egg (the header says that Drupal expires on Dries's birthday in 1978).
The second method is looking for a plain text CHANGELOG.txt file, which most Drupal sites have by default.  

The script has two outputs.  The first is to output the URL, whether it is Drupal or not, and the detection method in a table on the webpage.  
The results will also by outputted into a CSV file called results.csv.  
If this file does not exist, the script will create it automatically.  
When the script is done, a header will appear at the bottom of the page prompting you to check the results.csv file.

If a URL is a dead link or if it times out, you will receive a warning on the PHP page.

4. Current Bugs and Future fixes
========================
For the script to work properly, make sure you have OpenSSL enabled in your PHP installation or else the script will not work on https sites.

I am looking for ways to improve the script and to add methods for detecting Drupal.  Help would be appreciated.  If you have anything to add, make a commit to git and I will look it over.