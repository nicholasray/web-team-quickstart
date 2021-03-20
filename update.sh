time for i in . extensions/*/ skins/*/; do
  git -C "$i" pull
  composer --working-dir="$i" install
  composer --working-dir="$i" update
  npm -C "$i" i
  git -C "$i" checkout -- package-lock.json
done

# this will update the database schema
docker-compose exec mediawiki php maintenance/update.php
