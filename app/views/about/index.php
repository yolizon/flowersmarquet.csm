<!-- <h1><$title</h1> -->
<section class="py-5">
    <header>
        <h1 class="text-dark text-uppercase font-weight-bold">Contact us</h1>
    </header>
    <div class="row">
        <div class='col-md-6'>
            <h3>Flowers Marquet</h3>
            <?php if(isset($address)):?>
            <ul>
                <li><i class="fa fa-road"></i> <?= $address['street']?></li>
                <li><i class="fas fa-map-marker-alt"></i> <?= $address['city']?></li>
                <li><i class="fas fa-home"></i> <?= $address['country']?></li>
                <li><i class="fa fa-phone"></i> <?= $address['mobile']?></li>
                <li><i class="fa fa-envelope"></i> <?= $address['email']?></li>
            </ul>
            <?php endif?>
        </div>
        <div class="col-md-6">
            <form method="POST">
                <div class="contact">

                    <div class="table-cell">
                        <label for="name">Your Name</label>
                        <input id="name" type="text" name="username">
                    </div>
                    <div class="table-cell">
                        <label for="company">Your Company</label>
                        <input id="company" type="text" name="company">
                    </div>


                    <div class="table-cell">
                        <label for="email">Your Email</label>
                        <input id="email" type="email" name="email">
                    </div>
                    <div class="table-cell">
                        <label for="phone">Phone number</label>
                        <input id="phone" type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                            placeholder="000-111-2345">
                    </div>


                    <div class="table-cell full">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" row="5"></textarea>
                    </div>


                    <div class="table-cell">
                        <button type="submit" name="submit">Send</button>
                    </div>
                    <div class="table-cell">
                        <button type="reset" name="reset">Reset</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

</section>