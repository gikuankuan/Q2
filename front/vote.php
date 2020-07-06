<?php
    $q=$_GET['q'];
    $db=new DB('que');
    $subject=$db->find($q);
    $options=$db->all(['parent'=>$q]);

?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$subject['text'];?></legend>
    <h3><?=$subject['text'];?></h3>
    <table>
    <?php

        foreach($options as $key => $row){
    ?>
        <tr>
            <td width="50%"><?=$key+1;?>. <?=$row['text'];?></td>
            <td width="50%"><div class="bar" style="width:<?=(70*$rate);?>"></div><?=$row['count'];?>票(<?=$rate*100;?>%)</td>

        </tr>
        <?php
        }
        ?>
    </table>
<div class="ct"><button onclick="location.href='?do=que'">我要投票</button></div>
</fieldset>