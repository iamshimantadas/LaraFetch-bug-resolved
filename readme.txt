support file types for upload and internal hash:
.zip
.doc
.docx
.xls
.xlsx
.pdf
.jpg
.png

------------------------------------------------------------
creator:shimanta das

------------------------------------------------------------
Routes

ADMIN PANEL
/admin: Verifies if an admin session is active.
/admin_login: Checks if an admin is logged in.
/admin_dashboard: Validates admin login and redirects to the admin dashboard.
/admin_file: Requires admin login and redirects to the admin/files section.
/admin_file_upload: Enables file uploads to the /public directory.
/admin_links: Requires admin login, displays file information (names, Hashnames), and generates links.
/admin_logout: Facilitates admin logout by clearing the session.
/admin_timer: Redirects to the admin panel's timer page upon admin login.
/admin_timer_req: Handles requests to update the timer.
/admin_file_modify: Redirects to the file modification page.
/admin_file_modify_req: Facilitates updates to file data.
/admin_post_search: Helps locate file details by searching with the topic name.
/deletefile: Allows admin to delete files from the admin panel.
/search_sugg: Provides search suggestions for topic-based file searches within the admin panel.

USERS
/: Presents the standard index view for regular users.
/file_download: Generates download links for user files.
/file_process: Processes file download links and displays Google Ads.
/final_download: Facilitates user file download, records the download in the database, and initiates the download process.

---------------------------------------------------------------------------
technology:
Laravel MVC, MySQL, BootStrap
--------------------------------------------------------------------
for deployment:
Linux: install LAMP stack
Windows/Mac: XAMPP server
 