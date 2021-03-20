time for i in . extensions/*/ skins/*/; do
  git -C "$i" pull
  composer --working-dir="$i" install
  composer --working-dir="$i" update
  npm -C "$i" i
  git -C "$i" checkout -- package-lock.json
done

# this will update the database schema
docker exec -it boxwiki_boxwiki_1 php maintenance/update.php
