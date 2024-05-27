## Version 2.2.0

Compatibility: requires minimum Kimai 2.17.0

- Code modernization

## Version 2.1.0

Compatibility: requires minimum Kimai 2.1.0

- Fixed: route mapping type changed to attribute

## Version 2.0.2

Compatibility: requires minimum Kimai 2.0

- Fix `remove-color-dots` rule

## Version 2.0.1

Compatibility: requires minimum Kimai 2.0

- Updates existing CSS rules to be compatible with 2.0.
- Remove (plugin) from permission/role header

Hiding navigation items will only work with Kimai 2.0.24 

## Version 2.0

Compatibility: requires minimum Kimai 2.0

- Fixed: compatibility with Kimai 2.0

Attention: all existing rules from v1 are stored in var/data/custom-css-bundle.css.
They will likely not work in v2 due to the new HTML structures and classes.
Therefor you have to manually import them.
The new storage file is: var/data/custom-css.css

## 1.7

Compatibility: requires minimum Kimai 1.9

- Prevent that HTML tags can be injected
- Fix code styles

## 1.6

Compatibility: requires minimum Kimai 1.9

- updated install documentation
- translated warning message for a rule inserted twice
- added "page action" with link to documentation

## 1.5

Compatibility: requires minimum Kimai 1.9

- Use FileHelper to store and load custom CSS rules

## 1.4

- Added permission `select_custom_css` to hide pre-made rules
- Changed translation filenames from `*.xliff` to `*.xlf`
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
