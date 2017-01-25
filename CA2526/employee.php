<!DOCTYPE html> 
<html>
    <?php
    $insertResult = "";
    $selectResult = "";
    //12. create a connection to the database
   $mysqli = new mysqli("127.0.0.1", "cs2610activity", "owl125", "cs2610activity");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";
    
    //13. Add an if statement that asks if there was an error when making 
    //    the connection. When the connection does not work, display a message
    //    that includes the error number and name.

    
    //14. Test the above code by using correct and incorrect values in the 
    //    connect statement. Reload your page to see it when there is an 
    //    error, make corrections and see it when there is not an error.
                       
    
    
    if(isset($_POST['addEmployee'])){
    //gather information from web page
        $first = $_POST['firstName'];
        $last = $_POST['lastName'];
        $dependents = $_POST['dependents'];
        $wage = $_POST['wageRate'];
    
    //run input through htmlentities
        $first = htmlentities($first);
        $last = htmlentities($last);
        $dependents = htmlentities($dependents);
        $wage = htmlentities($wage);
                
    //16. Process all 4 values through mysqli real_escape_string mehtod
    //    Use the object oriented method
        $first = $mysqli->real_escape_string($first);
        $last = $mysqli->real_escape_string($last);
        $dependents = $mysqli->real_escape_string($dependents);
        $wage = $mysqli->real_escape_string($wage);
        
   
    //17. Call the mysqli query method with the INSERT statement. Store the 
    //    result of the query in a variable. 
    //      a. Use the input statement exactly as you copied it from phpMyAdmin
    //      b. Change the query so that it uses the cleaned values input by the 
    //         user. Do not do this until 17a and 18 are working correctly.
        $result = $mysqli->query("INSERT INTO employee(first, last, dependents, wageRate) VALUES ('$first', '$last', $dependents, $wage)");
        
    //18. Using the result of your query, set the value of $insertResult to 
    //    a message about whether the employee was added or not. This messae
    //    will be displayed by the submit button
         if($result)
         {
             $insertResult = "The employee as added";
             
         }
         else
         {
             $insertResult = "The employee was NOT added";           
         }
    }
    ?>
    <head  lang="en">
        <meta charset="UTF-8">
        <title>Employee</title>
        <link rel="stylesheet" type="text/css" href="styleEmployee.css">
    </head>
    <body>
        <form action="<?php echo htmlentities($_SERVER['SCRIPT_NAME']) ?>" method="post" enctype="application/x-www-form-urlencoded" name="" > 
            <p><label for="firstName">First Name: </label><input type="text" name="firstName" id="firstName"/></p>
            <p><label for="lastName">Last Name: </label><input type="text" name="lastName" id="lastName"/></p>
            <p><label for="dependents">Dependents: </label><input type="text" name="dependents" id="dependents"/></p>
            <p><label for="wageRate">Hourly Wage: </label><input type="text" name="wageRate" id="wageRate"/></p>
            <p><input type="submit" value="Add Employee" name="addEmployee" /><span><?php echo $insertResult ?></span></p>            
        </form>
        
        <h1>Employees</h1>
        <!-- Display table of employee information -->
        <table>
            <tr><th class="name">Name</th><th class="dependents">Dependents</th><th class="wage">Wage Rate</th></tr>
            <?php
            //20. Write a SELECT query that returns all the data for all the 
            //    employees. Have the data be in order by last name. Store the 
            //    result of the query in a variable.
            
              $result = $mysqli->query("SELECT * FROM  `employee` ORDER BY last");
            //21. Write an if statement that tests the result of the SELECT 
            //    query to see if it is false. If it is false, set 
            //    $selectResult to an error message.
            if(!$result)
            {
                  $selectResult = "Did not return all the data";
                
            }
            //22. Write a while loop that loops through the result object and 
            //    prints out an HTML table row for each row in the result 
            //    object. Put the contents of the row in td elements. Notice 
            //    how the first and last name will be together in the first
            //    cell.
           
            while ($row=$result->fetch_assoc()){
               
                echo "<tr><td>  $row[first] $row[last]</td><td> $row[dependents] </td><td> $row[wageRate]</td></tr>";
            }
            ?>
        </table>
        <p><?php echo $selectResult ?></p>
    </body>
</html>
