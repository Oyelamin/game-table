<?php


$connect= mysqli_connect("localhost","root","","games");

$select_names=mysqli_query($connect,"SELECT u.firstname,u.lastname, sum(s.home_player_goal) as 'home player goal',
count(s.home_player) AS 'away player goal' FROM users AS u
JOIN game_sessions AS s
ON u.id=s.home_player
GROUP BY u.firstname");


?>
<!DOCTYPE html>
    <html>
        <head>
            <style type="text/css">
                body{
                    background:silver;
                }
                .table{
                    margin:0px auto;
                   
                    background-color:rgba(255,255,255,0.2);
                 }
                h2{
                    color:darkorange;
                    text-align:center;
                    font-size:36px;
                    margin-bottom:-400px;
                    background:silver;
                    
   
                }   
                
            </style>    
        </head>
        <body>
            <div class="table">
                <h2>
                   
                </h2>
                <table border=10 cellpadding=4 cellspacing=4 style="margin: 0px auto">
                    <tr>    
        
                        <th>
                            Players
                        </th>
                        <th>
                            Played
                        </th>
                        <th>
                            Total Goal For
                        </th>
                        <th>
                            Total Goal Against
                        </th>
                        <th>
                            Point
                        </th>
                    </tr>
                    <?php
                  
                    while($rowed=mysqli_fetch_array($select_names)){
                        echo "<tr><td> ".$rowed[0]." ".$rowed[1]."</td><td> ".$rowed[3]." game</td><td> ".$rowed[2]." goals</td></tr><br/>";
                        // echo "<tr><td> ".$rowed[2]."</td></tr><br/>";
                        
                        
                    }
                  
                    ?>
                </table>
            </div>
            
           
           
            
            
            
        </body>
    </html>