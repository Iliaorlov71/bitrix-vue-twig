#!/usr/bin/env bash

if [ ! -f "./.env" ]; then echo "А файл .env кто за тебя создавать будет?"; exit 99; fi

git reset HEAD --hard

git checkout master && git pull origin master

rm -rf bitrix

git submodule init

git submodule update

composer install

mkdir upload

cd ./sites/s1
ln -s "../../bitrix" "bitrix"
ln -s "../../local" "local"
ln -s "../../upload" "upload"

cd ../../

npm install

./vendor/bin/jedi env:init default




php migratot install
php migrator migrate


npm run encore -- dev

