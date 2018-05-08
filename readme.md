### About
I created this as a simple Google Drive alternative in my misguided quest to remove myself from Google's ecosystem (or as much as possible).

It hooks in to S3 via Flysystem and provides a little insight into the file based on top-level MIME types. 

### Installation
 1. Clone repo and run composer
 2. Run `php artisan package:discover`
 3. This creates `config/flysystem.php` add the appropriate .env entries to match the drive type of your choice

### To Do
 - Less ugly (learn bootstrap 4)
 - Figure out AWS access
 - Decouple from AWS
 - Make this a package so it doesn't require an entire Laravel app. 
 