<?php

// ISSUE-1: dead commented out code not deleted
//echo "employee delete";

// ISSUE-2: camelCase function naming rule not followed, name not clear
function employee_delete(){
   
    if(isset($_GET['id'])){
        
        // ISSUE-3: variable name not clear
        global $wpdb;
        
        // ISSUE-4: camelCase variable naming rule not followed
        $table_name=$wpdb->prefix.'employee'; // ISSUE-5: hardcoded string 'employee'

        // ISSUE-6: variable name not clear
        $i=$_GET['id']; // ISSUE-7: hardcoded string 'id'

        $wpdb->delete(
            $table_name,
            array('id'=>$i)
        );
       
    }
   
    // ISSUE-8: function doing much more than one task
    ?>
    <script type="text/javascript">
        alert("Deleted! Go to Employee Listing to view the deletion ");
    </script>
    <?php

}

?>