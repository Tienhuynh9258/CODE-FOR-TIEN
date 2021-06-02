<nav class="navbar navbar-expand-lg bg-light p-0 fixed-top">
    <ul class="navbar-nav text-muted" id='menu-list'>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a>
        </li>
        <li class="nav-item" id='contact-item'>
            <a class="nav-link" href="<?php echo e(route('contact-us')); ?>">Contact</a>
        </li>
        <li class="nav-item" id='about-us-item'>
            <a class="nav-link" href="<?php echo e(route('about-us')); ?>">About us</a>
        </li>
        <?php if(session()->has('uname')): ?>
          <li class="nav-item">
            <a class="nav-link" href="javascrip:void(0)" data-toggle="modal" title="Personal information." id='customer-info' data-target="#update-customer-form">Hello, <?php echo e(session()->get('uname')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascrip:void(0)" id='logout'>Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item" id='login-item'>
              <a class="nav-link" href="javascrip:void(0)" data-toggle="modal" data-target="#login-form">Login</a>
          </li>
          <li class="nav-item" id='register-item'>
              <a class="nav-link" href="javascrip:void(0)" data-toggle="modal" data-target="#register-form">Register</a>
          </li>
        <?php endif; ?>
    </ul>
    <div id='card-item' class='position-fixed' style='right:50px; font-size:20px'>
        <a href="javascript:void(0)" data-toggle="modal" data-target="#cart"><i class="fas fa-shopping-cart"></i><span class='badge badge-warning' id='lblCartCount'>0</span></a>
    </div>
</nav>

<div class="modal" id="login-form">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="usr">Username:</label>
                <input type="text" class="form-control" id="usr" onkeyup="checkInput(this)">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" onkeyup="checkInput(this)">
            </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class='btn btn-primary' id='login'>Login</button>
      </div>

    </div>
  </div>
</div>

<div class="modal" id="register-form" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Register</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="uname">Username:</label>
                <input type="text" class="form-control" id="uname" onkeyup="checkInput(this)">
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" id="pass" onkeyup="checkInput(this)">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" onkeyup="checkInput(this)">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" onkeyup="checkInput(this)">
            </div>
            <div class="form-group">
                <label for="lname">Lastname:</label>
                <input type="text" class="form-control" id="lname" onkeyup="checkInput(this)">
            </div>
            <div class="form-group">
                <label for="fname">Firstname:</label>
                <input type="text" class="form-control" id="fname" onkeyup="checkInput(this)">
            </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class='btn btn-primary' id='register'>Register</button>
      </div>

    </div>
  </div>
</div>
<div class="modal" id="update-customer-form">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Customer information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="cuname">Username:</label>
            <input type="text" class="form-control" id="cuname">
          </div>
          <div class="form-group">
            <label for="cphone">Phone:</label>
            <input type="text" class="form-control" id="cphone">
          </div>
          <div class="form-group">
            <label for="cemail">Email:</label>
            <input type="text" class="form-control" id="cemail">
          </div>
          <div class="form-group">
            <label for="clname">Lastname:</label>
            <input type="text" class="form-control" id="clname">
          </div>
          <div class="form-group">
            <label for="cfname">Firstname:</label>
            <input type="text" class="form-control" id="cfname">
          </div>
          <div class="form-group">
            <label for="ccreditcode">Credit code:</label>
            <input type="text" class="form-control" id="ccreditcode">
          </div>
          <div class="form-group">
            <label for="cedate">Expiration date:</label>
            <input type="text" class="form-control" id="cedate">
          </div>
          <div class="form-group">
            <label for="cowner">Owner:</label>
            <input type="text" class="form-control" id="cowner">
          </div>
          <div class="form-group">
            <label for="cbname">Bank name:</label>
            <input type="text" class="form-control" id="cbname">
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class='btn btn-primary' id='save-customer-info'>Save changes</button>
      </div>

    </div>
  </div>
</div>

<div class="modal" id="cart">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title cart-header"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style='min-height:400px'>
      </div>


      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class='btn btn-primary' id='payment'>Pay</button>
      </div>

    </div>
  </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function checkInput(data){
  if($(data).val()==''){
      $(data).addClass('is-invalid');
      $(data).removeClass('is-valid');
  }
  else{
      $(data).removeClass('is-invalid');
      $(data).addClass('is-valid');
  }
}
$(document).ready(function() {
    $('#lblCartCount').text(sessionStorage.getItem('cart')?sessionStorage.getItem('cart'):0);
    $('#login').click(function(){
        if($('#usr').val()==''||$('#pwd').val()==''){
          toastr.error('Please enter username and password!')
          return false;
        }
        $.ajax({
            url: "<?php echo e(route('login')); ?>",
            method: "POST",
            dataType: "json",
            data: {
                usr: $('#usr').val(),
                pwd: $('#pwd').val()
            },
            success: function(data) {
              if(data.status==2)
                window.location.href="<?php echo e(route('admin', ['cid' => session()->get('cid')])); ?>"; 
              else if(data.status==1){
                $('#login-item').hide();
                $('#register-item').hide();
                $('#login-form').modal('hide');
                location.reload();
              }
              else{
                toastr.error('Your credentials is invalid!');
              }
            }
        });
    });
    $('#register').click(function(){
        if($('#uname').val()==''||$('#pass').val()==''||$('#phone').val()==''||$('#email').val()==''||$('#fname').val()==''||$('#lname').val()==''){
          toastr.error('Please enter all field!')
          return false;
        }
        $.ajax({
            url: "<?php echo e(route('register')); ?>",
            method: "POST",
            dataType: "json",
            data: {
                uname: $('#uname').val(),
                pass: $('#pass').val(),
                phone: $('#phone').val(),
                email: $('#email').val(),
                fname: $('#fname').val(),
                lname: $('#lname').val(),
            },
            success: function(data) {
                $('#register-form').modal('hide');
                if(data.status){
                  toastr.success('Register success!');
                  $('#login-form').modal('show');
                }
                else if(data.staus == 0){
                  toastr.error('Please try again!');
                }
                else{
                  toastr.error('Username was used!');
                }
            }
        });
    });
    $('#logout').click(function(){
      sessionStorage.clear();
      $.ajax({
            url: "<?php echo e(route('logout')); ?>",
            method: "POST",
            dataType: "json",
            success: function(data) {
              if(data.status==1){
                toastr.success('Logout success!');
                location.reload();
              }
            }
        });
    });
    $('#customer-info').click(function(){
      $.ajax({
            url: "<?php echo e(route('getCustomerInfo')); ?>",
            method: "GET",
            data: {
              cid: "<?php echo e(session()->get('cid')); ?>"
            },
            dataType: "json",
            success: function(data) {
              $('#cuname').val(data.USERNAME);
              $('#cphone').val(data.PHONE);
              $('#cemail').val(data.EMAIL);
              $('#clname').val(data.LNAME);
              $('#cfname').val(data.FNAME);
              $('#ccreditcode').val(data.CCODE?data.CCODE:'Not set');
              $('#cedate').val(data.EXPIRATION_DATE?data.EXPIRATION_DATE:'Not set');
              $('#cowner').val(data.ONAME?data.ONAME:'Not set');
              $('#cbname').val(data.BNAME?data.BNAME:'Not set');
            }
        });
    });
    $('#save-customer-info').click(function(){
      $.ajax({
            url: "<?php echo e(route('saveCustomerInfo')); ?>",
            method: "POST",
            data: {
              cid: "<?php echo e(session()->get('cid')); ?>",
              cuname: $('#cuname').val(),
              cphone: $('#cphone').val(),
              cemail: $('#cemail').val(),
              clname: $('#clname').val(),
              cfname: $('#cfname').val(),
              ccreditcode: $('#ccreditcode').val()=='Not set'?null:$('#ccreditcode').val(),
              cedate: $('#cedate').val()=='Not set'?null:$('#cedate').val(),
              cowner: $('#cowner').val()=='Not set'?null:$('#cowner').val(),
              cbname: $('#cbname').val()=='Not set'?null:$('#cbname').val()
            },
            dataType: "json",
            success: function(data) {
              toastr.success('Saved success!');
              location.reload();
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\Ebookstore_Laravel\resources\views/layouts/partials/nav.blade.php ENDPATH**/ ?>