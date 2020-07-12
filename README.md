# apex-tracker.tech

This project needs to be updated to  meet the current api standards and so is currently not functioning, however it is still a good example of how I would go about producing a small, simple API. 

a simple rest api built in Slim PHP 3.0

makes GET requests to a 3rd party api. 
https://apex.tracker.gg/site-api

end point for GET requests 

http://[YOUR SERVER NAME]/api/{platform}/{gamertag}

I've decided to build on the basic profile grabbing logic, by adding a request logging class built from the ground up which works with the slim PHP request object, grabbing key request info and building into a file of JSON objects.  I'll extend this to go onto logging responses. And this class will be reusable with any slim PHP backend. 



