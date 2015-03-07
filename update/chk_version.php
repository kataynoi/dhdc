<script src="jquery.js"></script>
<script>
    $(function () {
        //alert();
    });
   
</script>
<table border="1">
     <tr>
        <td>code</td>
        <td>frontend,backend,database
        </td>
    </tr>
    <tr>
        <td>Current:</td>
        <td><?php
            echo file_get_contents("../version/version.txt");
            ?>
        </td>
    </tr>
    <tr>
        <td>New:</td>
        <td><?php
            echo file_get_contents("http://utehn.plkhealth.go.th/dhdc/version/version.txt");
            ?>
        </td>
    </tr>
</table> 
<br>
<button id="update">
    Update
</button>
<div id="res" style="display: none">
    <img src="updating.gif">
</div>
<script>
    function update(){
         $.ajax({
            url: "update.php",
            success: function () {
                 $('#res').toggle();
                alert(' สำเร็จ');
            }
        });
    }
     $('#update').on('click', function () {
         $('#res').toggle();
        $.ajax({
            url: "download.php",
            success: function (data) {
                update();
            }
        });
    });
</script>





