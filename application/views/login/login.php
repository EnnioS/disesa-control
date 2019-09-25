

<div class="row center">
 <div class="col s12 m6 l4 offset-m3 offset-l4" style="margin-top: 100px">
    <img  src="<?PHP echo base_url();?>assets/img/logoDisesa.png" style="width:100%" >
  </div>                
</div>
<div class="row"  id="cont-login-2">
  <div class="col s12 m6 l4  offset-m3 offset-l4">
    <div class="row center card" id="cardLogin">

      <div class="card-content">
        <form action="<?php echo base_url("index.php/login");?>" method="post" class="form">
          
          <div  class="row center">
            <div class="col s12">  
              <input style=""  placeholder="USUARIO" name="txtUsuario" id="nombre" type="text" class="login-input">
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <input style="" placeholder="CONTRASEÑA" name="txtpassword" id="pass" type="password" class="login-input">
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button id="Acceder" class="btn-login" type="submit" name="action"><span>ACCEDER</span></button> 
            </div>                
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

