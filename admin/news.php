<fieldset>
    <legend>
    文章管理
    </legend>
    <form action="api/admin_news.php" method="POST">
    <table class="ct "  style="width: 100%; margin:auto">
        <tr class="ct clo">
            <td>編號</td>
            <td>標題</td>
            <td>顯示</td>
            <td>刪除</td>
        </tr>
        <?php
        $db=new DB("news");
        $rows=$db->all();
        foreach($rows as $row){
        $checked=($row['sh']==1)?"checked":"";
        
        $total=$db->count();
        $div=5;
        $pages=ceil($total/$div);
        $now=(!empty($_GET['p']))?$_GET['p']:1;
        $start=($now-1)*$div;

        ?>
        <tr class="ct">
            <td> <?= $row['id']?></td>
            <td> <?= $row['title']?></td>
            <td><input type="checkbox" name="sh[]" value="<?= $row['id']?>" <?=$checked?>  ></td>
            <td><input type="checkbox" name="del[]" value="<?= $row['id']?>"></td>
        </tr>
<?php 
 }
?>
    </table>
    <?php
   if(($now-1)>0){
    echo "<a href='?do=news&p=".($now-1)."' > < </a>";
}

for($i=1;$i<=$pages;$i++){
    $fontSize=($i==$now)?"24px":"18px;";
    echo "<a href='?do=news&p=$i' style='font-size:$fontSize'> $i </a>";
}

if(($now+1)<=$pages){
    echo "<a href='?do=news&p=".($now+1)."' > > </a>";
}

?> 

    ?>


    <div class="ct">
    <input type="submit" value="確定修改">
    </div>
    </form>