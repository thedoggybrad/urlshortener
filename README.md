# URL Shortener
A simple PHP based URL Shortener.

## Implementation Demo
A "TheDoggyBrad" branded implementation can be found on https://url.x10.bz/
<br><br>
Note: The source code in this repository is not having any brandings, the name of the software in this repository is URL Shortener not "TheDoggyBrad URL Shortener".

## Features
✓Lightweight<br>
✓Easy access to database<br>
✓Immediately Ready to use (After File Upload to Server)<br>
✓No need for a database<br>
✓No Third Party Scripts/Libraries<br>
✓Fast Link Generation<br>
✓Easy to use<br>
✓No need for an account<br>
✓Almost all functions are performed on the server side<br>
✓Copy button for generated shortened URLs

## Credits
✓OpenAI's ChatGPT for making the majority of this project's code.<br>
✓TheDoggyBrad for supervising and managing the development of this software

## How this works?
•.htaccess - This is a crucial file, that makes every traffic redirect to redirect.php.<br>
•redirect.php - This file redirects the user to the shortened link (if that exists) or to the index.html file (if the shortened link does not exist).<br>
•index.html - This file is the User Interface, which uses shorten.php. This is where the Shortened URL is presented.<br>
•shorten.php - An essential file where the process of link generation happens and it saves the output on the urls.xml.<br>
•urls.xml - The most critical file, it is the database of all the links.

## Possible Security Concern Answered
The database is an xml file? Well, just change the permission to only the server will be the only one allowed to view that file (Disallow Public Viewing).
There will be no problems if the public cannot view the xml file because the redirection and link generation happens in the server side.<br><br>
Here's a proof! Visit https://url.x10.bz/urls.xml and you will see an Error 403 instead of a file. Then visit https://url.x10.bz and try generating and visiting the shorten link. It works right?

## Why an XML File as a database?
Well, XML is used for ease of speed and faster link deletion (if ever). And there will be no other problems about setting up a database anymore.
                                                                           
