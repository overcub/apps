<section class="glc-login">
<div class="container">
    <div class="row-fluid" style="text-align: center;">
        <div class="span3 glc-bl-center">
            <h1 class="text-center login-title">Se logue e continue no Stream</h1>
            <div class="account-wall">
                <img class="img-circle" src="/images/style/icon/profile.png" alt="Perfil" />
                <?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'login-form',
					'htmlOptions' => array('class'=>'form-signin'),
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); ?>
	                <input id="LoginForm_username" name="LoginForm[username]" type="text" class="form-control" placeholder="Email" required autofocus>
	                <?php echo $form->error($model,'username'); ?>
	                <input id="LoginForm_password" name="LoginForm[password]" type="password" class="form-control" placeholder="Password" required>
	                <?php echo $form->error($model,'password'); ?>
	                <button class="btn btn-lg btn-primary btn-block" type="submit">login</button>
                <?php $this->endWidget(); ?>
            </div>
            <a href="/cadastro" class="text-center new-account">Crie sua conta</a>
        </div>
    </div>
</div>
</section>
<style type="text/css">
.glc-login .form-signin{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
#glc-doc .container .row-fluid .glc-bl-center {
    float: none;
    margin: 0 auto;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
#glc-doc .form-signin input{
	width: 100%;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}

.new-account
{
    display: block;
    margin-top: 10px;
}	

</style>