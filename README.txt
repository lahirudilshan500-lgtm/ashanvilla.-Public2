LAKEMOON VILLA WEBSITE — SETUP GUIDE
=====================================

FILES
- index.php: complete responsive homepage, gallery, amenities, booking form and contact details
- style.css: responsive design and styling
- script.js: mobile navigation, image lightbox and booking date helper
- booking.php: validates booking requests and saves them to bookings.csv
- contact.php: validates contact messages and saves them to contact-messages.csv
- assets/: your uploaded villa and bathroom photos
- .htaccess: blocks direct public access to CSV files on Apache hosting

RUN LOCALLY
1. Install PHP 8+.
2. Put the lakemoon_villa_website folder inside your PHP server's web directory.
3. Start a PHP server in this folder:
   php -S localhost:8000
4. Open http://localhost:8000 in your browser.

IMPORTANT BEFORE GOING LIVE
1. Replace “Lakemoon Villa” with the real property name.
2. Update the sample email and phone number in index.php.
3. Update the villa description and amenities so they match your real property.
4. Upload the site to a PHP-enabled web host.
5. Ensure the folder is writable by PHP so the forms can save CSV files. On shared hosting, follow the host's file permission guidance.
6. Keep the CSV files protected. The included .htaccess works on Apache; for Nginx or other servers, configure equivalent rules or save the files outside the public web directory.
7. The forms save requests; they do NOT send email and do NOT check real room availability. Set up SMTP/email notifications and a real booking calendar/payment provider before accepting confirmed bookings.
8. Add HTTPS/SSL and spam protection (for example, a CAPTCHA or rate limiting) before production.
9. Review privacy/legal requirements for storing guest contact details.

The form confirmation means a request was received by the demo site, not that the booking is confirmed.
