CheckApp
-

#### How to: Git Local Ignore
* Put this on your `.git/config`
```
[alias]
	ignore = !git update-index --assume-unchanged 
	unignore = !git update-index --no-assume-unchanged
	ignored = !git ls-files -v | grep ^[a-z]
```
* Do GIT BASH on your local repository
* Command:
   * `git ignore <file>`
* Recommended:
   * `git ignore index.php`
   * `git ignore application2/config/database.php`
   * `git ignore application2/config/rest.php`

#### Developer Notes
* Remember to set encoding to UTF-8 without BOM for new files
* Do not use short_tags such as `<?= ?>`. Use `<?php echo ?>` instead
* Do not use `$this->data` when passing values from controller to view
* Never save user file/data onto a file on the server, use S3

#### Links
* [Database Structure Spreadsheet](https://docs.google.com/spreadsheets/d/1M8zDzkDnJnUgXAto0qZ3s_bAhFAuHZmLnN1ACYnfiMA) - very important
* [Development Site (devphase01.checkapp.asia)](http://devphase01.checkapp.asia) - if inaccessible, ask Ruel for IP whitelist