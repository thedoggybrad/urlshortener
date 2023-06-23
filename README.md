# URL Shortener
A simple PHP based URL Shortener.

## Implementation Demo
A "TheDoggyBrad" branded implementation can be found on https://url.x10.bz/

## Credits
OpenAI's ChatGPT for making thr majority of this project's code.

## How this works?
•.htaccess - This is a crucial file, that makes every traffic redirect to redirect.php<br>
•redirect.php - This file redirects the user to the shortened link or to the index.html file.<br>
•index.html - This file is the User Interface, which uses shorten.php<br>
•shorten.php - An essential file where the process of link generation happens that saves the output on the urls.xml<br>
•urls.xml - The most critical file, it is the database of all the links.

## Possible Security Concern Answered
The database is an xml file? Well, just change the permission to only the server will be the only one allowed to view that file (Disallow Public Viewing).
There will be no problems if the public cannot view the xml file because the redirection and link generation happens in the server side.

## Why an XML File as a database?
Well, XML is used for ease of speed and faster link deletion (if ever). And there will be no other problems about setting up a database anymore.
                                                                           
