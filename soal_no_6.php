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

        <style>
            tr td:last-child {
                width: 200px;
                text-align: center;
            }
        </style>
    </head>

    <body>

        <table border="1">
            <?php
                foreach ($data as $k) {
                    echo "
                    <tr id=".$k["id"].">
                        <td>".$k["name"]."</td>
                        <td rowspan='2'><button type='submit'>+</button></td>
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
