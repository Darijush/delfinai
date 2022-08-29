<?php
    require_once DIR.'classes/Account.php';
    require_once DIR.'classes/Iban.php';
    $acc = $_POST['withdrawMoney'];
        $data = Account::dataDecode();
        $user = Iban::getRecordByIban($acc);
        // [{"id":"38209020541","name":"Darijus","surname":"Prokopovic","IBAN":"LT554943755196396177","balance":0}]
    view('top');
    view('header');?>
    <section class='container' >
        <div class='col-8' style='padding-top: 100px'>
            <h3>Withdraw assets from client account</h3>
        </div>
    </section>
    <form class='container' method='POST' action ='client'>
        <div class='form-group col-md-6'>
            <label for='iban'>
                <h5>Name</h5>
            </label>
            <input type='text' class='form-control' id='iban' value='<?= $user['name']?>' readonly name='IBAN' autocomplete='off'>
        </div>
        <div class='form-group col-md-6'>
            <label for='iban'>
                <h5>Surame</h5>
            </label>
            <input type='text' class='form-control' id='iban' value='<?= $user['surname']?>' readonly name='IBAN' autocomplete='off'>
        </div>
        <div class='form-group col-md-6'>
            <label for='ClientId' class='labelComment'>
                <h5>Account balance</h5>
            </label>
            <input type='text' class='form-control' name='balance' value='<?= $user['balance']?>' readonly autocomplete='off'>
        </div>
        <div class='form-group col-md-6'>
            <label for='ClientId' class='labelComment'>
                <h5>Withdraw assets amount</h5>
                <p>Only digits and '.' for decimal value</p>
            </label>
            <input type='text' class='form-control' id='ClientId' placeholder='Enter amount of assets to add' autocomplete='off' name='withdrawAsset'>
        </div>
        <div class='form-group col-md-6'>
            <button type='submit' class=' btn btn-primary ' style='margin: 70px 20px 0px 20px' name='confirm' value='1'>WITHDRAW</button>
            <button type='submit' class=' btn btn-warning ' style='margin: 70px 20px 0px 20px' name='confirm' value='0'>CANCEL</button>

        </div>
    </form>
    <?php
    view('bottom')?>