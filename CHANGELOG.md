# Changelog

## Version 2.0

Compatibility: requires minimum Kimai 2.0

- Fixed: compatibility with Kimai 2.0

Attention: all existing rules from v1 are stored in var/data/custom-css-bundle.css.
They will likely not work in v2 due to the new HTML structures and classes.
Therefor you have to manually import them. 
The new storage file is: var/data/custom-css.css

## 1.4

- Minimal form change
- Added rule for responsive tables everywhere
- Added rule to hide calendar menu in navigation

## 1.3

- Added rule to hide the red-lines between overlapping timesheet records
- Added rule to highlight active timesheet records
- Fixed "remove colored dot" rule for Kimai 1.9 HTML changes

Best compatibility with Kimai 1.9

## 1.2

- Added rule for switching save & close/reset buttons order

Best compatibility with Kimai 1.9

## 1.1

- Improved permission handling
- New rule to disable colored dots

Compatible with Kimai 1.4, but 1.6 is recommended

## 1.0

- Added two login rules
- Replace deprecated constant

Compatible with Kimai 1.4

## 0.4 

- Added new rules:
  - `timesheet` / `responsive-timesheet`
  - `timesheet` / `wrap-label-timesheet`
- Styling update in admin screen
  
Compatible with Kimai 0.9
