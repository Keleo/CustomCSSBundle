# CustomCSSBundle

A Kimai plugin, which allows editing custom CSS rules through an administration screen.

It ships with some pre-defined CSS rules, which can be added with a button click.

## Installation

This plugin is compatible with the following Kimai releases:

| Bundle version | Minimum Kimai version |
|----------------|-----------------------|
| 2.1.0          | 2.1.0                 |
| 2.0 - 2.0.1    | 2.0.0                 |
| 1.5 - 1.7      | 1.9                   |
| 1.0 - 1.4      | 1.4                   |

You find the most notable changes between the versions in the file [CHANGELOG.md](CHANGELOG.md).

Download and extract the [compatible release](https://github.com/Keleo/CustomCSSBundle/releases) in `var/plugins/` (see [plugin docs](https://www.kimai.org/documentation/plugin-management.html)).

The file structure needs to look like this afterwards:

```bash
var/plugins/
├── CustomCSSBundle
│   ├── CustomCSSBundle.php
|   └ ... more files and directories follow here ... 
```

Then rebuild the cache:
```bash
bin/console kimai:reload --env=prod
```

## Permissions

This bundle comes with the following permissions:

- `edit_custom_css` - show the administration screen to edit custom css rules 
- `select_custom_css` - select from the pre-defined rules 

By default, it is assigned to each user with the role `ROLE_SUPER_ADMIN`.

Read how to assign these permissions to your user roles in the [permission documentation](https://www.kimai.org/documentation/permissions.html).

## Storage

This bundle stores the custom CSS rules in the file `var/data/custom-css-bundle.css`. 
Make sure its writable by your webserver and included in your backups.

## Screenshot

Screenshots are available [in the store page](https://www.kimai.org/store/keleo-css-custom-bundle.html).
