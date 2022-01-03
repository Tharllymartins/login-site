<?php 
    include('connection.php');
    include('functions.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

</head>
<body>



    <table>
        <tr>
            <th>
                Imagem
            </th>
            <th>
                Nome
            </th>
        </tr>
        <?php
            $result = get_all_movies($con);
            if($result){
                while($row = mysqli_fetch_array($result)) {
                echo "<tr>                
                    <td>
                        <img width='100px' src='media/movies/$row[image]' alt='$row[image]'>
                    </td>

                    <td>
                        $row[name]
                    </td>
                </tr>";
                }
            }
        ?>
    </table>


    
</body>
</html>