# apex-tracker.tech

a simple rest api built in Slim PHP 3.0

makes GET requests to a 3rd party api. 
https://apex.tracker.gg/site-api

end point for GET requests 

http://[YOUR SERVER NAME]/api/{platform}/{gamertag}

I've decided to build on the basic profile grabbing logic, by adding a request logging class built from the ground up which works with the slim PHP request object.  I'll extend this to go onto logging responses. And this class will be reusable with any slim PHP backend. 



