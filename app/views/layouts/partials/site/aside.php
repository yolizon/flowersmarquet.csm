<aside class="aside">
        <div class="cart">
            <div class="cart-header">
                <button class="close-btn"><i class="fas fa-times"></i></button>
                <h2 class="logo"> Your shopping cart</h2>
            </div>
            <div class="cart-items"></div>
        
            <div class="cart-footer">
                <h3>Your total : $<span class="cart-total">0</span></h3>
                <div class="btn-group" role="group">
                    <?php if(isGuest()):?>
                    <a href="/#login">
                    <button class="checkout btn btn-outline-warning">You should login</button>
                    </a>
                    <?php else:?>
                    <button class="checkout btn btn-outline-success">Checkout</button>
                    <?php endif?>
                    <button class="clear-cart">Clear Cart</button>
                </div>
            </div>
        </div>
    </aside>
    <!-- slider-->
    <aside class="single">
    </aside>