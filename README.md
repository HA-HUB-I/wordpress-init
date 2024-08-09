# wordpress-init

Bedrock Structure
<div align='center'>

# Keep Folders and Files

*
Keep Folders and Files
├── config  
    ├── environments
├── development.php
├── staging.php
├── web
│ ├── app/mu-plugins/bedrock-autoloader.php
│ ├── .htaccess
│ ├── index.php
│ ├── wp-config.php
├── create_database.php - config for first run
├── .env.local - set config for wordpress & create_database.php
├── composer.json
├──*

</div>
!`Require composer library Info
"require":
"php": "^8.3", minimum php
"composer/installers": folder structure , package type to install to path map installer-paths
"vlucas/phpdotenv": Loads environment variables from .env to getenv(), $\_ENV and $\_SERVER automagically.`


Require composer library Info
"require":
"php": "^8.3", minimum php
"composer/installers": folder structure , package type to install to path map installer-paths
"vlucas/phpdotenv": Loads environment variables from .env to getenv(), $\_ENV and $\_SERVER automagically.
"oscarotero/env": library to get environment variables converted to simple types.
"roots/wordpress": Wordpress Core No Content / duplicate with roots/bedrock
"roots/wp-config": PreDefine wp-config.php from .env
"roots/bedrock-autoloader": AutoLoad/Activate Plugin in Mu-plugin / keep bedrock-autoloader.php in /mu-plugins/
"roots/wp-password-bcrypt": password_hash and password_verify functions which default to the strong and more secure bcrypt.
"roots/bedrock": Wordpress Core No Content
"doctrine/dbal": database schema introspection and schema management.
"wpackagist-plugin/woocommerce": Auto install woocomerce in mu-folder/auto activate
"plugin/fake-sync-store" : Test Plugin
"roots/wp-stage-switcher": stage switcher from local, development to production
"wpackagist-theme/twentytwentyfour": Auto install theme
