# CustomCSSBundle

A Kimai 2 plugin, which allows to edit custom CSS rules through an administration screen.

It ships with some pre-defined CSS rules, which can be added with a button click.

## Installation

First clone it to your Kimai installation `plugins` directory:
```
cd /kimai/var/plugins/
git clone https://github.com/Keleo/CustomCSSBundle.git
```

And then rebuild the cache: 
```
cd /kimai/
bin/console cache:clear
bin/console cache:warmup
```

You could also [download it as zip](https://github.com/keleo/CustomCSSBundle/archive/master.zip) and upload the directory via FTP:

```
/kimai/var/plugins/
├── CustomCSSBundle
│   ├── CustomCSSBundle.php
|   └ ... more files and directories follow here ... 
```

## Permissions

This bundle ships a new permission, which limit access to certain functionalities:

- `edit_custom_css` - every use that owns this permission 

By default, it is assigned to each user with the role `ROLE_SUPER_ADMIN`.

Read how to assign these permission to your user roles in the [permission documentation](https://www.kimai.org/documentation/permissions.html).

## Storage

This bundle stores the custom CSS rules in the file `var/data/custom-css-bundle.css`. 
Make sure its writable by your webserver!

## Screenshot

![Screenshot](https://raw.githubusercontent.com/Keleo/CustomCSSBundle/master/screenshot.jpg)
