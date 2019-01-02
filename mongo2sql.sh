if [ $# -ne 2 ]
then
    printf "\n Please enter <MySQL User> <MySQL Password>  \n\n"
    exit 1
fi

User="$1"
Password="$2"

mongoexport --db kk_murugappan -u "$User" -p "$Password" --collection mongo_Article --type=csv --fields title,Mag_id,Volume_id,page-no,Author_id> Articleout.csv

mongoexport --db kk_murugappan -u "$User" -p "$Password" --collection mongo_Magazine --type=csv --fields name> Magazineout.csv

mongoexport --db kk_murugappan -u "$User" -p "$Password" --collection mongo_Volume --type=csv --fields Volume_id,mag_id,year> Volumeout.csv

mysql -u "$User" --password="$Password" kk_murugappan -e "load data local infile 'Articleout.csv' into table Article FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n' IGNORE 1 LINES (title,Mag_id,Volume_id,pg_no,Author_id);"

#mysql -u "$User" --password="$Password" kk_murugappan -e "load data local infile 'Magazineout.csv' into table MAGAZINE";
mysql -u "$User" --password="$Password"  kk_murugappan -e "load data local infile 'Volumeout.csv' into table Volume FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'IGNORE 1 LINES (Volume_id, Mag_id, yr);"
mysql -u "$User" --password="$Password" kk_murugappan -e "LOAD DATA LOCAL INFILE 'Magazineout.csv' INTO TABLE MAGAZINE FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'IGNORE 1 LINES (name);"
