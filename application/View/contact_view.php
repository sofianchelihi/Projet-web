<?php
class contact_view extends view{
    public function afficher_contact(){ ?>
        <div class="contact_div" id="Contact">
            <div class="sponsors">
                <p> contact us</p>
            </div>
            <div class="inputs">
                <div class="locations">
                    <div class="locationdiv">
                        <img src="<?php echo ROOTIMG?>Vector.png">
                        <div >
                            <p>Call Me</p> 
                            <address>
                                <a href="tel:+213123456789" target="_blank "> +213123456789 </a>  
                            </address>
                        </div>
                    </div> 
                    <div class="locationdiv">
                        <img src="<?php echo ROOTIMG?>Vector (1).png">
                        <div >
                            <p>Email</p> 
                            <address>
                                <a href="mailto:js_chelihi@esi.dz " target="_blank"> js_chelihi@esi.dz </a>
                            </address>
                        </div>
                    </div>  
                    <div class="locationdiv">
                        <img src="<?php echo ROOTIMG?>Vector (2).png">
                        <div >
                            <p>Location</p> 
                            <address>
                                <a target="_blank" href="https://g.page/ESI-Alger?share">Algiers , Algeria</a>
                            </address>
                        </div>
                    </div> 
                </div>
                <form class="forms" method="POST" action="http://localhost/Projet_TDW/public/contact/envoyer_mail">
                    <div class="c1">
                        <div> 
                            <input type="text" placeholder="        Name" name="name" required>
                        </div> 
                        <div> 
                            <input type="email" placeholder="        Email" name="email" required>
                        </div>
                    </div> 
                    <div class="c2">
                        <input type="text" placeholder="        Title" name="title" required>
                    </div> 
                    <div class="c3">
                        <textarea type="text" placeholder="        Your Message " name="message" required></textarea>
                    </div>
                    <div class="but_class">
                        <button type="submit" > send messeges <img src="<?php echo ROOTIMG?>Vector (4).png"></button>
                    </div>
                </form>
            </div>
        </div>
      <?php
    }
}