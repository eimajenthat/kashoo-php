Kashoo-PHP
==========
A PHP wrapper library to interact with the REST API for Kashoo Cloud Accounting

Forking
-------
This is GitHub, and this is open source software.  You are free to fork, use, and modify the code to your needs.  I would appreciate a pull request if you fix any bugs, or make any changes others might find useful.

License
-------
Copyright 2013 James Adams

This software is licensed under the MIT license, which you can read here:

[LICENSE](https://github.com/eimajenthat/kashoo-php/blob/master/LICENSE)

This is the same license used by jQuery and a number of open source projects.  My understanding is that it should allow you to use, modify, distribute, or not distribute, the code in pretty much any way you see fit.  If you are in doubt about the license, feel free to contact me.

Usage
-----
1. `git clone https://github.com/eimajenthat/kashoo-php`
2. `cd kashoo-php`
3. Copy config_dist.php to config.php and save your contact info.
4. `php ./test.php`
5. Look at test.php and copy/modify to your needs.

Current Coverage
----------------
List Businesses
List Bills
List Contacts
List Customers
List Vendors
List Records
List Invoices
List Accounts
List Bill Payments
Create Invoice
Create Bill
Create Account
Create Bill Payments

Required Fields and Validation
------------------------------
One important thing that isn't complete is validation for the create methods.  Right now, the test script has the very minimal required fields specified as a JSON string.  I plan to fold these minimum requirements into the methods, so that they can supply the default values where possible, or give you a friendly reminder of missing data.  But that's not done yet, so watch your step.

Notes
-----
If you have signed in to Kashoo with a Google Account, OpenID, or one of those other single sign on solutions, it seems to break API access.  To disconnect the other account, you have to reset your password with the "Forgot password" link.  When I did this, I got an error, but it worked anyway.
I have commented out the create methods in the test script, so you don't accidentally create garbage data in a live account.  Simple uncomment them use them.  I would recommend signing up for a separate Kashoo account (free) for testing purposes.  My Kashoo account has dozens of garbage invoices at this point.
The script is meant to be run from a command line.  In Linux or OSX, you can just run 'php test.php' from a terminal.  In Windows, you would need to install php somewhere and specify its path.  You could also run it from ssh on a remote web server.  The library will work fine with web applications.  I just didn't want that complication for a test script.  Actually, the test script should work on a web server as well, but it will output text, rather than html. Now that I think about it, making a web version of the test script would not be too hard.  I'll look into it.
You specify your Kashoo email and password in the config.php file.  Should be pretty straight forward, just fill in the blanks.
The test script has a DEBUG constant.  It's set to true, so get lots of interesting output.  For a production implementation, you would set it to true, or omit it.
For testing, all three files should be in the same directory.  For integrating with your own app, you only need Kashoo.php, and can put it wherever you like.