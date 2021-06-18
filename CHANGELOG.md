# Cookies Changelog

## 1.1.15 - 2021.06.18
### Added
* Build docs via GitHub Actions CI

### Changed
* Switched documentation system to VitePress

### Fixed
* Remove blank, unused Settings page

## 1.1.14 - 2021.04.15
### Changed
* Move settings from the `composer.json` “extra” to the plugin main class

### Fixed
* Removed duplicate example for Setting Secure Cookies in the docs (https://github.com/nystudio107/craft-cookies/issues/23)

## 1.1.13 - 2021.03.31
### Added
* Added Dockerfile & Makefile for building docs

### Fixed
* No longer hardcode secure to be `true` for regular cookies via PR from jedimonkey (https://github.com/nystudio107/craft-cookies/issues/11)

## 1.1.12 - 2020.02.13
### Changed
* Implemented `sameSite` for cookies, thank to a PR from Kenny Quan

## 1.1.11 - 2018.12.06
### Changed
* Fixed an issue where `getSecure()` would return nothing due to an improper parameter passed to `unserialize()`

## 1.1.10 - 2018.07.22
### Changed
* If the passed in domain is empty, use the `defaultCookieDomain` config setting
* Don't unserialize any classes in secure cookie data
* Code cleanup

## 1.1.9 - 2018.02.01
### Changed
* Renamed the composer package name to `craft-cookies`
* Check to ensure a cookie exists before accessing it in `getSecure()`

## 1.1.8 - 2018.01.23
### Changed
* Fixed an issue with removing cookies
* Added try/catch so errors are logged instead of exceptions thrown

## 1.1.7 - 2017.12.06
### Changed
* Updated to require craftcms/cms `^3.0.0-RC1`
* Switched to `Craft::$app->view->registerTwigExtension` to register the Twig extension

## 1.1.6 - 2017.08.05
### Changed
* Craft 3 beta 23 compatibility

## 1.1.5 - 2017.07.09
### Changed
* Craft 3 beta 20 compatibility

## 1.1.4 - 2017.03.24
### Changed
* `hasSettings` -> `hasCpSettings` for Craft 3 beta 8 compatibility

## 1.1.3 - 2017.03.12
### Added
* Added `craft/cms` as a composer dependency
* Added code inspection typehinting for the plugin & services

### Changed
* Code refactor/cleanup

## 1.1.2 - 2017.02.17
### Changed
* Code cleanup
* Added a new colored icon

## 1.1.1 - 2017.02.10
### Changed
* Cleaned up `composer.json`

## 1.1.0 - 2017.02.01
### Added
- Ported the plugin to Craft 3
