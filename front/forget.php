<fieldset style="margin:auto;padding:10px;width:50%">
    <legend>忘記密碼</legend>
<table class="ct" style="width: 100%;">
    <tr>
        
        <td width="100%">
            <input type="text" name="email" id="email">
        </td>
    </tr>
    <tr>
        <td id="result">
        </td>
    </tr>
    <tr>
        <td>
            <input type="button" value="尋找" onclick="findpw()">
        </td>
    </tr>

</table>
</fieldset>
<script>
    function findpw(){
        //let acc=document.querySelector("#acc")
        let email=$("#email").val();
        if(email==""){
            alert("欄位不可空白")
        }else{
            $.get("api/find_pw.php",{email},function(res){
               $("#result").html(res)
            })
        }
    }



</script>