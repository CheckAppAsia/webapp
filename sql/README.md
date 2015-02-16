## CheckApp SQL
For more structure details, visit this [Google Sheet](https://docs.google.com/spreadsheets/d/1M8zDzkDnJnUgXAto0qZ3s_bAhFAuHZmLnN1ACYnfiMA)
(*If you do not have access, just PM on skype*). Find the latest "Database" sheet, as of time of writing, it's **Database III**.

#### Adding a new table
* Visit the Google Sheet indicated at the top of this README
* Add desired table structure on the sheet
 * Put it on the appropriate database column
 * Table name enclosed with [ ]. Field name and attributes below it
* Highlight and copy your table definition  from the spreadsheet
* Paste it on the system's `/dev/sqlgen`, then **Generate** the SQL
* Add the SQL code onto the appropriate SQL file (*tables inside are alphabetical*)

#### Modifying an existing table
* Visit the Google Sheet indicated at the top of this README
* Find and modify the desired table on the spreadsheet
* Highlight and copy the new table definition  from the spreadsheet
* Paste it on the system's `/dev/sqlgen`, then **Generate** the SQL
* Replace the old SQL table block with your new SQL code in the appropriate SQL file

#### Removing a table
* Visit the Google Sheet indicated at the top of this README
* Highlight the table you want to remove
* Set cell background color as gray, and text color darker gray
 * Background color (Gray above cyan)
 * Text color (Gray above yellow)
* Lastly, remove the table from appropriate SQL file(s)