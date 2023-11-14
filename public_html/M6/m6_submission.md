<table><tr><td> <em>Assignment: </em> HW HTML5 Canvas Game</td></tr>
<tr><td> <em>Student: </em> Jason Cho (jyc24)</td></tr>
<tr><td> <em>Generated: </em> 11/14/2023 12:52:51 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/hw-html5-canvas-game/grade/jyc24" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Create a branch for this assignment called&nbsp;<em>M6-HTML5-Canvas</em></li><li>Pick a base HTML5 game from&nbsp;<a href="https://bencentra.com/2017-07-11-basic-html5-canvas-games.html">https://bencentra.com/2017-07-11-basic-html5-canvas-games.html</a></li><li>Create a folder inside public_html called&nbsp;<em>M6</em></li><li>Create an html5.html file in your M6 folder (do not put it in Project even if you're doing arcade)</li><li>Copy one of the base games (from the above link)</li><li>Add/Commit the baseline of the game you'll mod for this assignment&nbsp;<em>(Do this before you start any mods/changes)</em></li><li>Make two significant changes<ol><li>Static changes like hard-coded colors/values will not count at all (i.e., changing shapes/colors/values that are globally defined and set only once.</li><li>Direct copies of my class example changes will not be accepted (i.e., just having an AI player for pong, rotating canvas, or multi-ball unless you make a significant tweak to it)</li><li>Significant changes are things that change with game logic or modify how the game works. Static changes like hard-coded colors/values will not count at all (i.e., changing shapes/colors/values that are globally defined and set only once). You may however change such values through game logic during runtime. (i.e., when points are scored, boundaries are hit, some action occurs, etc)</li></ol></li><li>Evidence/Screenshots<ol><li>As best as you can, gather evidence for your first significant change and fill in the deliverable items below.</li><li>As best as you can, gather evidence for your significant change and fill in the deliverable items below.</li><li>Remember to include your ucid/date as comments in any screenshots that have code</li><li>Ensure your screenshots load and are visible from the md file in step 9</li></ol></li><li>In the M6 folder create a new file called m6_submission.md</li><li>Save your below responses, generate the markdown, and paste the output to this file</li><li>Add/commit/push all related files as necessary</li><li>Merge your pull request once you're satisfied with the .md file and the canvas game mods</li><li>Create a new pull request from dev to prod and merge it</li><li>Locally checkout dev and pull the merged changes from step 12</li></ol><p>Each missed or failed to follow instruction is eligible for -0.25 from the final grade</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Game Info </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> What game did you pick to edit/modify?</td></tr>
<tr><td> <em>Response:</em> <p>I chose to edit the collect the square game<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the direct link to the html5.html file from Heroku Prod (i.e., https://mt85-prod.herokuapp.com/M6/html5.html)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jyc24-prod-baff006bca28.herokuapp.com/M6/html5.html">https://jyc24-prod-baff006bca28.herokuapp.com/M6/html5.html</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the pull request link for this assignment from M6-HTML5-Canvas to dev</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jasoncho111/jyc24-it202-007/pull/46">https://github.com/jasoncho111/jyc24-it202-007/pull/46</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Significant Change #1 </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe your change/modification</td></tr>
<tr><td> <em>Response:</em> <p>My first significant change was instead of one square spawning at a time,<br>I spawn 3 different squares that the player can collect. All three squares&#39;<br>locations are randomly generated, and after a single square is collected, all the<br>previous squares are cleared and 3 new squares are generated.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot of the change while playing (try your best as some changes may be nearly impossible to capture)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-14T05.11.55Major%20Change%201.png.webp?alt=media&token=a2537a08-d4dd-41ad-b6e9-1e61e950a8f0"/></td></tr>
<tr><td> <em>Caption:</em> <p>Collect the squares game. Red square is the player. All other squares are<br>targets to collect.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot of the relevant lines of code that implement your change (make sure your ucid and the date are shown in comments) In the caption briefly describe/explain how the code snippet works.</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-14T05.22.37C1_Variables.png.webp?alt=media&token=f7184263-866d-4b3f-bc3e-8850acb5efa2"/></td></tr>
<tr><td> <em>Caption:</em> <p>Initialization of variables for targets. Instead of just a single targetX and targetY,<br>each is an array which holds the x and y values for 3<br>targets<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-14T05.23.30C1_SpawnTargets.png.webp?alt=media&token=c4f4c9cb-9ec7-401c-b6f4-baed03cd9664"/></td></tr>
<tr><td> <em>Caption:</em> <p>Small change- fixed the square spawning logic so that the squares always spawn<br>inside the canvas zone. <br>Has a for loop to give random x and<br>y values to all 3 targets.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-14T05.25.15C1_TargetCollision.png.webp?alt=media&token=a7444d4f-fc48-4086-84c6-5a8dfabccca3"/></td></tr>
<tr><td> <em>Caption:</em> <p>Since 3 targets, target collision logic also requires for loop<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-14T05.25.56C1_DrawTargets.png.webp?alt=media&token=281f68c8-1355-438f-8e9c-016582166eb4"/></td></tr>
<tr><td> <em>Caption:</em> <p>Drawing logic also requires for loop<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Significant Change #2 </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe your change/modification</td></tr>
<tr><td> <em>Response:</em> <p>each target square spawns with a random color. Either green, light blue, blue,<br>gold, purple, or black. The effect upon collecting a target square is different<br>based on its color.<div>If a black square is collected, you lose 1 point.<br>If a green square is collected, you gain 1 point. If a light<br>blue square is collected, you gain 1 point but move slower. if a<br>purple square is collected, you gain 1 point and move faster. if a<br>blue square is collected, you gain 2 points. if a gold square is<br>collected, you gain 5 points and gain 5 seconds extra time.</div><div><br></div><div>The probability of<br>each square spawning as a specific color is approximately as follows:</div><div>gold: 10%</div><div>all other<br>colors: 18%</div><div><br></div><div>i single spawn of 3 squares can have multiple of the same<br>color present, however there can only be at most 1 gold square per<br>spawn.</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot of the change while playing (try your best as some changes may be nearly impossible to capture)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-14T05.38.37Major%20Change%201.png.webp?alt=media&token=9aba85cb-d81a-419b-85fd-fc4cc1b77c1a"/></td></tr>
<tr><td> <em>Caption:</em> <p>3 different colored target squares, gold included. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot of the relevant lines of code that implement your change (make sure your ucid and the date are shown in comments) In the caption briefly describe/explain how the code snippet works.</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-14T05.39.08C1_Variables.png.webp?alt=media&token=b076fc5c-eb38-47d8-9456-f094b2aeaeca"/></td></tr>
<tr><td> <em>Caption:</em> <p>currColor array is the color for each target square. targetColors array holds all<br>possible colors of target squares except gold, which is handled separately<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-14T05.39.35C1_SpawnTargets.png.webp?alt=media&token=bba3f52c-ad29-4848-94b9-cf61a11755d5"/></td></tr>
<tr><td> <em>Caption:</em> <p>in the for loop, randomly choose an element out of the targetColors array<br>and assign it as a currColor for each target<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-14T05.41.22C1_TargetCollision.png.webp?alt=media&token=5a19da51-fd03-4a72-a3d8-9b1262a03fe6"/></td></tr>
<tr><td> <em>Caption:</em> <p>collision logic checks for the current color for the square collected. Has if/else<br>if statements to handle the <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fjyc24%2F2023-11-14T05.51.43C1_DrawTargets.png.webp?alt=media&token=788c49b0-d6b0-4de8-b13e-82f1052fb9a1"/></td></tr>
<tr><td> <em>Caption:</em> <p>Logic to fill the rectangles with the correct color<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Discuss </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Talk about what you learned during this assignment and the related HTML5 Canvas readings (at least a few sentences for full credit)</td></tr>
<tr><td> <em>Response:</em> <p>I learned about how the draw loop works for these canvas elements. I<br>attempted to have the randomization of the color of the squares inside the<br>draw loop initially, not realizing that even though the squares dont move constantly,<br>the draw loop was repeatedly being called.&nbsp;<br></p><br></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/hw-html5-canvas-game/grade/jyc24" target="_blank">Grading</a></td></tr></table>