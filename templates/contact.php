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
            <form action="#" method="post" class="contact-box">
                <div>
                    <label for="Nom">Nom</label>
                    <input type="text" name="Nom" id="" required="required">                    
                </div>
                <div>
                    <label for="E-mail">E-mail</label>
                    <input type="email" name="E-mail" id="" required="required">                    
                </div>
                <div>
                    <label for="Réf. photo">Réf. photo</label>
                    <input type="text" name="Réf. photo" id="referenceField">                    
                </div>
                <div>
                    <label for="Message">Message</label>
                    <input type="text" name="Message" id="message-area">                    
                </div>
                <button type="submit" class="button">Envoyer</button>
            </form>
        </div>
    </div>

</div>