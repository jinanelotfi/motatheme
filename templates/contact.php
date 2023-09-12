<!-- Trigger/Open The Modal -->
<!-- <button id="myBtn">Contact</button> -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
        <span class="close">x</span>
        <div class="box">                  
            <div class="contact-image">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/Contact-header.png'; ?>" alt="contact texte">
            </div>
            <div class="contact-box">
                <?php echo do_shortcode('[contact-form-7 id="f029b0d" title="Contact form 1"]'); ?>
            </div>           
        </div>
    </div>

</div>