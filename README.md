# icon.me
Quick icon generator

Useful if you want a quick icon for a new app. Can be used as part of a script by using the API call.

# Install/Run

Install dependancies:

`composer install`

Run with docker-compose:

`docker-compose up -d`

Copy files into docker container:

`./docker-refresh.sh`

View at http://localhost

# API

You can generate and download a new icon via the API

`curl localhost/api -o icon.png`
