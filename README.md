# Roman Numeral Project Instructions

Clone the repo from GitHub onto your own computer in order to test it and also have Postman installed if you wish to test
the APIs.

**In order to run locally (either in the terminal or IDE's terminal):** php artisan serve 

_In order to run locally you just need to run php artisan serve and can view it in the browser and interact with it._

Make sure that you have ran php artisan serve before testing out the POST requests. For this I used Postman:
1. Create a new collection in Postman with the title of roman-numeral-project
2. Add two requests, one named convert to roman and the other convert to number. Both are POST requests. 
3. In the convert to roman/number make sure you change your URL to look like this: http://localhost/convert-to-roman.
    For example, mine is http://127.0.0.1:8000/convert-to-roman
4. Go into _Headers_ and add the key 'content-type' with the value of 'application/json' for both number and roman requests.
5. Go into _Body_ click _raw_ and make sure _json_ is selected in the drop down and put in a simple json request. 
    
**For convert to number put in:**

  ` {
   "roman": "MCMXCVII"
   }`
    
**For convert to roman put in:**

   _`{
   "number": 1997
   }`_

