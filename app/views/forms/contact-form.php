<?php
/**
 * Sample Form
 *
 */

use Core\Language;
use Helpers\Form;
?>


<div id="response">

</div>
<?php echo Form::open(array('method' => 'post', 'id' => 'contact', 'name' => 'contact'));?>
  <p>
    <label for="name">Full Name</label>
    <input type="text" name="name" id="name" placeholder="Name" />
  </p>
  <p>
    <label for="name">Email</label>
    <input type="text" name="email" id="email" placeholder="Email Address" />
  </p>
  <p>
    <label for="name">Phone</label>
    <input type="text" name="phone" id="phone" placeholder="Phone" />
  </p>
  <p>
    <label for="name">Message</label>
    <input type="text" name="message" id="message" placeholder="Type your message here" />
  </p>

  <p>
    <input type="submit" name="submit" id="submitBtn" value="Send" />
  </p>
<?php echo Form::close(); ?>


<script>
    $.ajax({
       method: "GET",
       url: "app/Controllers/FormsController/contactFormSubmit",
       data: {
        name: "name",
        email: "email",
        phone: "phone",
        message: "message"
       }
   }).done(function (res) {

       if(res.success){
           console.log(res.message);
       }else{
           console.log(res.error);
       }
   });
</script>
