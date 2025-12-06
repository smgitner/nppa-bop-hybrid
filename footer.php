<footer class="bg-neutral-800 text-white">

    <div class="container mx-auto px-4 lg:px-8 py-12">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            

            <!-- About Column -->

            <div>

                <h3 class="text-sm font-bold uppercase tracking-wider mb-6">About</h3>

                <?php

                wp_nav_menu(array(

                    'theme_location' => 'footer-about',

                    'container' => false,

                    'menu_class' => 'space-y-4',

                    'fallback_cb' => false,

                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',

                    'walker' => new BOP_Footer_Menu_Walker(),

                ));

                ?>

            </div>



            <!-- Training Column -->

            <div>

                <h3 class="text-sm font-bold uppercase tracking-wider mb-6">Training</h3>

                <?php

                wp_nav_menu(array(

                    'theme_location' => 'footer-training',

                    'container' => false,

                    'menu_class' => 'space-y-4',

                    'fallback_cb' => false,

                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',

                    'walker' => new BOP_Footer_Menu_Walker(),

                ));

                ?>

            </div>



            <!-- Additional Columns (if needed) -->

            <?php if (is_active_sidebar('footer-3')) : ?>

            <div>

                <?php dynamic_sidebar('footer-3'); ?>

            </div>

            <?php endif; ?>



            <?php if (is_active_sidebar('footer-4')) : ?>

            <div>

                <?php dynamic_sidebar('footer-4'); ?>

            </div>

            <?php endif; ?>

        </div>

    </div>



    <!-- Bottom Bar -->

    <div class="bg-white py-6">

        <div class="container mx-auto px-4 lg:px-8">

            <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">

                

                <!-- BOP Logo -->

                <div class="flex items-center space-x-3">

                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center" aria-label="BOP Home">

                        <svg width="73" height="38" viewBox="0 0 73 38" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <g clip-path="url(#clip0_footer_logo)">

                            <path d="M10.6506 10.3213H20.774C24.2912 10.3213 26.0499 12.4039 26.0499 14.9079V16.023C25.999 17.3374 25.196 18.13 23.9645 18.6015C25.2962 19.2465 26.3011 20.2384 26.3258 21.6015V23.0892C26.3258 25.5689 24.5671 27.6758 21.076 27.6758H10.6506V10.3199V10.3213ZM21.0513 15.5787C21.0513 14.7603 20.6752 14.24 19.5686 14.24H15.8756V17.3144H19.5686C20.6491 17.2901 21.0513 16.8185 21.0513 16.0746V15.5787ZM15.8756 23.76H19.8692C20.9497 23.76 21.3519 23.1652 21.3519 22.3468V21.8007C21.3519 21.0568 20.925 20.5609 19.8199 20.5609H15.8756V23.76Z" fill="#282828"/>

                            <path d="M27.884 23.0405V14.9581C27.884 12.4541 29.6426 10.2969 33.1338 10.2969H38.9876C42.4788 10.2969 44.2635 12.4541 44.2635 14.9581V23.0405C44.2635 25.5201 42.4802 27.7016 38.9876 27.7016H33.1338C29.6412 27.7016 27.884 25.5201 27.884 23.0405ZM33.1091 15.8008V22.1232C33.1091 22.966 33.4852 23.5364 34.5918 23.5364H37.5558C38.6362 23.5364 39.0385 22.966 39.0385 22.1232V15.8008C39.0385 14.9581 38.6362 14.4378 37.5558 14.4378H34.5918C33.4867 14.4378 33.1091 14.9581 33.1091 15.8008Z" fill="#282828"/>

                            <path d="M51.7236 27.6773H46.4985V10.3213H57.075C60.5923 10.3213 62.3509 12.4039 62.3509 14.9079V18.2805C62.3509 20.7601 60.5923 22.8671 57.075 22.8671H51.7236V27.6773ZM57.1491 17.3388V15.851C57.1491 15.0082 56.7468 14.4378 55.6664 14.4378H51.7221V18.752H55.6664C56.7468 18.752 57.1491 18.1816 57.1491 17.3388Z" fill="#282828"/>

                            <path d="M10.4327 32.853L10.4298 38H0V27.7031H5.21636L5.21491 32.8515H5.21636L10.4327 32.853Z" fill="#0091FF"/>

                            <path d="M10.5779 5.14703L10.575 0H0.145218V10.2969H5.36158L5.36013 5.14846H5.36158L10.5779 5.14703Z" fill="#0091FF"/>

                            <path d="M62.5673 32.853L62.5702 38H73V27.7031H67.7836L67.7851 32.8515H67.7836L62.5673 32.853Z" fill="#0091FF"/>

                            <path d="M62.4221 5.14703L62.425 0H72.8548V10.2969H67.6384L67.6399 5.14846H67.6384L62.4221 5.14703Z" fill="#0091FF"/>

                            </g>

                            <defs>

                            <clipPath id="clip0_footer_logo">

                            <rect width="73" height="38" fill="white"/>

                            </clipPath>

                            </defs>

                        </svg>

                    </a>

                </div>



                <!-- Social Icons -->

                <div class="flex items-center space-x-4">

                    <?php if (get_theme_mod('facebook_url')) : ?>

                    <a 

                        href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" 

                        target="_blank" 

                        rel="noopener noreferrer" 

                        class="text-gray-800 hover:text-bop-blue transition-colors duration-200"

                        aria-label="Facebook"

                    >

                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">

                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>

                        </svg>

                    </a>

                    <?php endif; ?>



                    <?php if (get_theme_mod('twitter_url')) : ?>

                    <a 

                        href="<?php echo esc_url(get_theme_mod('twitter_url')); ?>" 

                        target="_blank" 

                        rel="noopener noreferrer" 

                        class="text-gray-800 hover:text-bop-blue transition-colors duration-200"

                        aria-label="Twitter/X"

                    >

                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">

                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>

                        </svg>

                    </a>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</footer>



<?php wp_footer(); ?>

</body>

</html>
