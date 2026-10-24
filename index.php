<?php

$ch = curl_init("https://jsonplaceholder.typicode.com/users");

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch); //it has been deprecated in PHP 8.5

// $data = json_decode($response); //by this, we'll get an json decoded array as objects 
$data = json_decode($response, true); //by passing true in this, we'll get an json decoded array as associative arrays instead of previous object

// var_dump($data);

// foreach($data as $repository){
//     echo "<br>";
//     echo $repository["full_name"]. " <br>",
//     $repository["name"]." <br>",
//     $repository["description"]; 
//     echo "<br>";
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example Rest API Client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
    <main>
        <h1>Repositories</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $repository) { ?>
                    <tr>
                        <td>
                            <a href="show.php?full_name=<?= $repository["full_name"]; ?>">
                                <?= $repository["name"]; ?>
                            </a>
                        </td>
                        <td><?php echo htmlspecialchars($repository["description"] ?? "Empty"); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>