
<footer class="easyrealestate-footer">
    <div class="easyrealestate-footer-content">
        <div class="copyright">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Alle Rechte vorbehalten.
        </div>
        <div class="footer-menu">
            <?php
            wp_nav_menu(array(
                'menu_id'        => 'footer-menu',
                'menu_class'     => 'easyrealestate-footer-menu',
            ));
            ?>
        </div>
    </div>
</footer>
    <?php wp_footer(); ?>
</body>
</html>