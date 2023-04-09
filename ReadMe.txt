This site contains public page which are deployed through database (Home, about, services and about).php having their own unique pageId.
Login and register page are for admin login and admin account register.
Password are hashed and saved into the database, user can't have the same email.
Password have specific requirements and their is a function that checks password and confirm password aswell as show/hide password.
In the admin section, users are able to add/edit/view/delete pages and user's list as well as upload their own logo.
There is a different header for admin view so that admin could go back to their admin control panel.
error.php, 404.php and 403.php are error and http error pages which are managed through .htaccess and try catch function in php

All the header, footer, db info, authentication files are inside a shared folder for easy access and privacy

---Admin Login Info---

Email : test@test.com
Password : Test@123
Live Site at: https://lamp.computerstudi.es/~Alish200535161/php-assignment-2/