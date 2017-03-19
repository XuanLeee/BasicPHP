# Basic PHP With mySQL
 The system have 5 screen :
S1:  Home page
Path:  ../spoonity/public/
Show 2 links and a textfield allows to input. If user already login, result page will show, else will directly go into login page.
S2: Register
Path:  ../spoonity/public/admin/register.php
 If user not register yet,  using name email and password to register.
 Simple check will use to make sure email address is good format and not  exist.
S3:Login 
Path:  ../spoonity/public/admin/login.php
If user exist in database, allow user to login with email and password..
If user enter the information that does not exist in database, error will show “Error logging you in.” . User should enter information again.
S4: Search log file page
Path:  ../spoonity/public/admin/
1 If user login successful. Show welcome information with user`s name and email. 
2 First link will be a log file that show time and user who log in to this page. 
3 Second link will logout and reload  to user login page.
S5: Log file
1 Show user login email and time 
2 Allow normal user to clean the file and other users will see Logs Cleared: by User ID 
