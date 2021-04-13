# Welcome to the Web team! 👋

**After** following all of the steps from `DEVELOPERS.md` described in installing
[MediaWiki-Docker](https://www.mediawiki.org/wiki/MediaWiki-Docker), it is time
to install the extensions and skins that the Web team uses most often.

1) From your `mediawiki` root folder run:

```sh
# Vector
git clone "https://gerrit.wikimedia.org/r/mediawiki/skins/Vector" skins/Vector

# Minerva & MobileFrontend
git clone "https://gerrit.wikimedia.org/r/mediawiki/extensions/Cite" extensions/Cite
git clone "https://gerrit.wikimedia.org/r/mediawiki/extensions/MobileFrontend" extensions/MobileFrontend
git clone "https://gerrit.wikimedia.org/r/mediawiki/skins/MinervaNeue" skins/MinervaNeue

# Echo
git clone "https://gerrit.wikimedia.org/r/mediawiki/extensions/Echo" extensions/Echo

# Popups
git clone "https://gerrit.wikimedia.org/r/mediawiki/extensions/Popups" extensions/Popups

# Universal Language Selector
git clone "https://gerrit.wikimedia.org/r/mediawiki/extensions/UniversalLanguageSelector" extensions/UniversalLanguageSelector

# EventLogging
git clone "https://gerrit.wikimedia.org/r/mediawiki/extensions/EventLogging" extensions/EventLogging
git clone "https://gerrit.wikimedia.org/r/mediawiki/extensions/EventBus" extensions/EventBus
git clone "https://gerrit.wikimedia.org/r/mediawiki/extensions/EventStreamConfig" extensions/EventStreamConfig
git clone "https://gerrit.wikimedia.org/r/mediawiki/extensions/WikimediaEvents" extensions/WikimediaEvents
git clone "https://gerrit.wikimedia.org/r/schemas/event/secondary"
```

2) Next, you'll find a [LocalSettings.php](LocalSettings.php) file in this repo
that you can put in your `mediawiki` root directory to configure these properly.
This file also contains config that generally makes the development workflow
easier while on the Web team.

3) Run the update script to update the database:
```
docker-compose exec mediawiki php maintenance/update.php
```

4) **Note**: If you are using the [`git-review`](https://www.mediawiki.org/wiki/Gerrit/Tutorial#Prepare_to_work_with_Gerrit) tool, you'll want to run `git remote rm origin` **before** running `git-review -s` for each repo you use git-review (likely all the repos you just cloned) in order for it to setup the git remote origin correctly (`git remote -v` should be using `ssh://...` for the origin and not `https://...`) .

If everything goes to plan, you should be on your way! 🎉

Note: You will also find an [update script](update.sh) in this repo which can be used
to update MediaWiki core and all of its extensions and skins which you might
find useful. Run it from the root of your `mediawiki` folder. 😀

## Instructions to see events from the EventLogging extension

The EventLogging extension and the event logging platform in general are a bit more complicated to setup than the rest of the extensions.

https://www.mediawiki.org/wiki/Extension:EventLogging/Guide, https://wikitech.wikimedia.org/wiki/Event_Platform/Instrumentation_How_To, and https://gerrit.wikimedia.org/r/plugins/gitiles/mediawiki/extensions/EventLogging/+/refs/heads/master/devserver/README.md will be your best source of general documentation on event logging. If you've used the quickstart repo, the next steps to see events locally look like this:

1. In `extensions/EventLogging/devserver/eventgate.config.yaml`, replace [the line](https://github.com/wikimedia/mediawiki-extensions-EventLogging/blob/dee5da2481603c564eadd97edbc1ceaaa76a0efd/devserver/eventgate.config.yaml#L53) where it says `https://schema.wikimedia.org/repositories/secondary/jsonschema` with `../repositories/secondary/jsonschema` to make it point to your local schemas instead of the production schemas. That will eventually be necessary when you do development work involving schemas.
2. Per the docs,  Run `npm i`  from the EventLogging extension root folder and then `npm run eventgate-devserver`  to get the eventgate-devserver running
3. The sdout from the eventgate-devserver lets you see the events it receives. To check if it is working, you can login to your local account. Once logged in to your local account, go to preferences -> Appearance -> Toggle the "Use Legacy Vector" checkbox. You should see events in the eventgate-devserver's output if it is working.
