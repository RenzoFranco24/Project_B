<!doctype html>
<?php
  $color = isset($_GET['color']) ? $_GET['color'] : 'red';

  $bg_color = isset($_GET['bg']) && $_GET['bg'] ? htmlspecialchars($_GET['bg']) : 'red';
 
$text = isset($_GET['text']) && $_GET['text'] ? htmlspecialchars($_GET['text']) : 'white';
$sort_order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'desc' : 'asc';
$sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'id';


?>
  <html>
   <head>
       <title>Emma's Marvel Blog</title>
       <link rel="stylesheet" href="emmas_website_colors.css">
   </head>
   <body>
    <h1>
        Welcome to Emma's Beautiful Marvel Blog!
    </h1>
<h2>
 Here we discuss all the happenings of Marvel, including filming, spoilers, and more! 
</h2>
<?php
echo "<p style='color: white;'>Today is: " . date('m-d-Y') . ". The time is: " . date('h:i') . ".</p>";
?>

<p>
   A New Era for Daredevil... </p>
<p>So, if you aren't too much of a Marvel fan, you might not totally understand what I'm talking about.  However, there have been some set photos of the new Daredevil TV show, which will be on Disney +, called Daredevil: Born Again. It's been awhile since we've seen anything from set, because of the writer's strike. Interestingly enough, the writer's strike also pushed the creators and writers of the show to do a rewrite and make it more like it's predecessor, Daredevil, which was a Netflix (in association with Marvel) original TV show. The producers/higher level people who worked with the show seemed to believe that the fans only cared about Charlie Cox, who plays the titular character, Matthew Murdock (AKA Daredevil) and Vincent D'Onofrio, who plays Wilson Fisk (AKA Kingpin). <br></br> However, this is very much so not the case. Both Do'Onfrio and Cox have reprised their roles in recent Marvel TV shows and movies, aand even though fans have enjoyed these portrayals, they miss the atmosphere of the Daredevil TV show, as well as the supporting characters, such as Karen Page, played by Deborah Ann Woll, and Foggy Nelson, played by Elden Henson.

A recent spoiler/leak that came out was that the TV show was supposed to start off the show with both Foggy and Karen already deceased, but this caused a lot of uproar in the Marvel/Daredevil fanbase. Many fans believed that Karen and Foggy are very important to the story, and without them, the feeling that the Daredevil TV show had wouldn't be the same. I definitely agree with this, because they helped add humor to the show, that it wouldn't have without them. As mentioned before, it seemed that the writers/directors/producers though that fans only cared about Charlie Cox and Vincent D'Onofrio. They care about the substance of the show, and how well it is written. It is important to keep the same feel and atmosphere of the previous show, but to also introduce new themes and characters. The writers seemed to listen to the fans, and rewrote the show to better reflect fans' expectations. It was also revealed that the same stunt coordinator for the original TV show was going to come back for the new show, which is very exciting because the fight scenes in Daredevil were really good! They also brought back other crew members, which is very important, so it has the same feel but is fresh and new.

Overall, I think the show will turn out great as long as the writers and directors listen to the fans and respect their wishes and expectations. Scroll down after the photos to see my tier list for Daredevil characters and expectations for the show. <br></br> You can find the link to the set photos <a href = "https://www.reddit.com/r/marvelstudios/comments/1ac9qi4/new_hq_daredevil_born_again_set_pics/">here. </a></p>
<img style='border: 3px solid #660033' img src = "https://preview.redd.it/new-hq-daredevil-born-again-set-pics-v0-xs7u1gt67zec1.jpg?width=1080&crop=smart&auto=webp&s=aee671772af9d9758d4f351a9993c2ce3d6e71ae" alt="Charlie Cox as Matt Murdock.">
<img style='border: 3px solid #660033' img src = "https://preview.redd.it/new-hq-daredevil-born-again-set-pics-v0-hr54e3677zec1.jpg?width=1080&crop=smart&auto=webp&s=d92646666955bd1e53d814c5668c1364b1efc3f8" alt="Charlie Cox as Matt Murdock>">

<p>
Great, you scrolled down! You must (somewhat) care about my opinion! <br></br>
This is my tier list of Daredevil characters... might be a hot take. </p>
<?php
$items = ["Matt Murdock", "Frank Castle", "Benjamin Poindexter", "Foggy Nelson", "Ray Nadeem", "Karen Page"];

echo '<ol style="color: white;">';
foreach ($items as $item) {
    echo "<li>" . $item . "</li>"; 
}
echo "</ol>";
?>

<p> Here are my expectations... (and/or wants) </p>

<?php

function printList($items) {
    echo '<ul style="color: white; list-style-type: square;">';
    foreach ($items as $item) {
        echo "<li>" . $item . "</li>";
    }
echo "</ul>";
}
$plotPoints = [
    "Kingpin becomes the mayor - see what happens and how that impacts Karen, Foggy, and Matt.",
    "Matt Dripdock (iykyk).",
    "Have it tie into Spider-Man, since Kingpin is a villain of his.",
    "Have White Tiger in it as Daredevil's new foe.",
    "Have it be up to 13 episodes rather than the 18 they were planning for."
];
printList($plotPoints);
?>
<p>Here are some stats about various Marvel characters!</p>
<?php
include "credentials.php";
$connection = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed." . mysqli_connect_error();
    exit();
}

$sql = "SELECT id, firstname, lastname, age, strength, speed, year_released FROM marvel_characters ORDER BY $sort_column $sort_order";
$result = $connection->query($sql);

if ($result) {
    echo "<table border='1' style='background-color:{$bg_color}; color:{$text};'><tr>";
        echo "<th><a href='?sort=id&order=$sort_order'>ID</a></th>";
        echo "<th><a href='?sort=firstname&order=$sort_order'>Firstname</a></th>";
        echo "<th><a href='?sort=lastname&order=$sort_order'>Lastname</a></th>";
        echo "<th><a href='?sort=age&order=$sort_order'>Age</a></th>";
        echo "<th><a href='?sort=strength&order=$sort_order'>Strength</a></th>";
        echo "<th><a href='?sort=speed&order=$sort_order'>Speed</a></th>";
        echo "<th><a href='?sort=year_released&order=$sort_order'>Year Released</a></th>";
        echo "</tr>";    


    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['strength']) . "</td>";
        echo "<td>" . htmlspecialchars($row['speed']) . "</td>";
        echo "<td>" . htmlspecialchars($row['year_released']) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>


<img src = "https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/daf86b9d-0a99-4ec1-af43-2061b31977f8/dfhok4m-a84abe75-a321-4b04-98a8-65f046d9bdc7.gif?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2RhZjg2YjlkLTBhOTktNGVjMS1hZjQzLTIwNjFiMzE5NzdmOFwvZGZob2s0bS1hODRhYmU3NS1hMzIxLTRiMDQtOThhOC02NWYwNDZkOWJkYzcuZ2lmIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.uP-1e863lVPQUQo9SCfJcYsn4dM8-0k9zSsdVnpneO8">
<h2>Kingpin loves the Mets</h2>
<iframe width="420" height = "315"
src="https://www.youtube.com/embed/8laEleUOoUM">
</iframe>
</body>
 </html>
