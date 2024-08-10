<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WCT One</title>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <header>
            <section class="serach">{{Search}}</section>
            <section class="top-bar">
                <div class="brand">{{Logo}}</div>
                <div class="secound-column">
                    <div class="account">{{Account}}</div>
                    <nav class="main-menu">{{Menu}}</nav>
                </div>
            </section>
        </header>
        <div class="content-area">
            <main>
                <section class="slider"></section>
                <section class="popular-products">{{Popular Products}}</section>
                <section class="new-arrivals">{{New Arrivals}}</section>
                <section class="deal-of-the-week">{{Deal of the Week}}</section>
                <section class="wct-blog">{{News}}</section>
            </main>
        </div>
        <footer>
            <section class="footer-widgets">{{Footer Widgets}}</section>
            <section class="copyright">{{Copyright}}</section>
        </footer>
    </div>
</body>

</html>