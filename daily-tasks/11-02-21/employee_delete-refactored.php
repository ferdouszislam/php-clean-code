<?php

// ISSUE-1 fix:
// removed dead commented out code

// ISSUE-5, 7 fix: 
// store hardcoded string values inside constant variables
define("ID_PARAM", "id");
define("EMPLOYEE_TABLE", "employee");


// ISSUE-2: fix
// function renamed with meaningful and camelCased name 
function deleteEmployee() : array
{
    if(! isset($_GET[ID_PARAM])){
        
        return [
            'message' => 'failed to delete employee. no employee id provided', 
            'status' => false
        ];
    }

    // ISSUE-3, 4, 6 fix:
    // variables renamed following camelCase and meaningful naming
    global $wordpressDatabase;    
    $employeeId = $_GET[ID_PARAM];
    $employeesTable=$wordpressDatabase->prefix.EMPLOYEE_TABLE;

    $wordpressDatabase->delete($employeesTable, array(ID_PARAM => $employeeId));
   
    // ISSUE-8 fix: 
    // the javascript alert can now be handled by the front end based on the 'status' returned by this function
    return [
        'message' => 'employee deleted successfully', 
        'status' => false
    ];
}

?>