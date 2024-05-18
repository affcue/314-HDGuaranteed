<?php
namespace Deployer;

// Usage of built-in recipe
//require 'recipe/symfony4.php';

// Here we set the name of the directory in which the particular releases will be located
set('application', '314-HDGuaranteed(V3)');

// Set the options with which the `composer install` command should be invoked
set('composer_options', '{{composer_action}} --prefer-dist --no-progress --no-interaction --no-dev --optimize-autoloader');

// Set how many releases should be kept by Deployer on the server.
// 3 means that we can go 3 releases back. -1 keeps all releases
set('keep_releases', 3);

// Specify which files are to be shared between the releases.
// In my case, it will only be a file with environment variables
add('shared_files', ['.env']);

// List which directories are to be shared between releases.
// In my case, it will only be a log directory
//add('shared_dirs', ['var/log']);

// List of directories which must have write permission on the web server.
//add('writable_dirs', ['var/log', 'var/cache']);

//set('writable_mode', 'chown'); // we can choose from: chmod, chown, chgrp or acl.

// Web server user
//set('http_user', 'xyz');

// Default stage. If no parameter is specified after calling the `dep deploy` command,
// the code will be deployed into the stage defined here
set('default_stage', 'prod');

set('ssh_multiplexing', true);

// Configure the server to which the code will be deployed.
// Provide here the parameters related to access, i.e. address, user or key path.
// Additionally, we choose which git branch will be deployed and provide the directory where the application will appear.
// We can define multiple such hosts in this file, e.g. additional one as a test environment
host(getenv('HOSTING_HOST'))
    ->stage('prod')
    ->user(getenv('HOSTING_USER'))
    ->port(getenv('HOSTING_PORT'))
    ->identityFile(getenv('HOSTING_SSH_KEY_PATH'))
    ->addSshOption('StrictHostKeyChecking', 'no')
    ->set('branch', 'master')
    ->set('deploy_path', '/home/xyz/domains/xyz.pl/{{application}}')
    ->forwardAgent()
;

// Set the path to the PHP version used by our application
set('bin/php', function () {
//   return locateBinaryPath('php7.4');
    return '/usr/local/bin/php74';
});

// I have overwritten the database migration command from the preset
task('database:migrate', function () {
    $options = '{{console_options}} --allow-no-migration --all-or-nothing --no-interaction';
    run(sprintf('{{bin/php}} {{bin/console}} doctrine:migrations:migrate %s', $options));
})->desc('Migrate database');

// In my case, to make the application available under the selected domain, the index.php file should be placed in the directory `/home/xyz/domains/xyz.pl/public_html`.
// The current version can be found in `/home/xyz/domains/xyz.pl/myapp/current/`
// Therefore, after a successful deployment, I create a symlink to the files in the deployment's public directory
task('deploy:symlink', function () {
    run( "ln -nfs {{deploy_path}}/current/public/* {{deploy_path}}/../public_html" );
});

// After the cache is warmed up, I perform a database migration
after('deploy:cache:warmup', 'database:migrate');

after('deploy:failed', 'deploy:unlock');
