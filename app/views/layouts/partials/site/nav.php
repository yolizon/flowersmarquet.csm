<header  class="bg-white">
    <!-- navigation -->
    <nav id="nav">
        <div class="navbar" id="navbar">
            <input type="checkbox" id="hamburger">
            <label for="hamburger"><i class="nav-toggle fas fa-bars"></i></label>
            <div class="navbar-brand">
                <span class="text-dark text-uppercase font-weight-bold">Flowers Marquet</span>
            </div>
            <ul class="navbar-menu brackets">
                <li><a href="/">Home</a></li>
                <li><a href="/shop">Shop</a></li>
                <li><a href="/about">Contact</a></li>
                <li><a href="/blog"> Blog</a></li>
            </ul>
            <ul class="navbar-tool">
                    <li>
                        <a href="#" class="sidebar-toggle"><i class="fas fa-dolly-flatbed"></i><small
                                class="text-gray count-items-in-cart">0</small></a>
                    </li>
                    <li>
                        <a href="#"><i class="far fa-heart"></i><small class="text-gray">(0)</small></a>
                    </li>
                    <?php if(isGuest()):?>
                    <li>
                        <a href="#login"><i class="fas fa-user-alt"></i></a>
                    </li>
                    <?php else:?>
                        <li>
                        <a href="/profile"><i class="fas fa-address-card"></i></a>
                    </li>
                   
                    <li>
                        <a href="/logout"><i class="fas fa-sign-out-alt"></i></a>
                    </li>
                    <?php endif?>
                </ul>
        </div>
    </nav> 
    <!-- ./navigation -->
    </header>