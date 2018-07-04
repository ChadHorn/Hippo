# Hippo Software Technical Assessment
This is the codebase created per the requirements below. The codebase was completed as close to the original rough outline as possible and no creative liberty was exercised. Also, to avoid scope creep, I have no taken the developmental freedom to make UI/UX changes that I would have otherwise suggested or implemented (see below section labeled "Suggested Implementations Not Completed Due to Self-Imposed Scope Limitations").

## Given Requirements
- [x] There must be a way for a user to log in with an e-mail address/password combination. These users will be the veterinarians.
- [x] There must be a way for a veterinarian to create a new account with their e-mail address/password combination.
- [x] All patients must be accessible by all veterinarians. All owners must also be accessible by all veterinarians.
- [x] All patients have an associated owner.
- [x] Upon logging in, a veterinarian should be able to add, edit or delete patients and owners.
- [x] Patients have the following information associated with them: name, species, color, date of birth, owner
- [x] Owners have the following information associated with them: first name, last name, phone number

## Additional Considerations
- [x] Your application will utilize PHP for the "backend" portion. PHP 5 and PHP 7 are acceptable.
- [x] Any database portions will be done in MySQL.
- [x] Your application will run on Apache web server.
- [x] You will provide complete instructions for setting up your application, assuming functional PHP, Apache and MySQL installations.
- [x] You may not ask questions about the task itself.

## Additional Requirements
In addition to the given environmental variables outlined under the "Additional Considerations" section above, these are additional steps required to get Laravel (and specifically, this application) running on an external environment.

There is a basic assumption that whoever is reviewing this will be able to handle the somewhat basic technical specifics of upgrades and installations as required. If a more in depth installation guide is requested, one can be supplied with a given notice.

#### Minimum Server Requirements (in addition or different than those given)
- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Git Installed
- Node Installed
- Composer Installed

Quick Reference for Ubuntu: bash > `sudo apt-get install php7.2-curl php7.2-xml php7.2-zip php7.2-gd php7.2-mysql php7.2-mbstring php7.2-fpm composer`

#### Apache Specific Setup
Laravel includes a public/.htaccess file that is used to provide URLs without the index.php front controller in the path. Before serving Laravel with Apache, be sure to enable the mod_rewrite module so the .htaccess file will be honored by the server.

If the .htaccess file that ships with Laravel does not work with your Apache installation, try this alternative:
````
Options +FollowSymLinks
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
````

#### Steps for Setup
- Create directory to serve website on Apache.
- Setup Apache to serve specific website. See also "Apache Specific Setup" above.
- - You may need to update the `/etc/hosts` file to reflect proper DNS pointing/overriding depending upon your system.
- CD into the newly created directory.
- Clone *this* git repository into created folder: bash > `git clone  https://github.com/ChadHorn/Hippo.git ./`
- While remaining in the directory, run the following command: bash > `cp .env.example .env`
- Open the .env file and update the `APP_URL` with the appropriate URL.
- While still in the home directory, update composer: bash > `composer install`
- - If an error is received, run: bash > `composer update` instead.
- - If you receive yet another error, run: bash > `php composer.phar install`
-or-
bash > `php composer.phar update`
- While still in the home directory, update npm:
bash > `npm install`
- - If an error is received, run
bash > `npm update` instead.
- Create a new database using either a GUI or the following code in MySQL terminal prompt:
mysql > `CREATE DATABASE hippotest;`
- Create a new MySQL user account:
mysql > `CREATE USER 'hippotest'@'localhost' IDENTIFIED BY 'abc123';`
- Grant appropriate privileges to user to database:
mysql > `GRANT ALL PRIVILEGES ON hippotest.* TO 'hippotest'@'localhost' WITH GRANT OPTION;`
- Leave the MySQL prompt and using artisan, build the databases by using the following command:
bash > `php artisan migrate:install`
- - Note: If you want to clear the tables and fresh install the schema, run the following command:
bash > `php artisan migrate:fresh`

Note: Due to various nuances between the flavors of Linux, slight modifications to the above steps may be required. These steps are based upon a Mac LEMP environment, in addition to a Ubuntu LEMP environment.

#### How to Use
- Upon completion of the above steps, visit the URL that you created created during the Apache setup and click on "Register" at the top of the page. This will allow you to register a Veterinarian account.
- Upon creation, you will be automatically logged in.
- From this point, using the menu to the top right, you can add/edit/delete owners, patients and vets.
- Note: To delete a record, go into the records' edit page and click on the "Delete" button at the bottom.

## Suggested Implementations Not Completed Due to Self-Imposed Scope Limitations
- [ ] Have ability to add owner on the fly within the patient dropdown.
- [ ] Utilize Nginx vs Apache due to the threading capacity when utilizing PHP.
- [ ] Require email verification for new accounts.
- [ ] Require verification by internal accounts for new vets.
- [ ] Populate patient color field with existing colors as it's typed, if any.
- [ ] Limit administration functionality by each veterinarian.
- [ ] Dashboard on landing page with pertinent insights and/or shortcuts.
- [ ] Place code into production mode prior to deployment. It's currently in local/debug mode to display any in a given environment.



*If you need anything else, please let me know and I'll do my best to accommodate your request(s).*
