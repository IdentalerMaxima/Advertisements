<?php
// DB methods
function connectDB()
{

    // There has to be a db called rabit_users with 2 tables, i did this in phpmyadmin
    // Table 1 called users has (id, name)
    // Table 2 called advertisements has (id, userid, title)
    
    // Credentials
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "mysql";
    $db = "rabit_users";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Succesfull connection! <br>";

    return $conn;
}

function disconnectDB($conn)
{
    $conn->close();
    //echo "Succesfull disconnection!";
}

function getUsers(){

    // This method returns a table filled with the usernames present in the db

    $conn = connectDB();
    $sql = "SELECT id, name FROM users";
    $result = mysqli_query($conn, $sql);

    $table = '
<main>
    <div class="container">
        <h1>User list</h1>
            <table>
                <thead> 
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        $table .= " <tr>
                        <td>{$row['name']}</td>
                    </tr>";
    }

    $table .= '
                </tbody>
            </table>
    </div>
</main>';


    disconnectDB($conn);

    return $table;
}

function getAds(){

    // This method returns a table with the usernames and the titles of the ads in the db

    $conn = connectDB();
    $sql = "SELECT users.name, advertisements.title
            FROM Users
            JOIN Advertisements
            ON Users.id = Advertisements.userid";

    $result = mysqli_query($conn, $sql);

    $table = '
<main>
    <div class="container">
        <h1>Ad list</h1>
            <table>
                <thead> 
                    <tr>
                        <th>Name</th>
                        <th>Ad</th>
                    </tr>
                </thead>
                <tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        $table .= " <tr>
                        <td>{$row['name']}</td>
                        <td>{$row['title']}</td>
                    </tr>";
    }

    $table .= '
                </tbody>
            </table>
    </div>
</main>';


    disconnectDB($conn);

    return $table;
}

//tests
// function addPeldaPeter($conn){
//     $name = "Példa Péter";
//     $sql = "INSERT INTO users (name) VALUES ('$name')";

//     // Execute the SQL statement
//     if (mysqli_query($conn, $sql)) {
//         echo "New record created successfully <br>";
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }
// }

// function testPeldaPeter($conn){
//     //Test sql statement
//     $sql = "SELECT id, name FROM users";
//     $result = mysqli_query($conn, $sql);

//     // Fetch the data
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "id: " . $row["id"] . " - username: " . $row["name"] . "<br>";
//     }
// }

// function addRandomAd($conn){

//     $name = "Példa Péter";
//     $ad = "Random Ad";

//     $sql = "INSERT INTO users (name, ad) VALUES ('$name', '$ad')";

//     // Execute the SQL statement
//     if (mysqli_query($conn, $sql)) {
//         echo "New record created successfully <br>";
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }
// }

