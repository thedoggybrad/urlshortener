<img src="android-chrome-192x192.png" alt="LOGO" width="96"  height="96">

# URL Shortener
A simple PHP based URL Shortener.

## Implementation
This source code was the base for the x10 URL™ URL Shortener software that is distributed by x10 URL Shortening Services.<br>
You can try x10 URL™ URL Shortener software on [https://url.x10.bz](https://url.x10.bz).

## Requirements to run
✓An Apache webserver that supports PHP 7.2 up to PHP8.3, .htaccess and XML.<br>

## Features
✓Lightweight<br>
✓Easy access to the database<br>
✓Immediately Ready to use (After File Upload to Server)<br>
✓No need for a real database like SQL<br>
✓Fast Link Generation<br>
✓Easy to use<br>
✓No need for an account<br>
✓Almost all functions are performed on the server side<br>
✓Copy button for generated shortened URLs<br>
✓Privacy-Friendly<br>
✓Simply to use and implement<br>
✓Automatically prevents to generate a duplicate shortened code<br>

## Credits
✓OpenAI's ChatGPT for making the majority of this project's code.<br>
✓TheDoggyBrad for supervising, coding and managing the development of this software

## How this works?
•.htaccess - This is a very crucial file, that makes every traffic redirect to redirect.php.<br>
•redirect.php - This file redirects the user to the shortened link (if that exists) or to the index.html file (if the shortened link does not exist).<br>
•index.html - This file is the User Interface, which uses shorten.php. This is where the Shortened URL is presented.<br>
•shorten.php - An essential file where the process of link generation happens and it saves the output on the urls.xml.<br>
•urls.xml - The most critical file, it is the database of all the links.

## Possible Security Concern Answered
The database is an xml file? Well, just use the default .htaccess file distributed in this repository as it contains the rule to block public access to the urls.xml file.<br><br>
There will be no problems if the public cannot view the xml file because the redirection and link generation happens in the server side.<br><br>
Here's a proof! Visit https://url.x10.bz/urls.xml and you will see an HTTP error 403 instead of the actual xml file. Then visit https://url.x10.bz and try generating and visiting the shorten link. It works and even you cannot access the urls.xml file.

## Why an XML File as a database?
Well, XML is used for ease of speed and faster link deletion (if ever). And there will be no other problems about setting up a database anymore.

## How to implement this software on your server/hosting provider?
1.) Download the contents of this repository then extract and upload it on your htdocs or public_html (other hosting providers uses other names) folder.
<br>
2.) If you are not uploading/implementing this on the root directory of your website or using your localhost. Please use modify the index.html, shorten.php and redirect.php files. The urls.xml file is not needed to be modified.
<br>
3.) Modify the software's UI and branding according to your needs and preferences.
<br>
4.) Test the software by going to https://whateveryoursiteis.com/directoryifever/test and it should redirect you to https://google.com, if not you may need to modify the files mentioned in step no.2
<br><br>
That's it, you have now a lightweight, non-resource extensive url shortener.

## Licensing Agreement
See https://github.com/thedoggybrad/urlshortener/blob/main/LICENSE
