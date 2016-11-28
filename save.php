<?php

if (isset($_POST['save'])){
  include('config.php');

  echo
    '<script type="text/javascript">
      $(document).ready(function(argument) {
        $("#save").click(function(){
          $edit = $("#offer").html();
          $.ajax({
            url: "save.php",
            type: "post",
            data: {data: $edit},
            datatype: "html",
            success: function(rsp){
              alert(rsp);
            }
          });
        });
      });
    </script>';
}

?>
