#### SQL Generator

##### Usage
* To use, copy your table from the Development Spreadsheet, and paste it onto `input.txt`
* Then run `/dev/sqlgen` which will show you the corresponding SQL

##### Sample input.txt
```
[institution]
id =pk,i,us,ai
description =tx
address =tx
num_landline1 =vc,30
num_landline2 =vc,30
num_phone1 =vc,30
num_phone2 =vc,30
coord_lat =db
coord_lng =db
updated =ts,uc
```

##### Field attributes
Remember that fields need attributes
Example:

user_id =p,i,us,ai

this means user_id is (p) primary key, (i) integer, (us) unsigned, (ai) auto-increment

Check the development spreadsheet for more information.