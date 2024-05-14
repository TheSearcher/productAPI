# Introduction

This is a proof-of-concept website for We3World.

It is Laravel driven and use Docker (Sail) as its setup.


The focus of the website is two API endpoints.

1.	Products

2.	Product

The Products endpoint returns a list of all products.

The Product endpoint returns a single product.


<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>

This documentation aims to provide all the information you need to work with our API.

All resource API endpoints for the site are ‘authentication’ endpoints.

This means that you cannot access them unless you have a valid access token (permission to access our restricted API resource).

Access tokens are only issued to registered users, who have pre-approved permissions to access our restricted API end points. If you do not have pre-approval to access them, you should contact the site admin.

We will now describe the process the API endpoint. As stated above, this only applies to registered users with pre-approval to access them.

This demo presumes that the user knows how to make a basic curl request/postman request.

It is a two-part process.

1. API call to generate access token

2. API call to restricted Resource (include access token in header of call)


## Part-one – (generate access token)

The first part is an API call (curl request) to log the user into our system and then obtain an access token.


    curl --location 'http://localhost/api/auth/login' \
    --form 'email="youremail@yahoo.com"' \
    --form 'password="yourpassword"'

<aside>The curl request will look like this.
Please substitute the email and password fields for the email and password you used when you registered on our system..</aside>



Presuming your login details are correct, the response you will receive will look like this:

    {
        "status": true,
        "message": "Your login was successful",
        "token": "10|7Z1nA1Ws5LBpcte2dQD1K0SGtRTS4v40cXKNDN2bfec3441c"
    }


<aside>You now need to copy the access token and proceed to the second part..</aside>



##Part-two – (Make API call to our restricted resource)

Once you have an access token, you may proceed to make API calls to our endpoints.

To do this, you need to insert the ‘access token’ into the head of the next Api call. i.e.

    curl --location 'http://localhost/api/products' \
    --header 'Authorization: Bearer 10|7Z1nA1Ws5LBpcte2dQD1K0SGtRTS4v40cXKNDN2bfec3441c'

<aside>Please note that 'The header' must be titled exactly as shown. i.e. 'Authorization: Bearer {your access token}’.</aside>


You should now receive a Json list of our products


