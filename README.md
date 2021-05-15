# Welcome to the Web team! 👋

1) Install `git-review` https://www.mediawiki.org/wiki/Gerrit/Tutorial#Prepare_to_work_with_Gerrit. It can be helpful command line tool to interact with gerrit. When done installing, make sure you follow the steps to [configure gerrit](https://www.mediawiki.org/wiki/Gerrit/Tutorial#Configuring_git-review).

2) Clone the MediaWiki core repo:

```sh
gerritUserName=$(git config gitreview.username)

git clone "ssh://${gerritUserName}@gerrit.wikimedia.org:29418/mediawiki/core" mediawiki
(cd mediawiki && echo "Setting up git review..." && git review -s)
```

3) If on a Mac, follow part 1 and part 2 of the excellent tutorial at
https://getgrav.org/blog/macos-bigsur-apache-multiple-php-versions to setup
your Mac with Apache, PHP, and MariaDb. Make sure to point your `DocumentRoot`
at your `mediawiki` folder and set your `Listen` port to `8080`.

4) Go to localhost:8080 and complete the the MediaWiki Web Installer steps.

5) `cd` into your  `mediawiki` folder and run the `setupRepos.sh` script found in this repo. This will clone the extensions and skins commonly used by the web team as well as setting each one up with git review.

6) Next, you'll find a [LocalSettings.php](LocalSettings.php) file in this repo
that you can put in your `mediawiki` root directory to configure these properly.
This file also contains config that generally makes the development workflow
easier while on the Web team.

7) Run the update script to update the database:
```
php maintenance/update.php
```

8) Populate your database with interwiki prefixes to make languages appear as they are in production.
```
php maintenance/populateInterwiki.php
```

9) Copy the `update.sh` and `.htaccess` files found in this repo into your
`mediawiki` folder. When run the`update.sh` script updates your core,
extensions, and skins.

If everything goes to plan, you should be on your way! 🎉

Note: You will also find an [update script](update.sh) in this repo which can be used
to update MediaWiki core and all of its extensions and skins which you might
find useful. Run it from the root of your `mediawiki` folder. 😀

## Instructions to see events from the EventLogging extension

The EventLogging extension and the event logging platform in general are a bit more complicated to setup than the rest of the extensions.

https://www.mediawiki.org/wiki/Extension:EventLogging/Guide, https://wikitech.wikimedia.org/wiki/Event_Platform/Instrumentation_How_To, and https://gerrit.wikimedia.org/r/plugins/gitiles/mediawiki/extensions/EventLogging/+/refs/heads/master/devserver/README.md will be your best source of general documentation on event logging. 

To see events locally, follow these steps:

1. If you ran the `setupRepos.sh` script, you can skip this step. If not, in `extensions/EventLogging/devserver/eventgate.config.yaml`, replace [the line](https://github.com/wikimedia/mediawiki-extensions-EventLogging/blob/dee5da2481603c564eadd97edbc1ceaaa76a0efd/devserver/eventgate.config.yaml#L53) where it says `https://schema.wikimedia.org/repositories/secondary/jsonschema` with `../secondary/jsonschema` to make it point to your local schemas instead of the production schemas. That will eventually be necessary when you do development work involving schemas.
2. Per the [docs](https://wikitech.wikimedia.org/wiki/Event_Platform/Instrumentation_How_To#In_your_local_dev_environment_with_eventgate-devserver),  run `npm i`  from the EventLogging extension root folder. If you get a `404 phantomjs error`, you can try pinning phantomjs to a specific version by running `npm install phantomjs-prebuilt@2.1.14 --ignore-scripts`. After installing, run `npm run eventgate-devserver` to get the eventgate-devserver running.
3. The sdout from the eventgate-devserver lets you see the events it receives. To check if it is working, you can login to your local account. Once logged in to your local account, go to preferences -> Appearance -> Toggle the "Use Legacy Vector" checkbox. You should see events in the eventgate-devserver's output if it is working.
