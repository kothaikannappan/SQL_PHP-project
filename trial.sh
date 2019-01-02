#!/bin/bash

mysql -u kk_murugappan   --password=A00427876 kk_murugappan < /home/student_2018_fall/kk_murugappan/new_tables.sql
mongoimport --db kk_murugappan -u kk_murugappan -p A00427876 --collection Author --type json --file Author.json --jsonArray
