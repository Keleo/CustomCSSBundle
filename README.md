# CustomCSSBundle

A Kimai 2 plugin, which allows to edit custom CSS rules through an administration screen.

It ships with some pre-defined CSS rules, which can be added with a button click.

## Installation

First clone it to your Kimai installation `plugins` directory and then reload the cache:
```bash
git clone https://github.com/Keleo/CustomCSSBundle.git var/plugins/CustomCSSBundle/
bin/console kimai:reload --env=prod
```

If you use a ZIP with manual upload, make sure the directory structure looks like that (especially the directory name `CustomCSSBundle`):

```bash
var/plugins/
├── CustomCSSBundle
│   ├── CustomCSSBundle.php
|   └ ... more files and directories follow here ... 
```

## Permissions

This bundle comes with the following permissions:

- `edit_custom_css` - show the administration screen to edit custom css rules 
- `select_custom_css` - select from the pre-defined rules 

By default, it is assigned to each user with the role `ROLE_SUPER_ADMIN`.

Read how to assign these permission to your user roles in the [permission documentation](https://www.kimai.org/documentation/permissions.html).

## Storage

This bundle stores the custom CSS rules in the file `var/data/custom-css-bundle.css`. 
Make sure its writable by your webserver and included in your backups.

## Screenshot

Screenshots are available [in the store page](https://www.kimai.org/store/keleo-css-custom-bundle.html).
