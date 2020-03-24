<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP Motors Home</title>
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div id="wrapper">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        </header>
        <main>
            <h1>Welcome to PHP Motors!</h1>

            <section id="hero">

                <ul>
                    <li>
                        <h2>DMC Delorean</h2>
                    </li>
                    <li>3 Cup holders</li>
                    <li>Superman doors</li>
                    <li>Fuzzy dice!</li>
                    <li><a href="/phpmotors/cart/" title="cart"><img id="actionbtn" alt="Add to cart button" src="images/own_today.png"></a></li>
                </ul>
                
            </section>
            <a href="/phpmotors/cart/" title="cart"><img id="belowactionbtn" alt="Add to cart button" src="images/own_today.png"></a>
            <div class="flex-content">    
                <section id="review">
                    <h2>DMC Delorean Reviews</h2>
                    <ul>
                        <li>"So fast its almost like traveling in time." (4/5)</li>
                        <li>"Coolest ride on the road." (4/5)</li>
                        <li>"I'm feeling Marty McFly!" (5/5)</li>
                        <li>"The most futuristic ride of our day." (4.5/5)</li>
                        <li>"80's livin and I love it!" (5/5)</li>
                    </ul>
                </section>
                <section id="add-ons">
                    <h2>Delorean Upgrades</h2>
                    <div class="flex">
                        <a href="#" title="flux-capacitor">
                            <figure>

                                <div class="add-col"><img src="images/upgrades/flux-cap.png" alt="Flux-Capacitor"></div>
                                <figcaption>Flux Capacitor</figcaption>
                            </figure>
                        </a>
                        <a href="#" title="flame decals">
                            <figure>
                                <div class="add-col"><img src="images/upgrades/flame.jpg" alt="flame decal"></div>
                                <figcaption>Flame Decals</figcaption>
                            </figure>
                        </a>

                    </div>
                    <div class="flex">
                        <a href="#" title="bumper stickers">
                            <figure>
                                <div class="add-col"><img src="images/upgrades/bumper_sticker.jpg" alt="Bumper Stickers">                                   </div>
                                <figcaption>Bumper Stickers</figcaption>
                            </figure>
                        </a>
                        <a href="#" title="hub caps">
                            <figure>
                                <div class="add-col"><img src="images/upgrades/hub-cap.jpg" alt="Hub Caps"></div>
                                <figcaption>Hub Caps</figcaption>
                            </figure>
                        </a>

                    </div>
                </section>
            
            </div>
        </main>
        <hr>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
        </div>
</body>

</html>