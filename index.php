<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Андрей Кузнецов
 * Date: 03.02.14
 * Time: 16:10
 * To change this template use File | Settings | File Templates.
 */
$items = array(
    'login'=>array(
        'type' => 'text',
        'label' => 'Логин',
        'value' => '',
        'class' => 'item'
    ),
    'password' => array(
        'type' => 'password',
        'label' => 'Пароль',
        'value' => '',
        'class' => 'item'
    )
);


$users['luda']=array(
    'name' => 'Людмила',
    'password'=>'123',
);

$users['aleksandr']=array(
    'name' => 'Александр',
    'password'=>'1234'
);

if(isset($_POST['form1'])){

    foreach($_POST['form1'] as $key=>$val){
        $items[$key]['value'] = $val;
    }

    if(isset($users[$items['login']['value']])){
        if($users[$items['login']['value']]['password']==$items['password']['value']){
            $message = "Добро пожаловать, ".$users[$items['login']['value']]['name']."!" ;
        }else{
            $items['password']['class'].=' error';
            $message = "Неверный пароль!";
        }
    }else{
        $items['login']['class'].=' error';
        $message = "Такой пользователь не зарегистрирован!";
    }
}

?>


<style type="text/css">
    #login_form{
        margin: 200px auto;
        width: 200px
    }
    .item.error{
        background: red;
        color: #FFFFFF;
    }
    .message{
        background-color: #fbb450;
        padding: 10px 20px;
        margin-bottom: 20px;
        box-shadow: 1px 1px 3px #999999;
    }
</style>

<div id="login_form">
    <?php if(!empty($message)):?>
        <div class="message">
            <?php print $message;?>
        </div>
    <?php endif;?>

    <form action="" method="post">

        <?php foreach ($items as $key=>$item):?>
            <div>
                <label for="<?php print $key;?>"><?php print $item['label'];?></label>
                <input class="<?php print $item['class']?>" type="<?php print $item['type'];?>" value="<?php print $item['value']?>" name="form1[<?php print $key;?>]" id="<?php print $key;?>" />
            </div>
        <?php endforeach;?>


        <input type="submit" value="Войти"/>

    </form>
</div>