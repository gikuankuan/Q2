<fieldset>
    <legend>
        帳號管理
    </legend>
    <form action="api/admin_acc.php" method="POST">
    <table class="ct "  style="width: 50%; margin:auto">
        <tr class="ct clo">
            <td>帳號</td>
            <td>密碼</td>
            <td>刪除</td>
        </tr>
        <?php
        $db=new DB("user");
        $rows=$db->all();
        foreach($rows as $row){
            if($row['acc']!='admin'){
        ?>
        <tr class="ct">
            <td> <?= $row['acc']?></td>
            <td> <?= $row['pw']?></td>
            <td><input type="checkbox" name="del[]" value="<?= $row['id']?>">
                <input type="hidden" name="id[]" value="<?= $row['id']?>"> 
        
        </td>
        </tr>
<?php 
 }}
?>
    </table>
    <div class="ct">
    <input type="submit" value="確定刪除">
    <input type="reset" value="清空選取">
    </div>
    </form>
    <div style="margin:auto;padding:10px;width:55%">
        <h3 class="ct">
            新增會員
        </h3>
        <form>
<table class="cent">
    <tr>
        <td colspan="2" style="color:red;">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
    </tr>

    <tr>
        <td width="55%" class="clo">
            step1:登入帳號
        </td>
        <td width="45%"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="clo">
        step2:登入密碼
        </td>
        <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="clo">
        step3:再次確認密碼
        </td>
        <td><input type="password" name="pw2" id="pw2"></td>
    </tr>
    <tr>
        <td class="clo">
        step4:信箱(忘記密碼時使用)
        </td>
        <td><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
        <td><input type="button" value="註冊" onclick="reg()" ><input type="reset" value="清除"></td>
        <td> <a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a></td>
    </tr>
</table>
</form>
</div>
<script>
    function reg(){
        //let acc=document.querySelector("#acc")
        let acc=$("#acc").val();
        let pw=$("#pw").val();
        let pw2=$("#pw2").val();
        let email=$("#email").val();

        if(acc=="" || pw=="" ||pw2==""||email==""){
            alert("帳號密碼不可為空白")
        }else{
           if(pw==pw2){
                $.get("api/chk_acc.php",{acc},function(res){
                    if(res==='1'){
                        alert("帳號重複")
                    }else{
                        $.post("api/reg.php",{acc,pw,email},function(res){
                            if(res==='1'){
                                alert("註冊完成，歡迎加入")
                                location.reload();
                            }else{
                                alert("註冊失敗，請聯繫管理員")
                            }
                        })
                    }
                })
           }else{
               alert("密碼錯誤")
           }
        }
    }



</script>




</fieldset>