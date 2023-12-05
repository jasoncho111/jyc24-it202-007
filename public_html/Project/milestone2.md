<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 API Project</td></tr>
<tr><td> <em>Student: </em> Jason Cho (jyc24)</td></tr>
<tr><td> <em>Generated: </em> 12/4/2023 10:57:11 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone-2-api-project/grade/jyc24" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone2 branch</li><li>Create a new markdown file called milestone2.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone2.md</li><li>Add/commit/push the changes to Milestone2</li><li>PR Milestone2 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 3</li><li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on github and everywhere else. Images are only accepted from dev or prod, not local host. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Define the appropriate table or tables for your API </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshots of the table definition SQL files</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T02.38.52D1_CountriesTable.png.webp?alt=media&token=916179d4-c215-4b67-ae9e-c3ca47ad1211"/></td></tr>
<tr><td> <em>Caption:</em> <p>Countries table- entities represent a country. Attributes include the country name, capital, currency,<br>population, and whether or not its independent or part of the UN. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T02.42.07D1_CountryLanguagesTable.png.webp?alt=media&token=3fa643db-8f0b-44b6-8120-d4caa9de7ca5"/></td></tr>
<tr><td> <em>Caption:</em> <p>CountryLanguges table- table represents a many to many relationship where each entity maps<br>a country to a language spoken in that country<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Mappings</td></tr>
<tr><td> <em>Response:</em> <div>"Countries" table columns:</div><div>id, country_name*, capital*, currency_name*, is_independent*, is_un_member*, population*, is_real, from_api, is_active, created,<br>modified<br><br>"CountryLanguages" table columns:</div><div>id, country_name*, language*, created, modified</div><div><br></div><div>*attributes marked with an asterisk are pulled<br>from the API</div><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/59">https://github.com/jasoncho111/jyc24-it202-007/pull/59</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Data Creation Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshots of the Page and the Code (at least two)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T02.52.00D2_ValidData.png.webp?alt=media&token=bf790053-70df-44d2-9ac0-034c62d02376"/></td></tr>
<tr><td> <em>Caption:</em> <p>Form filled with valid data before submit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T02.52.23D2_DataCreationSuccess.png.webp?alt=media&token=9e220fc0-aaeb-4c2c-9688-a07f25b38498"/></td></tr>
<tr><td> <em>Caption:</em> <p>Form data successfully submitted<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T02.52.58D2_FormValidationCode.png.webp?alt=media&token=e2f60b28-eda1-4f7e-94b3-98649ca32f65"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code for some of the form validation, and correct data types shown<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T02.53.28D2_ErrorMessages.png.webp?alt=media&token=7d7f7ca7-2367-4675-bb67-5fc2e4180af1"/></td></tr>
<tr><td> <em>Caption:</em> <p>User friendly error message when input data is bad<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Database Results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T02.54.55D2_DatabaseCreationSuccess.png.webp?alt=media&token=cc5e7807-4ae2-471e-9540-4ec8e7acb882"/></td></tr>
<tr><td> <em>Caption:</em> <p>Entry 39 with ID 94, country successfully submitted. Other entries above it are<br>from API (look at from_api column). API pulls are on a different page,<br>so all inserted values from API pulls are hard coded to be inserted<br>with from_api=1. For country creation page, countries inserted are hard coded to have<br>value from_api=0<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Misc Checklist</td></tr>
<tr><td> <em>Response:</em> <p>Entities are unique on 2 keys: The primary key, id, which honestly doesn&#39;t<br>really get used like a primary key<div>A unique key, country_name, which acts more<br>as the primary key.</div><div><br></div><div>For manually added items, duplicates on insert are caught by<br>PDOException code and instead updated using an insert into statement afterwards</div><div><br></div><div>For API items,<br>duplicate entries are checked before hand-&gt; Do a pull on country_name from Countries<br>from the DB, check the new country to insert from the API pull.<br>If the country already exists in the DB, delete it completely from the<br>DB. Afterwards, insert all values pulled from API. This will properly update the<br>country data, but the ID will change if the country already existed in<br>the table. I may try to fix that in the future, but it<br>is why I stated that the country name acts more as the primary<br>key than the id does.</div><div><br></div><div>Only the admin role has permissions to update entities</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to this file on Heroku Prod</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jyc24-prod-baff006bca28.herokuapp.com/Project/admin/create_edit_countries.php">https://jyc24-prod-baff006bca28.herokuapp.com/Project/admin/create_edit_countries.php</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/61">https://github.com/jasoncho111/jyc24-it202-007/pull/61</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/62">https://github.com/jasoncho111/jyc24-it202-007/pull/62</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/70">https://github.com/jasoncho111/jyc24-it202-007/pull/70</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Data List Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot the list page and code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.07.29D3_DataListWithFilters.png.webp?alt=media&token=0898fc1b-1332-47a4-8ad5-970b96dad817"/></td></tr>
<tr><td> <em>Caption:</em> <p>Data list has column from API to indicate whether or not a country<br>is from the API. Many potential filter options are shown. Links to view,<br>edit, and delete are also in the table<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.12.38D3_Limit%20Validation.png.webp?alt=media&token=b0086b51-02dd-4cdc-bb50-0d32d3a6f0dc"/></td></tr>
<tr><td> <em>Caption:</em> <p>Server side validation/flash message on limit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.12.55D3_No%20countries%20found.png.webp?alt=media&token=86aa8a52-3cf4-4680-8af8-ff53dfd8594f"/></td></tr>
<tr><td> <em>Caption:</em> <p>No results available for filter<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explanation</td></tr>
<tr><td> <em>Response:</em> <p>Users must be logged in to access this page (users must be logged<br>in to access anything in the site), but any user can access it<br>if logged in. There is no required role.&nbsp;<br>For view, any user can access<br>it. For edit and delete, the user must be an admin. If the<br>user is not an admin, the edit and delete buttons will not appear.<div><br></div><div>The<br>filter page is shown, which includes a form at the top, and a<br>table at the bottom. The table is generated using render_table, with some small<br>changes that I made (but i don&#39;t remember what those changes were anymore).&nbsp;</div><div><br></div><div>The<br>filters allow you to filter by name and country loosely, since it looks<br>to match &quot;LIKE &#39;%$filter%&#39;&quot;</div><div>you can also sort results in ascending or descending, or<br>choose to omit fake or real countries. You can also choose to include<br>inactive (soft deleted) countries in the result. There is a button at the<br>top of the page &quot;clear filters&quot; which resets all filters to their default<br>values.</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a direct link to this file on Heroku Prod</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jyc24-prod-baff006bca28.herokuapp.com/Project/list_countries.php">https://jyc24-prod-baff006bca28.herokuapp.com/Project/list_countries.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/63">https://github.com/jasoncho111/jyc24-it202-007/pull/63</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/64">https://github.com/jasoncho111/jyc24-it202-007/pull/64</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/65">https://github.com/jasoncho111/jyc24-it202-007/pull/65</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/66">https://github.com/jasoncho111/jyc24-it202-007/pull/66</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/67">https://github.com/jasoncho111/jyc24-it202-007/pull/67</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/68">https://github.com/jasoncho111/jyc24-it202-007/pull/68</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/69">https://github.com/jasoncho111/jyc24-it202-007/pull/69</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> View Details Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of Page and related content/code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.20.07D4_ViewPage.png.webp?alt=media&token=10e481ca-3e6f-4c0e-a5f8-20df383288eb"/></td></tr>
<tr><td> <em>Caption:</em> <p>More detailed view than country list view. Necessary links to delete and edit<br>are present. id=1 in the URL is how data is fetched.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.21.37D4_ViewPage.png.webp?alt=media&token=08171e5b-624e-4ead-b153-c308199ce834"/></td></tr>
<tr><td> <em>Caption:</em> <p>ID does not exist flash message. Attempted to change the id in the<br>URL to an ID that I knew doesn&#39;t exist<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explanation</td></tr>
<tr><td> <em>Response:</em> <p>The entire table was detailed earlier. This view lists all details of the<br>country, as well as all of the languages spoken in the country<div><br></div><div>the edit<br>and delete links on this page are only&nbsp; visible for admin users</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a direct link to this file on Heroku Prod</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jyc24-prod-baff006bca28.herokuapp.com/Project/view_country.php?id=1">https://jyc24-prod-baff006bca28.herokuapp.com/Project/view_country.php?id=1</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/64">https://github.com/jasoncho111/jyc24-it202-007/pull/64</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/65">https://github.com/jasoncho111/jyc24-it202-007/pull/65</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/67">https://github.com/jasoncho111/jyc24-it202-007/pull/67</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/68">https://github.com/jasoncho111/jyc24-it202-007/pull/68</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/69">https://github.com/jasoncho111/jyc24-it202-007/pull/69</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Edit Data Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of Page and related content/code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.29.09D5_Edit%20Data%20Page.png.webp?alt=media&token=56f8a4aa-5116-4ca0-a138-3b403a4e331f"/></td></tr>
<tr><td> <em>Caption:</em> <p>Edit data page- ID seen passed through URL, looks similar to create page.<br>Form is prefilled with existing data. Country ID is shown, but the input<br>field is disabled so it cannot be changed. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.30.16D4_IDNotExist.png.webp?alt=media&token=e42cefd9-a8e5-4918-8c0d-c37bd0c6843f"/></td></tr>
<tr><td> <em>Caption:</em> <p>Same screenshot as for deliverable 4, since same result. Attempt to access page<br>where ID does not exist<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.31.49D5_EditPageFormValidation.png.webp?alt=media&token=184b8bd8-181d-491a-9202-679208eb8d57"/></td></tr>
<tr><td> <em>Caption:</em> <p>Form validation for edit page (matches validation for create page)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a direct link to this file on Heroku Prod</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jyc24-prod-baff006bca28.herokuapp.com/Project/admin/edit_countries.php?id=94&page=4">https://jyc24-prod-baff006bca28.herokuapp.com/Project/admin/edit_countries.php?id=94&page=4</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/70">https://github.com/jasoncho111/jyc24-it202-007/pull/70</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Delete Handling </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshots of related code/evidence</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.33.43D6_DeletionPage.png.webp?alt=media&token=0efa658d-2a82-4b9f-9fda-fc170a3b0d1d"/></td></tr>
<tr><td> <em>Caption:</em> <p>Deletion page, ID passed in URL - only admins can access this page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.35.05D6_DeleteSuccess.png.webp?alt=media&token=32431766-5b80-4a63-945f-8dfa6b7cc6a7"/></td></tr>
<tr><td> <em>Caption:</em> <p>Delete redirects back to previous page (list page), queries are persisted, success message<br>shown<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.35.56D4_IDNotExist.png.webp?alt=media&token=d7330cdc-ae98-43df-845a-c854de76c9d9"/></td></tr>
<tr><td> <em>Caption:</em> <p>Same screenshot as for deliverable 4, since same result. Attempt to access page<br>where ID does not exist<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.37.44D6_DeletionLogic.png.webp?alt=media&token=c222b037-c832-498c-be20-030e735b3842"/></td></tr>
<tr><td> <em>Caption:</em> <p>Deletion logic- handled differently for soft vs full delete<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explanation</td></tr>
<tr><td> <em>Response:</em> <p>Since only admins can create entities or pull from API, it makes sense<br>that only admins can delete entities.<div>The deletion can be either a soft or<br>hard delete. the page has a form which asks the user for the<br>deletion type. For soft delete, just queries the database with an UPDATE query<br>to update the country&#39;s is_active value to 0. for hard delete, uses a<br>DELETE FROM statement to delete all records of that country from CountryLanguages table<br>first, then from the Countries table, since CountryLanguages has a foreign key constraint<br>on the Countries country_name attribute.</div><div><br></div><div>The filter data is persisted by using http_build_query() on<br>the $_GET variable, which is then passed to the delete page URL. the<br>delete page then does the same thing and passes the data back to<br>the list page. on the delete page, after pulling the id from $_GET,<br>it is unset so that it does not get passed back to the<br>list page.</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/67">https://github.com/jasoncho111/jyc24-it202-007/pull/67</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/68">https://github.com/jasoncho111/jyc24-it202-007/pull/68</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/69">https://github.com/jasoncho111/jyc24-it202-007/pull/69</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> API Handling </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshots of Code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.44.12D7_ApiPullPage.png.webp?alt=media&token=19640120-95f5-462d-9664-72fcdfa01cba"/></td></tr>
<tr><td> <em>Caption:</em> <p>Page for fetching data from API<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.44.32D7_ApiPullCode.png.webp?alt=media&token=ddba1cfc-da76-4712-b400-22ee314698d2"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code snippet where fetching from API occurs<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.46.36D7_DuplicateHandling.png.webp?alt=media&token=5516c918-2747-4904-82a0-d3718427aeae"/></td></tr>
<tr><td> <em>Caption:</em> <p>Duplicate Data handling<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.47.54D7_DataMapping.png.webp?alt=media&token=f635a19d-519b-4238-aff3-f702eb2151a7"/></td></tr>
<tr><td> <em>Caption:</em> <p>Data mapping to table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explanation</td></tr>
<tr><td> <em>Response:</em> <p>For the mapping, I pulled some data from the rapidAPI endpoint and just<br>examined its format. I knew what data I needed, so I located it<br>in the rapidAPI response, then just accessed each like it was an array,<br>and stored it into a new record with easier to access array keys<div><br></div><div>API<br>calls are only triggered manually. Since the data for each country I have<br>stored isn&#39;t likely to change frequently, it is unnecessary for there to ever<br>be automatic calls. The manual calls to the API only fetch from the<br>API once, so it does not use up a lot of the request<br>limit</div><div><br></div><div>I plan to make a game where users guess a country based on<br>a set of data -&gt; users can guess the country based on its<br>capital or they can guess based on {currency, population, is_independent}, or something similar<br>to that.</div><div><br></div><div>I may also choose to divert from this idea and have the<br>site serve as a platform for getting quick info about any country</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/71">https://github.com/jasoncho111/jyc24-it202-007/pull/71</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> What issues did you face and overcome during this milestone?</td></tr>
<tr><td> <em>Response:</em> <p>This milestone involved a ton of work. Within one week, I spent 56<br>hours working on this project, which meant pushing aside work for other classes,<br>since I also spend many hours every week working for my internship position.<br>As a result, I have ended up behind in a lot of my<br>classes. No part of this project was exceptionally difficult, but it involved a<br>lot of tedious work and debugging, and a lot of googling things I<br>did not know.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> What did you find the easiest?</td></tr>
<tr><td> <em>Response:</em> <p>I found the view page the easiest to program, since it involved the<br>fewest moving parts. Just do a fetch from the DB and display the<br>data fetched.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> What did you find the hardest?</td></tr>
<tr><td> <em>Response:</em> <p>The hardest part was initially the API handling for me, but that was<br>because I didn&#39;t know how to do anything at all (forms, php, db<br>queries, etc.) I put of the API part until the end, and then<br>it became easier. As such, the true most difficult part for me was<br>the editing page, since editing the language string and having the data save<br>took a lot of thinking on how to do it, and then the<br>programming was a bit of a pain.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Did you have to utilize any unanticipated APIs?</td></tr>
<tr><td> <em>Response:</em> <p>No<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot of your project board</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.56.34D8_ProjectBoard(1).png.webp?alt=media&token=15d7dc26-db3d-4b3d-babc-e5a8b2fcf9e0"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project board (top)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-12-05T03.56.53D8_ProjectBoard(2).png.webp?alt=media&token=2c74c575-b665-4c45-9d51-a042bffa4a31"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project Board (bottom)<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone-2-api-project/grade/jyc24" target="_blank">Grading</a></td></tr></table>