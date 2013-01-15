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
On January 15th, 2013 I created a GUI for the app.  To use it, you need to be able to run PHP scripts on your computer, which requires a server installed.  XAMPP or Apple's native capabilities will work for this.

Open up detection.php using a web browser on your server.  Make sure the CSV spreadsheet is formatted as the instructions indicate.  Then upload the file and click submit.  If the file uploads properly, there will be a confirming message on the following page.  When the page isdrup.php is done loading, check results.csv for your results!

You can use any CSV spreadsheet with any number of URLS so long as it is formatted like the sample CSV shown here.  It is important that the URLS are in full:
i.e. http://www.google.com instead of just google.com and that they are in the CSV horizontally.

3. How it Works
========================
The script detects whether a site is made with Drupal.  
It checks the HTTP header for a Drupal-specific easter egg (the header says that Drupal expires on Dries's birthday in 1978).

The script has two outputs.  The first is to output the URL, whether it is Drupal or not, and the detection method in a table on the webpage.  
The results will also by outputted into a CSV file called results.csv.  
If this file does not exist, the script will create it automatically.  
When the script is done, a header will appear at the bottom of the page prompting you to check the results.csv file.

If a URL is a dead link or if it times out, you will receive a warning on the PHP page.

4. Current Bugs and Future fixes
========================
For the script to work properly, make sure you have OpenSSL enabled in your PHP installation or else the script will not work on https sites.

On 1/15/13, I created a functioning GUI for the app.

I am looking for ways to improve the script and to add methods for detecting Drupal.  Help would be appreciated.  If you have anything to add, make a commit to git and I will look it over.