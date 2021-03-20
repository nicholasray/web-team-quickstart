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
git clone "ssh://nray@gerrit.wikimedia.org:29418/schemas/event/secondary" extensions/repositories/secondary

# IMPORTANT: Make sure after enabling these extensions in your LocalSettings.php to run:
# docker-compose exec mediawiki php maintenance/update.php
