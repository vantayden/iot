<div style="text-align:center">
    <h2>Hệ thống điều khiển thiết bị qua Internet</h2>
    <hr/>
</div>
<!---->
<!---->
<div>
    <div class="row">
        <table width="30%" align="center">

            <input type="text" id="device_id" hidden name="device_id" value="<?php echo $device_id; ?>">
            <tr>
                <?php
                $index = 1;
                foreach ($status_device as $key => $value) {
                    echo ' <td align="center" valign="middle">
                   ';

                    if ($value == 1) {
                        echo '<button  id ="led'.$index.'"  name="btnLED' . $index . '" class="btn btn-lg btn-info" style="margin-right:15px" >LED ' . $index . ' </button>';
                    } else {
                        echo '<button  id ="led'.$index.'" name="btnLED' . $index . '" class="btn btn-lg btn-danger" style="margin-right:15px">LED ' . $index . ' </button>';
                    }
                    echo '
                </td>';

                    $index++;
                }
                ?>
            </tr>
        </table>
    </div>
</div>
<!---->

<div style="text-align:center">

    <hr/>
</div>

</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">-->

<script language="javascript" src="js/bootstrap.min.js"></script>
<script>

    $(".btn").click(function(){

        var id = this.id;


        $.ajax({
            url : "fix_status",
            type : "post",
            dateType:"text",
            data : {

                name : id,
                device_id : $('#device_id').val()
            },
            success : function (result){
                console.log(result);
                if(result == 0) {
                    $("#"+id).removeClass('btn-info')
                    $("#"+id).addClass('btn-danger')
                }else {
                    $("#"+id).removeClass('btn-danger')
                    $("#"+id).addClass('btn-info')
                }
            }
        });

    });



</script>
