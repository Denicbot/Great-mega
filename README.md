# Great Mega Forex - PHP Website (Ready to Deploy)

## What's included
- Full PHP project ready to upload to cPanel (`public_html` style structure)
- Admin panel with: login, upload image, change password, delete images
- Gallery page that shows uploaded images with descriptions
- Registration page (UI only, not functional)
- `setup.php` to create database tables and initial admin (run once then delete)
- `db.sql` - SQL schema file (optional) for manual import

## How to install on cPanel
1. **Create a MySQL database** in cPanel (MySQL Databases) and a DB user. Grant the user to the DB.
2. **Edit** `includes/config.php` with your DB credentials.
3. **Upload** all files to your domain's `public_html` folder (you can upload the ZIP and extract it in cPanel File Manager).
4. Make sure the `uploads/` folder is writable by PHP (chmod 755 or 775).
5. Visit `https://yourdomain.com/setup.php` and create the initial admin account. After creating the admin, **delete `setup.php`** from the server.
6. Login at `https://yourdomain.com/admin/login.php`
7. Use the admin dashboard to upload images to the gallery.
8. Optionally import `db.sql` using phpMyAdmin instead of running setup.php.

## Notes & Next steps
- Replace the logo placeholder in `includes/header.php` with your actual logo `<img src='YOUR_LOGO_URL'>`.
- The registration page is UI-only. When ready, connect it to `users` table with proper validation.
- For security, remove `setup.php` after initial setup.
- Consider enabling SSL (Let's Encrypt) in cPanel for HTTPS.
