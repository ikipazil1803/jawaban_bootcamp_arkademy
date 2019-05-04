<?php
$db = mysqli_connect("localhost", "root", "", "homestead");
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "UPDATE candidates SET earned_vote = earned_vote + 1 WHERE id=$id";
    if (mysqli_query($db, $sql)=== true) {
        echo json_encode(array('success' => true));
        exit;
    } else {
        echo json_encode(array('success' => false));
        exit;
    }
    
    mysqli_close($db);
}
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
    $sql = "SELECT * FROM `candidates` ORDER BY `candidates`.`earned_vote` DESC";
    $result = mysqli_query($db, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        $data = [];
    }
    mysqli_close($db);
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>jQuery.post demo</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>
            tr td:last-child {
                width: 200px;
                text-align: center;
            }
            table{
                padding-top:30px;
                margin-top:190px;
            }
            @import url(https://fonts.googleapis.com/css?family=Anonymous+Pro);

/* Global */
html{
  min-height: 100%;
  overflow: hidden;
}
body{
  height: calc(100vh - 8em);
  padding: 4em;
  color: rgba(255,255,255,.75);
  font-family: 'Anonymous Pro', monospace;  
  background-color: rgb(25,25,25);  
}
.line-1{
    position: relative;
    top: 50%;  
    width: 24em;
    margin: 0 auto;
    border-right: 2px solid rgba(255,255,255,.75);
    font-size: 180%;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    transform: translateY(-50%);    
}

/* Animation */
.anim-typewriter{
  animation: typewriter 4s steps(44) 1s 1 normal both,
             blinkTextCursor 500ms steps(44) infinite normal;
}
@keyframes typewriter{
  from{width: 0;}
  to{width: 24em;}
}
@keyframes blinkTextCursor{
  from{border-right-color: rgba(255,255,255,.75);}
  to{border-right-color: transparent;}
}

        </style>
    </head>

    <body style="background-image:url('https://cdn-images-1.medium.com/max/1600/1*OcODYT4IhrThbJLwcLOSPg.jpeg');">
    <p class="line-1 anim-typewriter">My name Is muhammad Zulkifli</p>


         <table class="table table-dark"  border="1">
            <?php
                foreach ($data as $k) {
                    echo "
                    <tr id=".$k["id"].">
                        <td>".$k["name"]."</td>
                        <td rowspan='2'><button type='submit'><i class='material-icons'>add</i></button></td>
                    </tr>
                    <tr>
                        <td id='suara".$k["id"]."'>Perolehan suara: ".$k["earned_vote"]."</td>
                    </tr>
                ";
                }
                
                ?>
        </table>

        <script>
            $("button").click(function(e) {
                e.preventDefault();
                // Get some values from elements on the page:
                var id = $(this).closest('tr').attr('id');
                $.ajax({
                        method: "POST",
                        url: 'suara.php',
                        data: {
                            id: id
                        }
                    })
                    .done(function(data) {
                        var content = $("#suara" + id).html().replace(/[^\d.]/g, '');
                        $("#suara" + id).empty().append("Perolehan suara: " + (parseInt(content) + 1));
                    });
            });
        </script>

    </body>

</html>
