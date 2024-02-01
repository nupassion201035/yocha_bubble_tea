
# Welcome to yocha tea project 


## create a new repository on the command line

echo "# yocha_bubble_tea" >> README.md <br>
git init <br>
git add README.md <br>
git commit -m "first commit" <br>
git branch -M main <br>
git remote add origin https://github.com/nupassion201035/yocha_bubble_tea.git <br>
git push -u origin main .<br>


## push an existing repository from the command line

git remote add origin https://github.com/nupassion201035/yocha_bubble_tea.git <br>
git branch -M main <br>
git push -u origin main <br>


https: https://github.com/nupassion201035/yocha_bubble_tea.git <br>

## Structure project 

/assets : any css,js,img file <br>
/employee  : any page in role employee <br>
connection.php : file connect to dedicate database  <br>
index.php : fist page viewers can see in our project <br>
login_p.php : get data from index page and check user with database and response <br>
navbar.php : function navbar for viewers easy for reuse <br>