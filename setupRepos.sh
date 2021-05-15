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
done

originalSchemaPath=https://schema.wikimedia.org/repositories/secondary/jsonschema
modifiedSchemaPath=../secondary/jsonschema

echo "Modifying eventgate.config.yaml to point to secondary jsonschema..."
sed -i -e "s~$originalSchemaPath~$modifiedSchemaPath~" extensions/EventLogging/devserver/eventgate.config.yaml

printf "\nDONE 🎉"
