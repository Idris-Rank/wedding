---
name: rakit-php-compatibility
description: PHP version and extension compatibility guidance for the Rakit PHP 5.4 through 8.x support range.
---

# Rakit PHP Compatibility

- Treat PHP 5.4 as the compatibility floor unless the task explicitly targets a newer runtime.
- Avoid typed properties, scalar/return types, union types, attributes, arrow functions, null coalescing, match, enums, and other newer syntax in shared code.
- Check standard-library behavior differences across PHP 5, 7, and 8 before relying on edge-case behavior.
- Use existing Rakit polyfills and compatibility patterns; do not add redundant shims.
- Keep application code compatible with required extensions: JSON, mbstring, OpenSSL, and fileinfo; verify optional extension use.
- Run `php -l` with the project's supported PHP runtime and test the oldest relevant runtime when available.
- Check Composer constraints and package versions before using newer APIs.
- Avoid relying on PHP 8-only warnings, exception types, filesystem behavior, or parameter semantics.
- Document when a feature necessarily raises the minimum PHP version and update Composer and project documentation together.
