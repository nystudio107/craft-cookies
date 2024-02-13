# Cookies Changelog

## 4.0.1 - 2024.02.12
### Added
* Added `ServicesTrait` for the plugin service component registration
* Add `phpstan` and `ecs` code linting
* Add `code-analysis.yaml` GitHub action

### Changed
* Updated docs to use node 20 & a new sitemap plugin
* PHPstan code cleanup
* ECS code cleanup

### Fixed
* Fixed an issue where the `samesite` option defaulted to a `bool` when it should have defaulted to the string `Lax`

## 4.0.0 - 2022.05.10
### Added
* Initial Craft CMS 4 release

### Fixed
* Fixed an issue where `sameSite` must be of type boolean ([#37](https://github.com/nystudio107/craft-cookies/issues/37))

## 4.0.0-beta.1 - 2022.03.09

### Added

* Initial Craft CMS 4 compatibility
