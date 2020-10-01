docker kill $(docker ps -q)
result=${PWD##*/}
sh ../mickphp/kill.sh $result
php ../mickphp/conf.php
docker build ../mickphp/. -t  mick_php
sh ../mickphp/base.sh

