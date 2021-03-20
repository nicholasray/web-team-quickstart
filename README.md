# Welcome to the Web team!

After installing
[MediaWiki-Docker](https://www.mediawiki.org/wiki/MediaWiki-Docker), it is time
to install the extensions and skins that the Web team uses most often.

From your `mediawiki` root folder run:

```sh
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

# IMPORTANT: Make sure after enabling these extensions in your LocalSettings.php to run:
# docker-compose exec mediawiki php maintenance/update.php
```

Next, you'll find a [LocalSettings.php](LocalSettings.php) file in this repo
that you will put in your root directory to properly setup these extensions. If
everything goes to plan, you should be on your way! 🎉

