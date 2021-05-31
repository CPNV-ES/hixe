# Review Installation

# Review Mathieu
## Configuration

L'installation de mon côté se faira sur **Windows 10**, avec le nouveau terminal de Microsoft qui utilise Powershell. 

Je vais commencer l'installation, pour se faire. Je vais suivre la doc d'installation qui se trouve [ici](https://github.com/CPNV-ES/hixe/blob/master/docs/install/install.md).

## Installation

Durant l'installation avec NPM. Plusieurs messages nous conseillaient d'utiliser d'arrêter l'utilisation de certains composants. 

```powershell
npm WARN deprecated urix@0.1.0: Please see https://github.com/lydell/urix#deprecated
npm WARN deprecated har-validator@5.1.5: this library is no longer supported
npm WARN deprecated fsevents@2.1.3: Please update to v 2.2.x
npm WARN deprecated resolve-url@0.2.1: https://github.com/lydell/resolve-url#deprecated
npm WARN deprecated fsevents@1.2.13: fsevents 1 will break on node v14+ and could be using insecure binaries. Upgrade to fsevents 2.
npm WARN deprecated chokidar@2.1.8: Chokidar 2 will break on node v14+. Upgrade to chokidar 3 with 15x less dependencies.
npm WARN deprecated request@2.88.2: request has been deprecated, see https://github.com/request/request/issues/3142
npm WARN deprecated axios@0.19.2: Critical security vulnerability fixed in v0.21.1. For more information, see https://github.com/axios/axios/pull/3410
npm WARN deprecated popper.js@1.16.1: You can find the new Popper v2 at @popperjs/core, this package is dedicated to the legacy v1
npm WARN deprecated core-js@2.6.12: core-js@<3 is no longer maintained and not recommended for usage due to the number of issues. Please, upgrade your dependencies to the actual version of core-js@3.
```

Je suis bloqué lors de l'installation du NPM i

```powershell
npm ERR! code EPERM
npm ERR! syscall rename
npm ERR! path D:\Data\Projects\Github\ES_Dev\hixe\node_modules\fullcalendar\node_modules\acorn-dynamic-import\node_modules\acorn
npm ERR! dest D:\Data\Projects\Github\ES_Dev\hixe\node_modules\fullcalendar\node_modules\acorn-dynamic-import\node_modules\.acorn-V37hAwUa
npm ERR! errno -4048
npm ERR! Error: EPERM: operation not permitted, rename 'D:\Data\Projects\Github\ES_Dev\hixe\node_modules\fullcalendar\node_modules\acorn-dynamic-import\node_modules\acorn' -> 'D:\Data\Projects\Github\ES_Dev\hixe\node_modules\fullcalendar\node_modules\acorn-dynamic-import\node_modules\.acorn-V37hAwUa'
npm ERR!  [Error: EPERM: operation not permitted, rename 'D:\Data\Projects\Github\ES_Dev\hixe\node_modules\fullcalendar\node_modules\acorn-dynamic-import\node_modules\acorn' -> 'D:\Data\Projects\Github\ES_Dev\hixe\node_modules\fullcalendar\node_modules\acorn-dynamic-import\node_modules\.acorn-V37hAwUa'] {
npm ERR!   errno: -4048,
npm ERR!   code: 'EPERM',
npm ERR!   syscall: 'rename',
npm ERR!   path: 'D:\\Data\\Projects\\Github\\ES_Dev\\hixe\\node_modules\\fullcalendar\\node_modules\\acorn-dynamic-import\\node_modules\\acorn',
npm ERR!   dest: 'D:\\Data\\Projects\\Github\\ES_Dev\\hixe\\node_modules\\fullcalendar\\node_modules\\acorn-dynamic-import\\node_modules\\.acorn-V37hAwUa'
npm ERR! }
npm ERR!
npm ERR! The operation was rejected by your operating system.
npm ERR! It's possible that the file was already in use (by a text editor or antivirus),
npm ERR! or that you lack permissions to access it.
npm ERR!
npm ERR! If you believe this might be a permissions issue, please double-check the
npm ERR! permissions of the file and its containing directories, or try running
npm ERR! the command again as root/Administrator.

npm ERR! A complete log of this run can be found in:
npm ERR!     C:\Users\matho\AppData\Local\npm-cache\_logs\2021-01-04T10_15_29_214Z-debug.log
```

SASS V14.1 ne supporte pas Node 15 sur windows.

Pour résoudre le problème, il y avait deux options :
- La version *moyenne* : 
    - Downgrade tous nos dev-tools dans la version souhaitée pour enlever les problèmes de compatibilité.
- La version *plus difficile, mais propre* : 
    - Mettre à jours Sass et ses dépendences.
    - Vérifier que ça marche aussi sur les machines des autres personnes.

J'ai choisir la seconde méthode.

Maintenant toutes les commandes marches, mon projet est oppérationel.





# Review Quentin

## Configuration

WSL GNU/LINUX 4.4.0-19041-Microsoft

Guide suivi : [ici](https://github.com/CPNV-ES/hixe/blob/master/docs/install/install.md)

## Installation

Problème avec la non présence de certaines extensions php lors de l'étape 2 du guide d'installation 'composer i'

```
  Problem 1
    - tijsverkoyen/css-to-inline-styles is locked to version 2.2.2 and an update of this package was not requested.
    - tijsverkoyen/css-to-inline-styles 2.2.2 requires ext-dom * -> it is missing from your system. Install or enable PHP's dom extension.
  Problem 2
    - phar-io/manifest is locked to version 1.0.3 and an update of this package was not requested.
    - phar-io/manifest 1.0.3 requires ext-dom * -> it is missing from your system. Install or enable PHP's dom extension.
  Problem 3
    - phpunit/php-code-coverage is locked to version 7.0.10 and an update of this package was not requested.
    - phpunit/php-code-coverage 7.0.10 requires ext-dom * -> it is missing from your system. Install or enable PHP's dom extension.
  Problem 4
    - phpunit/phpunit is locked to version 8.5.4 and an update of this package was not requested.
    - phpunit/phpunit 8.5.4 requires ext-dom * -> it is missing from your system. Install or enable PHP's dom extension.
  Problem 5
    - theseer/tokenizer is locked to version 1.1.3 and an update of this package was not requested.
    - theseer/tokenizer 1.1.3 requires ext-dom * -> it is missing from your system. Install or enable PHP's dom extension.
  Problem 6
    - tijsverkoyen/css-to-inline-styles 2.2.2 requires ext-dom * -> it is missing from your system. Install or enable PHP's dom extension.
    - laravel/framework v6.18.13 requires tijsverkoyen/css-to-inline-styles ^2.2.1 -> satisfiable by tijsverkoyen/css-to-inline-styles[2.2.2].
    - laravel/framework is locked to version v6.18.13 and an update of this package was not requested.

To enable extensions, verify that they are enabled in your .ini files:
    - /etc/php/7.4/cli/php.ini
    - /etc/php/7.4/cli/conf.d/10-opcache.ini
    - /etc/php/7.4/cli/conf.d/10-pdo.ini
    - /etc/php/7.4/cli/conf.d/20-calendar.ini
    - /etc/php/7.4/cli/conf.d/20-ctype.ini
    - /etc/php/7.4/cli/conf.d/20-exif.ini
    - /etc/php/7.4/cli/conf.d/20-ffi.ini
    - /etc/php/7.4/cli/conf.d/20-fileinfo.ini
    - /etc/php/7.4/cli/conf.d/20-ftp.ini
    - /etc/php/7.4/cli/conf.d/20-gettext.ini
    - /etc/php/7.4/cli/conf.d/20-iconv.ini
    - /etc/php/7.4/cli/conf.d/20-json.ini
    - /etc/php/7.4/cli/conf.d/20-mbstring.ini
    - /etc/php/7.4/cli/conf.d/20-phar.ini
    - /etc/php/7.4/cli/conf.d/20-posix.ini
    - /etc/php/7.4/cli/conf.d/20-readline.ini
    - /etc/php/7.4/cli/conf.d/20-shmop.ini
    - /etc/php/7.4/cli/conf.d/20-sockets.ini
    - /etc/php/7.4/cli/conf.d/20-sysvmsg.ini
    - /etc/php/7.4/cli/conf.d/20-sysvsem.ini
    - /etc/php/7.4/cli/conf.d/20-sysvshm.ini
    - /etc/php/7.4/cli/conf.d/20-tokenizer.ini
You can also run `php --ini` inside terminal to see which files are used by PHP in CLI mode.
```

Solution : sudo apt-get install php-xml

Lors de l'a 3ème étape 'npm i'

Tous c'est bien passé, ça a prit un peu de temps. par contre c'est inquiétant les vulnérabilités qu'il y a ```49 vulnerabilities (27 low, 4 moderate, 18 high)```


Lors de l'étape 4 j'ai eu l'erreur suivante :

```
> watch
> npm run development -- --watch


> development
> cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js "--watch"

/mnt/c/laragon/www/hixe/node_modules/webpack-cli/bin/cli.js:93
                                throw err;
                                ^

Error: Node Sass does not yet support your current environment: Linux 64-bit with Unsupported runtime (88)
For more information on which environments are supported please see:
https://github.com/sass/node-sass/releases/tag/v4.14.1
    at module.exports (/mnt/c/laragon/www/hixe/node_modules/node-sass/lib/binding.js:13:13)
    at Object.<anonymous> (/mnt/c/laragon/www/hixe/node_modules/node-sass/lib/index.js:14:35)
    at Module._compile (/mnt/c/laragon/www/hixe/node_modules/v8-compile-cache/v8-compile-cache.js:192:30)
    at Object.Module._extensions..js (node:internal/modules/cjs/loader:1137:10)
    at Module.load (node:internal/modules/cjs/loader:973:32)
    at Function.Module._load (node:internal/modules/cjs/loader:813:14)
    at Module.require (node:internal/modules/cjs/loader:997:19)
    at require (/mnt/c/laragon/www/hixe/node_modules/v8-compile-cache/v8-compile-cache.js:159:20)
    at implementation (/mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/components/Sass.js:54:27)
    at /mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/components/Preprocessor.js:130:61
    at global.tap (/mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/helpers.js:10:5)
    at Sass.loaderOptions (/mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/components/Preprocessor.js:128:9)
    at /mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/components/Preprocessor.js:87:39
    at global.tap (/mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/helpers.js:10:5)
    at /mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/components/Preprocessor.js:27:13
    at Array.forEach (<anonymous>)
    at Sass.webpackRules (/mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/components/Preprocessor.js:22:22)
    at ComponentFactory.applyRules (/mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/components/ComponentFactory.js:155:23)
    at /mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/components/ComponentFactory.js:66:48
    at /mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/Dispatcher.js:34:47
    at Array.forEach (<anonymous>)
    at Dispatcher.fire (/mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/Dispatcher.js:34:28)
    at Mix.dispatch (/mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/Mix.js:118:25)
    at WebpackConfig.buildRules (/mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/builder/WebpackConfig.js:90:13)
    at WebpackConfig.build (/mnt/c/laragon/www/hixe/node_modules/laravel-mix/src/builder/WebpackConfig.js:23:14)
    at Object.<anonymous> (/mnt/c/laragon/www/hixe/node_modules/laravel-mix/setup/webpack.config.js:29:38)
    at Module._compile (/mnt/c/laragon/www/hixe/node_modules/v8-compile-cache/v8-compile-cache.js:192:30)
    at Object.Module._extensions..js (node:internal/modules/cjs/loader:1137:10)
    at Module.load (node:internal/modules/cjs/loader:973:32)
    at Function.Module._load (node:internal/modules/cjs/loader:813:14)
    at Module.require (node:internal/modules/cjs/loader:997:19)
    at require (/mnt/c/laragon/www/hixe/node_modules/v8-compile-cache/v8-compile-cache.js:159:20)
    at WEBPACK_OPTIONS (/mnt/c/laragon/www/hixe/node_modules/webpack-cli/bin/utils/convert-argv.js:114:13)
    at requireConfig (/mnt/c/laragon/www/hixe/node_modules/webpack-cli/bin/utils/convert-argv.js:116:6)
    at /mnt/c/laragon/www/hixe/node_modules/webpack-cli/bin/utils/convert-argv.js:123:17
    at Array.forEach (<anonymous>)
npm ERR! code 1
npm ERR! path /mnt/c/laragon/www/hixe
npm ERR! command failed
npm ERR! command sh -c cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js "--watch"

npm ERR! A complete log of this run can be found in:
npm ERR!     /home/quentin/.npm/_logs/2021-01-04T10_08_05_349Z-debug.log
npm ERR! code 1
npm ERR! path /mnt/c/laragon/www/hixe
npm ERR! command failed
npm ERR! command sh -c npm run development -- --watch

npm ERR! A complete log of this run can be found in:
npm ERR!     /home/quentin/.npm/_logs/2021-01-04T10_08_05_387Z-debug.log
```

J'abondonne windows

Switch to linux

le guide fonctionne sans soucis

problème dans le code lors de l'appelle de la page home, il essaie de récupérer un info dans une session qui n'existe pas encore et ça plante.


# Review Gabriel
## Configuration

L'installation de mon côté s'est fait sur Windows 10

## Installation

Aucun problème d'installation en suivant le readme


# Review Alexandre
## Configuration

Linux 4.19.0-12-amd64 #1 SMP Debian 4.19.152-1 (2020-10-18) x86_64 GNU/Linux

# Installation

Aucun soucis en suivant le README.md du repo git


