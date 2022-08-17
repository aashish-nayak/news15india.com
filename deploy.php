<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';
require 'contrib/rsync.php';

///////////////////////////////////    
// Config
///////////////////////////////////

set('application', 'News15India');
set('repository', 'git@github.com:aashish-nayak/news15india.com.git'); // Git Repository
set('ssh_multiplexing', true);  // Speed up deployment
//set('default_timeout', 1000);

set('rsync_src', function () {
    return __DIR__; // If your project isn't in the root, you'll need to change this.
});

// Configuring the rsync exclusions.
// You'll want to exclude anything that you don't want on the production server.
add('rsync', [
    'exclude' => [
        '.git',
        '/vendor/',
        '/node_modules/',
        '.github',
        'deploy.php',
    ],
]);

// Set up a deployer task to copy secrets to the server.
// Grabs the dotenv file from the github secret
task('deploy:secrets', function () {
    file_put_contents(__DIR__ . '/.env', getenv('DOT_ENV'));
    upload('.env', get('deploy_path') . '/shared');
});

///////////////////////////////////
// Hosts
///////////////////////////////////

host('prod') // Name of the server
->setHostname('217.21.91.22:65002') // Hostname or IP address
->set('remote_user', 'u845004101') // SSH user
->set('branch', 'master') // Git branch
->set('deploy_path', 'u845004101/home/domains/news15india.com'); // Deploy path

after('deploy:failed', 'deploy:unlock');  // Unlock after failed deploy

///////////////////////////////////
// Tasks
///////////////////////////////////

desc('Start of Deploy the application');

task('deploy', [
    'deploy:prepare',
    'rsync',                // Deploy code & built assets
    'deploy:secrets',       // Deploy secrets
    'deploy:vendors',
    'deploy:shared',        // 
    'artisan:storage:link', //
    'artisan:view:cache',   //
    'artisan:config:cache', // Laravel specific steps
    'artisan:migrate',      //
    'artisan:queue:restart',//
    'deploy:publish',       // 
]);

desc('End of Deploy the application');