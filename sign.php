
<link href="css/sign1.css" rel="stylesheet">
<div class="cont_principal">

  <div class="cont_centrar">
  <div class="cont_login">
    <form method="post" action="dosign.php">
    <div class="cont_tabs_login">
      <ul class='ul_tabs'>
        <li class="active"><a href="#" onclick="sign_in()">SIGN IN</a>
        <span class="linea_bajo_nom"></span>
        </li>
        <li><a href="#up" onclick="sign_up()">SIGN UP</a><span class="linea_bajo_nom"></span>
        </li>
      </ul>
      </div>
  <div class="cont_text_inputs">
      <input  type="text" class="input_form_sign " placeholder="NAME" name="name_us" />
      
    <input  type="text" class="input_form_sign d_block active_inp" placeholder="EMAIL" name="emauil_us" />

    <input minlength="8"  type="password" class="input_form_sign d_block  active_inp" placeholder="PASSWORD" name="pass_us" />  
   <input  minlength="8"  type="password" class="input_form_sign" placeholder="CONFIRM PASSWORD" name="conf_pass_us" />
   <input minlength="11" maxlength="11" type=text class="input_form_sign " placeholder="PHONE" name="phone_us" value="1"/>
      <input  type=text class="input_form_sign " placeholder="ADDRESS" name="address_us" />
    <a href="#" class="link_forgot_pass d_block" >Forgot Password ?</a>
    <a href="#" class="link_forgot_pass d_block" ><?php
    session_start();
    if(isset($_SESSION["error"])){
    if($_SESSION["error"]==1)
    {
      echo "please, enter correct info!";
      $_SESSION["error"]=0;
    }
  }
    ?>
    </a>       
<div class="terms_and_cons d_none">
    <?php
    
    if(isset($_SESSION["error"])){
    if($_SESSION["error"]==1)
    {
      echo "please, enter correct info!";
      
    }
  }
    ?>
  
    </div>
      </div>
<div class="cont_btn">
    <button class="btn_sign">SIGN IN</button>
      
      </div>
      
    </form>
    </div>
    
  </div>
  

</div>
<script src="js/sign.js"></script>