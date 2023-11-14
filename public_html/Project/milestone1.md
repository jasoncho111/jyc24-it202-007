<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Jason Cho (jyc24)</td></tr>
<tr><td> <em>Generated: </em> 11/13/2023 5:56:10 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone1-deliverable/grade/jyc24" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone1 branch</li><li>Create a milestone1.md file in your Project folder</li><li>Git add/commit/push this empty file to Milestone1 (you'll need the link later)</li><li>Fill in the deliverable items<ol><li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e,&nbsp;<a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li></ol></li><li>Ensure your images display correctly in the sample markdown at the bottom</li><ol><li>NOTE: You may want to try to capture as much checklist evidence in your screenshots as possible, you do not need individual screenshots and are recommended to combine things when possible. Also, some screenshots may be reused if applicable.</li></ol><li>Save the submission items</li><li>Copy/paste the markdown from the "Copy markdown to clipboard link" or via the download button</li><li>Paste the code into the milestone1.md file or overwrite the file</li><li>Git add/commit/push the md file to Milestone1</li><li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li><li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku dev</li></ol></li><li>Make a pull request from dev to prod (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku prod</li></ol></li><li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li></ol></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T17.25.22D1_InvalidEmail.png.webp?alt=media&token=e8ac8261-bfbf-4a96-9262-4ea5e1298202"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email address is invalid<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T17.26.25D1_PWInvalid.png.webp?alt=media&token=c08eb7af-5e66-4a44-8ba3-306e2c78aaed"/></td></tr>
<tr><td> <em>Caption:</em> <p>Password is invalid<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T17.26.50D1_PWMismatch.png.webp?alt=media&token=94b46748-c4fd-4ed9-b49a-21bf7743eeaf"/></td></tr>
<tr><td> <em>Caption:</em> <p>Passwords do not match<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T17.28.38D1_EmailTaken.png.webp?alt=media&token=9c6de2d6-c60b-4b86-8302-a7d7b0c772c0"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email is already taken<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T17.29.26D1_UsernameTaken.png.webp?alt=media&token=b6b80ecf-b1b9-4da2-8c48-5a8bc361bbae"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username is already taken<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T17.30.55D1_ValidInfo.png.webp?alt=media&token=b58c7c6c-35a5-4493-b128-808435e0bdd2"/></td></tr>
<tr><td> <em>Caption:</em> <p>Form with valid info pre-submission<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T17.31.16D1_RegisterSuccess.png.webp?alt=media&token=0da55b69-776a-45dd-9608-3af09b8d471f"/></td></tr>
<tr><td> <em>Caption:</em> <p>Registration success<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T17.33.28D1_UsersTable.png.webp?alt=media&token=f45285fd-a37e-46a8-bc0e-1113de593677"/></td></tr>
<tr><td> <em>Caption:</em> <p>#New user is in row 3<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/20">https://github.com/jasoncho111/jyc24-it202-007/pull/20</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/24">https://github.com/jasoncho111/jyc24-it202-007/pull/24</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Feature found here:&nbsp;<a href="https://jyc24-prod-baff006bca28.herokuapp.com/Project/register.php">https://jyc24-prod-baff006bca28.herokuapp.com/Project/register.php</a><div><br></div><div>The form has each input field in its own div<br>element. it is submitted with method POST. On submission, the data is sent<br>to a special variable in php called $_POST. Once the data is stored<br>in that variable, we can do validation on it. The frontend validation pulls<br>out the values of each field and runs multiple checks on them, i.e.<br>ensuring that all the data entered is valid. For instance, we check if<br>the password and confirm password fields are the same using the !== operator.<br>client side, we pull the data directly from the form values and run<br>similar checks, e.g. pw != confirm</div><div>If all of the checks pass (there are<br>no issues with the input data), then we store the data in the<br>database. we use an INSERT INTO statement to insert the values into the<br>users table. the password isnt stored in the database as plaintext. before storing<br>it, we hash the password with&nbsp;password_hash($password, PASSWORD_BCRYPT);</div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T18.30.48D2_InvalidPassword.png.webp?alt=media&token=f9b875bb-6d9d-4338-81c1-d8a3b9629d2c"/></td></tr>
<tr><td> <em>Caption:</em> <p>Password doesn&#39;t match the database value<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T18.31.19D2_UsernameEmailNotFound.png.webp?alt=media&token=753fa80d-a0c3-41bb-afc3-cd0abfa55f64"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username/email does not exist - attempted to log in with a user name<br>that is not in the db<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T18.54.29D2_SuccessfulLogin.png.webp?alt=media&token=225ee170-47d5-4561-a7d7-1220bca64306"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful login into admin account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/20">https://github.com/jasoncho111/jyc24-it202-007/pull/20</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/32">https://github.com/jasoncho111/jyc24-it202-007/pull/32</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Feature found here:&nbsp;<a href="https://jyc24-prod-baff006bca28.herokuapp.com/Project/login.php">https://jyc24-prod-baff006bca28.herokuapp.com/Project/login.php</a><div><br></div><div>Similar to registration page: The form has each input field<br>in its own div element. it is submitted with method POST. On submission,<br>the data is sent to a special variable in php called $_POST. Once<br>the data is stored in that variable, we can do validation on it.<br>The frontend validation pulls out the values of each field and runs multiple<br>checks on them, i.e. ensuring that all the data entered is valid. For<br>instance, we check if the input username/email matches any username/email in the database.</div><div>If<br>all of the checks pass (there are no issues with the input data),<br>then the user is logged in (a session is started).&nbsp;</div><div>The password is hashed<br>in the same way it is hashed in register.php. We compare the hash<br>with the password hash fetched from the db, we use the function password_verify()<br>to check for&nbsp; a password match between the hashes.&nbsp;</div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T19.55.55D3_SuccessfulLogout.png.webp?alt=media&token=49b80f2c-f40a-4b7b-bd9a-5cb134a0da0b"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful logout<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T19.56.19D3_LoginProtectedPage.png.webp?alt=media&token=50e7434b-abcb-4aa1-a1c5-0e38ccf288cf"/></td></tr>
<tr><td> <em>Caption:</em> <p>Cannot access login protected page after logout<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/21">https://github.com/jasoncho111/jyc24-it202-007/pull/21</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>When you login, a session is created using the variable $_SESSION.<div>When you click<br>the logout button, the current session gets destroyed - session_unset, session_destroy. After the<br>session is reset, you are redirected to the login page.</div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.00.12D3_LoginProtectedPage.png.webp?alt=media&token=e90d18ad-91a9-41bb-bdee-b23d968a363e"/></td></tr>
<tr><td> <em>Caption:</em> <p>attempting to access home.php when not logged in<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.00.41D4_AdminProtectedPage.png.webp?alt=media&token=4cc611d6-f471-46f7-9dbd-478db33a6ec9"/></td></tr>
<tr><td> <em>Caption:</em> <p>attempting to access list_roles.php on a non-admin user<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.01.10D4_RolesTable.png.webp?alt=media&token=63363b02-79d8-4918-a877-a8ea4ebb61a6"/></td></tr>
<tr><td> <em>Caption:</em> <p>Roles table with the admin role<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.02.43D4_UserRolesTable.png.webp?alt=media&token=d2b153fa-39c4-402e-8ab3-0dd815e77765"/></td></tr>
<tr><td> <em>Caption:</em> <p>Associates adminuser (id 1) to admin role<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/31">https://github.com/jasoncho111/jyc24-it202-007/pull/31</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <div>Feature found here:<a href="https://">&nbsp;https://jyc24-prod-baff006bca28.herokuapp.com/Project/logout.php</a><br></div><div>or can be used from home page</div><div><br></div>Session data is only<br>set when you log in. Upon accessing a page that you must be<br>logged in to access, the page checks if there is any session data<br>set. If there is, then the user can proceed to the page. If<br>not, then the user is redirected to login.php and is given the message<br>that they must log in.<br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <div>Feature found here:&nbsp;<a href="https://jyc24-prod-baff006bca28.herokuapp.com/Project/admin/list_roles.php">https://jyc24-prod-baff006bca28.herokuapp.com/Project/admin/list_roles.php</a><br></div><div><br></div>Upon accessing a role protected page, we grab all of<br>the current user's/session's roles. We then iterate through the roles until the role<br>is matched. If we never find the expected role, then the user does<br>not have permission to view the page and is redirected elsewhere.<br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.07.43D5_NavFormsStyled.png.webp?alt=media&token=6283d2a4-489e-4309-a6da-194129f31eab"/></td></tr>
<tr><td> <em>Caption:</em> <p>Navigation and forms are styled <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.08.08D5_TablesStyled.png.webp?alt=media&token=700bd86c-0812-4aeb-8f2e-f9172e317843"/></td></tr>
<tr><td> <em>Caption:</em> <p>Tables are styled<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/30">https://github.com/jasoncho111/jyc24-it202-007/pull/30</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/32">https://github.com/jasoncho111/jyc24-it202-007/pull/32</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <div>Style sheet found here: <a href="https://jyc24-prod-baff006bca28.herokuapp.com/Project/styles.css">https://jyc24-prod-baff006bca28.herokuapp.com/Project/styles.css</a><br></div><div><br></div>For the nav, I kept it all inline.<br>I messed with padding and margins to make it look nicer with spacing.<br>the nav itself has a background color of lightblue. the nav links (&lt;a&gt;<br>tag) are red and font size 22. when you hover over a nav<br>list element, its background color changes to light sky blue.&nbsp;<div><br></div><div>For forms that are<br>not on admin pages (profile, login, register), i gave them all an ID<br>called "non-admin-form". non admin forms have black borders.</div><div>all input fields have slightly rounded<br>corners (radius: 10%)</div><div><br></div><div>input elements with specific attributes (only for type=submit)&nbsp; have margins used<br>to shift their position on the page</div><div>for tables, I just gave the table,<br>th, and td elements a very simple border</div><div><br></div><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.13.43D1_PWMismatch.png.webp?alt=media&token=7664e334-77cd-4432-b361-6101bb72a83b"/></td></tr>
<tr><td> <em>Caption:</em> <p>Password mismatch error on register page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.14.11D4_AdminProtectedPage.png.webp?alt=media&token=06df9fb8-a385-4093-97e9-65180bf84ae1"/></td></tr>
<tr><td> <em>Caption:</em> <p>Admin protected page output<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.14.25D1_UsernameTaken.png.webp?alt=media&token=ba20dc2d-b604-4fa4-80b5-0621b7f2123f"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username already in use on register page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/24">https://github.com/jasoncho111/jyc24-it202-007/pull/24</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>With all messages, it works to just explain clearly what exactly the error<br>was. If we try to validate an email but the email field is<br>empty, then we should output that the email field cannot be empty. If<br>we attempt to validate a password change, but the old password does not<br>match the password in the database, then we must output that the password<br>that was inputted was incorrect.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.16.26D7_Profile.png.webp?alt=media&token=59725e0f-3058-4dc4-8750-ea580a2f0b15"/></td></tr>
<tr><td> <em>Caption:</em> <p>User profile page on admin account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/29">https://github.com/jasoncho111/jyc24-it202-007/pull/29</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/32">https://github.com/jasoncho111/jyc24-it202-007/pull/32</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <div>Style sheet found here: <a href="https://jyc24-prod-baff006bca28.herokuapp.com/Project/profile.php">https://jyc24-prod-baff006bca28.herokuapp.com/Project/profile.php</a><br></div><div><br></div>When the page is first loaded, we get<br>the current session user's email and username from the $_SESSION variable. Then, those<br>values are placed in the value attribute of the email and username input<br>in the form.&nbsp;<br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.21.14D8_UsernameChange.png.webp?alt=media&token=ca679d00-41a5-4a95-9e1a-098430eed6c6"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username validation- successful usename change<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.23.24D8_EmailChanged.png.webp?alt=media&token=6e9ea465-38f3-4745-9d46-c2dccc1c8050"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email validation- successful email change<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.23.57D8_PasswordChange.png.webp?alt=media&token=1237c344-b0ab-427b-ae9a-740a21af4afb"/></td></tr>
<tr><td> <em>Caption:</em> <p>Password validation- successful password change<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.24.32D8_PasswordInvalidPWMismatch.png.webp?alt=media&token=c7103ca9-b2e7-4220-8f43-6d4eccca5deb"/></td></tr>
<tr><td> <em>Caption:</em> <p>New password mismatch error, current password incorrect error<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.27.21D8_UsernameTaken.png.webp?alt=media&token=a4675cde-bbbc-4a85-8979-a12e19444370"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username already in use error<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.27.37D8_EmailTaken.png.webp?alt=media&token=5df4ab4f-07a4-4095-b757-d1dbc011a316"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email already in use error<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.27.59D8_UsersTableInitial.png.webp?alt=media&token=4e384b48-4346-4b75-89ae-ef1947d9c60f"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users table before changing data in profile<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.28.27D8_UsersTableUpdated.png.webp?alt=media&token=77565245-7d8a-4144-ab7f-e1a587b83a60"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users table after changing data in profile. Details on what was changed are<br>in the photo.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/29">https://github.com/jasoncho111/jyc24-it202-007/pull/29</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/32">https://github.com/jasoncho111/jyc24-it202-007/pull/32</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>Style sheet found here: <a href="https://jyc24-prod-baff006bca28.herokuapp.com/Project/profile.php">https://jyc24-prod-baff006bca28.herokuapp.com/Project/profile.php</a><div><br></div><div>when username or email is updated, we get<br>the value from the $_POST variable. We first perform some basic validation on<br>the new value. Then we attempt to update the db value using a<br>sql UPDATE statement. If the update throws an error, we catch it and<br>then check for which value (username or email) was a duplicate value, already<br>present in the DB. We flash a message accordingly.<br><br>When password is updated, we<br>first perform basic validation on the password. Then we check if the new<br>password and confirm password values are the same. If they are, we check<br>the old password and make sure its value matches the hash in the<br>database. If the old password matches, then we are good to change to<br>the new password, so we hash the new password and update the table<br>value in the database.&nbsp;</div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Issues and Project Board </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.50.58D9_ProjectBoard.png.webp?alt=media&token=fa9ebb23-0bd8-4da8-94b9-36b76ec531c1"/></td></tr>
<tr><td> <em>Caption:</em> <p>issues 1-5 correspond to deliverables 1-5 on the project board <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-13T22.53.20D9_ProjectBoard2.png.webp?alt=media&token=b9bae0cb-172b-4112-9489-9c5af084f4cd"/></td></tr>
<tr><td> <em>Caption:</em> <p>issues 6-9 on the board<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Include a direct link to your Project Board</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/users/jasoncho111/projects/8/views/1">https://github.com/users/jasoncho111/projects/8/views/1</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Prod Application Link to Login Page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jyc24-prod-baff006bca28.herokuapp.com/Project/login.php">https://jyc24-prod-baff006bca28.herokuapp.com/Project/login.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone1-deliverable/grade/jyc24" target="_blank">Grading</a></td></tr></table>