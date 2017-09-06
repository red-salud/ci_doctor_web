#!/bin/bash
# FTP
FTP_HOST="ftp.red-salud.com"
FTP_USERNAME="devUser"
FTP_PASSWORD="rsalud2016peru"
FTP_FOLDER="/ci_doctorweb/backups/"
 
# DATABASE
DATABASE_USERNAME="devUser"
DATABASE_PASSWORD="developer_red2016"
 
# FILE
FILE_PASSWORD=""
FILE_EXT="zip"
 
# DATE
current_time=$(date +%H)
current_date=$(echo `date +%d-%b-%Y` | tr '[:upper:]' '[:lower:]')
current_date_time=$(date +%H-%M_%d-%m-%Y)
 
# Name databases
database[0]="db_desarrollo"
database[1]=""
database[2]=""
 
function sentToFTP {
ftp -in $FTP_HOST << EOF
user $FTP_USERNAME $FTP_PASSWORD
cd $FTP_FOLDER
mkdir $current_date
cd $current_date
mkdir $1
cd $1
binary
put $2
bye
EOF
}
 
for db in ${database[@]}; do
    sql_file=${db}_[${current_date_time}].sql
    db_file="${db}_(${current_time})"
 
    # Export databases in SQL format
    /usr/bin/mysqldump --user=$DATABASE_USERNAME --password=$DATABASE_PASSWORD $db > $sql_file
 
    # Compress SQL file (with optional password)
    if [ -z "$FILE_PASSWORD" ]; then
        zip -q -r "$db_file.$FILE_EXT" "$sql_file"
    else
        zip -q -P "${db}_${FILE_PASSWORD}" -r "$db_file.$FILE_EXT" "$sql_file"
    fi
 
    # Delete SQL file
    rm $sql_file
 
     
    if [ -n "$FTP_HOST" ]; then
        # Send databases to remote FTP
        sentToFTP $db $db_file.$FILE_EXT
 
        # Remove compressed database
        rm $db_file.$FILE_EXT       
    fi
 
done