#!/bin/bash
user="$1"
password="$2"
mysql -u "$1"   --password="$2" kk_murugappan < /home/student_2018_fall/kk_murugappan/existing_tables.sql

mysql -u "$1"   --password="$2" kk_murugappan < /home/student_2018_fall/kk_murugappan/new_tables.sql
mysql -u "$1" --password="$2" kk_murugappan -B -e "select * from \`AUTHOR\`;" | sed 's/\t/","/g;s/^/"/;s/$/"/;s/\n//g' > Author.csv
mongo kk_murugappan -u "$1" -p "$2" --eval "db.Author.drop()"
mongo kk_murugappan -u kk_murugappan -p A00427876 --eval "db.Article.drop()"
mongo kk_murugappan -u kk_murugappan -p A00427876 --eval "db.mongo_Article.drop()"
mongo kk_murugappan -u kk_murugappan -p A00427876 --eval "db.mongo_Volume.drop()"
mongo kk_murugappan -u kk_murugappan -p A00427876 --eval "db.mongo_Magazine.drop()"
mongo kk_murugappan -u "$1" -p "$2" --eval "db.createCollection('Author')"
mongo kk_murugappan -u kk_murugappan -p A00427876 --eval "db.createCollection('Article')"

python /home/student_2018_fall/kk_murugappan/csvtojson1.py -i ./Author.csv -o ./Author.json
mongoimport --db kk_murugappan -u "$1" -p "$2" --collection Author --type json --file Author.json --jsonArray
#python articletomongo.py
mongoimport --db kk_murugappan -u "$1" -p "$2" --collection Article --type json --file articles.json
mongo kk_murugappan -u "$1" -p "$2"  --eval "load('articletomongo.js')"
mongo kk_murugappan -u "$1" -p "$2"  --eval "load('volumetomongo.js')"
mongo kk_murugappan -u "$1" -p "$2"  --eval "load('magazinetomongo.js')"
