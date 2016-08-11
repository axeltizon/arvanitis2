<?php
/*
 * @brief
 * In general this can be used to find and replace strings in the database.
 * For wordpress purpose, this is used to migrate the database into a new domain.
 * This takes into consideration serialized values.
 * 
 * @usage
 * 1. Change the connection settings as well as the strings to be searched and replace.
 * 2. Place this file in your <project's root directory>/db folder
 * 3. Open in your broswer the <domain>/db/db-update.php
 * 
 * @author: Anna Lou Parejo <aparejo@tbelle.com>
 * @modified: Vanessa Richie Alia-Trapero <valia@tbelle.com>
 */

/* =========== CONNECTION SETTINGS =========== */
$hostname = "localhost";
$username = "root";
$password = "root";
$database = "redesign";

/* =========== THE CULPRIT =========== */
$old = "dev4.tbelle.com";
$new = "redesign";

/* ============== THE WORKS ============== */
echo "<br>We are searching for: $old";
echo "<br>And replacing it to: $new";
echo "<br>With connection details: host=$hostname, username=$username, password=$password, db=$database";

$conn = mysqli_connect($servername, $username, $password);

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

echo "<br>Connected successfully.";

echo "<br>==== Looking for the serialized ones. ====";
db_replace($conn, $database, 's:' . strlen($old) .':"' . $old . '"', 's:' . strlen($new) .':"' . $new . '"');

echo "<br>==== Now unto the regular texts. ====";
db_replace($conn, $database, $old, $new);

function db_replace ($conn, $database, $old, $new) {
    
    $sql = "SELECT
                concat('UPDATE ',table_schema,'.',table_name, ' SET ',column_name, '=replace(',column_name,', ''{$old}'', ''{$new}'');') AS db_column
            FROM
                information_schema.columns
            WHERE
                table_schema = '{$database}'";

    $result = $conn->query( $sql );

    if ($result->num_rows > 0) {
        
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            $conn->query($row["db_column"]);
            
            if($conn->affected_rows > 0) {
                echo "<br>Query run: ", $row["db_column"];
                echo "<br>Affected rows : ". $conn->affected_rows;
            }
        }
        
        echo "<br>Data is updated successfully!!!";
    } 
    else 
    {
        echo "<br>0 results...";
    }

}

$conn->close();
