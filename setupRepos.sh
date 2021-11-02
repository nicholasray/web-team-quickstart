#!/bin/bash

gerritUserName=$(git config gitreview.username)

repoPaths=( 
  "mediawiki/skins/Vector"
  "mediawiki/skins/MinervaNeue"
  "mediawiki/extensions/Cite"
  "mediawiki/extensions/MobileFrontend"
  "mediawiki/extensions/Echo"
  "mediawiki/extensions/Popups"
  "mediawiki/extensions/UniversalLanguageSelector"
  "mediawiki/extensions/Gadgets"
  "mediawiki/extensions/GlobalPreferences"
  "mediawiki/extensions/EventLogging"
  "mediawiki/extensions/EventBus"
  "mediawiki/extensions/EventStreamConfig"
  "mediawiki/extensions/WikimediaEvents"
  "schemas/event/secondary"
)

mirrorPaths=(
  "git@github.com:wikimedia/Vector.git"
  "git@github.com:wikimedia/mediawiki-skins-MinervaNeue.git"
  "git@github.com:wikimedia/mediawiki-extensions-Cite.git"
  "git@github.com:wikimedia/mediawiki-extensions-MobileFrontend.git"
  "git@github.com:wikimedia/mediawiki-extensions-Echo.git"
  "git@github.com:wikimedia/mediawiki-extensions-Popups.git"
  "git@github.com:wikimedia/mediawiki-extensions-UniversalLanguageSelector.git"
  "git@github.com:wikimedia/mediawiki-extensions-Gadgets.git"
  "git@github.com:wikimedia/mediawiki-extensions-GlobalPreferences.git"
  "git@github.com:wikimedia/mediawiki-extensions-EventLogging.git"
  "git@github.com:wikimedia/mediawiki-extensions-EventBus.git"
  "git@github.com:wikimedia/mediawiki-extensions-EventStreamConfig.git"
  "git@github.com:wikimedia/mediawiki-extensions-WikimediaEvents.git"
  "git@github.com:wikimedia/schemas-event-secondary.git"
)


dirPaths=(
  "skins/Vector"
  "skins/MinervaNeue"
  "extensions/Cite"
  "extensions/MobileFrontend"
  "extensions/Echo"
  "extensions/Popups"
  "extensions/UniversalLanguageSelector"
  "extensions/Gadgets"
  "extensions/GlobalPreferences"
  "extensions/EventLogging"
  "extensions/EventBus"
  "extensions/EventStreamConfig"
  "extensions/WikimediaEvents"
  "extensions/secondary"
)

for i in "${!repoPaths[@]}"; do
  git clone ssh://$gerritUserName@gerrit.wikimedia.org:29418/${repoPaths[i]} ${dirPaths[i]}
  (cd ${dirPaths[i]} && echo "Setting up git review..." && git review -s)
  echo "${mirrorPaths[i]}"
  (cd ${dirPaths[i]} && echo "Adding a mirror remote..." && git remote add mirror ${mirrorPaths[i]})
done

printf "\nDONE 🎉"
