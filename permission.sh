#!/usr/bin/env bash

# Set www-data owner of everything
chgrp -R www-data *

# Add permission on specific directory
HTTPDUSER=`ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var/cache var/logs 
sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var/cache var/logs /web/assets/img/champions

# Set assets directory as fuly accessible
chmod -R 777 var/cache
chmod -R 777 var/logs

