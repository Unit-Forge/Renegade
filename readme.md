## Unit-Forge - Renegade
Contributors: 
Dill, J.  
Rodriguez, G.

A complete milsim/clan unit management system built on Laravel with a responsive website.

Features list and statuses to follow.

## Deployment Instructions
1. Clone the repo `git clone https://github.com/Unit-Forge/Renegade.git`  
2. Run Composer `composer install`  
3. Run NPM install `npm install`  
4. Copy and modify the enviromental file `cp .env.example .env`  
5. Setup the mail settings in the enviromental file (for dev, use mailtrap.io)  
6. Generate a secure key `php artisan key:generate`  
7. Run the migration command `php artisan migrate`  
8. Run the seeders `php artisan db:seed`  
9. Run Gulp `gulp` on Windows systems you will need to run gulp within the `/node_modules/.bin/gulp`
10. Site should be deployed and at a clean state

## Contributing Instructions
All changes made into the master branch will require a pull request. Please branch off and once you complete your work commit and creat e formal pull request detailing your changes, any possible compatibility issues, and any notable changes/features.  
  
Once the pull request has been created it will need to be reviewed by a maintainer and then merged into the master branch.

## Testing
The application can be tested using phpunit. Simply run `phpunit` in the project directory and it will execute its test barrage (this will clear all data, so do not run it on a production or staging enviroment).
