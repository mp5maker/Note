<?php
$content = "
<div class = 'card row'>
  <img src = '/E-Commerce2/images/email.gif' class = 'img-fluid card-img-top'/>
  <div class = 'card-img-overlay'>
    <button type = 'button' class = 'btn btn-info btn-lg w-100' data-toggle = 'modal' data-target = '#myModal'>
      Email Us
    </button>
    <div id = 'myModal' class = 'modal fade'>
      <div class = 'modal-dialog'>
        <div class = 'modal-content'>
          <div class = 'modal-header'>
            <h4 class = 'modal-title'>Contact Us</h4>
            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
          </div>
          <div class = 'modal-body'>
            <form action = '".$_SERVER['PHP_SELF']."' action = 'post'>
                <div class = 'form-group'>
                  <span>Email <i class = 'icon-envelope'></i></span>
                  <input class = 'form-control' type = 'text' placeholder = 'Email address' name = 'email'>
                </div>
                <div class = 'form-group'>
                  <span>Message <i class = 'icon-keyboard'></i></span>
                  <textarea class = 'form-control'  placeholder ='Max 500 characters' name = 'message'></textarea>
                </div>
            </form>
          </div>
          <div class = 'modal-footer'>
            <button type = 'button' class = 'btn btn-default' data-dismiss = 'modal'>Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
";