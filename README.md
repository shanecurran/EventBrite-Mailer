EventBrite-Mailer
=================

A script that is designed to be run by cron that fetches all the events based on keyword and sends the JSON results via email when the script is run

A cron such as this can be used to run the script at 6PM daily

```0 0 18 1/1 * ? * /usr/bin/php /var/www/index.php > /dev/null```

Email handler made by http://swiftmailer.org/