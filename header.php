<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>

    <!-- Tailwind CSS CDN -->

    <script src="https://cdn.tailwindcss.com"></script>

    <script>

        tailwind.config = {

            theme: {

                extend: {

                    colors: {

                        'bop-blue': '#00A6E8',

                    }

                }

            }

        }

    </script>

    <style>

        /* Admin bar support - adjust header position when admin bar is present */

        .admin-bar header {

            top: 32px;

        }

        @media screen and (max-width: 782px) {

            .admin-bar header {

                top: 46px;

            }

        }

        /* Ensure admin bar stays on top */

        #wpadminbar {

            z-index: 999999 !important;

        }

    </style>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>



<header class="bg-white border-b border-gray-200 sticky top-0 z-50 relative">

    <nav class="container mx-auto px-4 lg:px-8">

        <div class="flex items-center justify-between h-20">

            

            <!-- Logo -->

            <div class="flex-shrink-0">

                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center" aria-label="BOP Home">

                    <svg width="73" height="38" viewBox="0 0 73 38" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <g clip-path="url(#clip0_96_108)">

                        <path d="M10.6506 10.3213H20.774C24.2912 10.3213 26.0499 12.4039 26.0499 14.9079V16.023C25.999 17.3374 25.196 18.13 23.9645 18.6015C25.2962 19.2465 26.3011 20.2384 26.3258 21.6015V23.0892C26.3258 25.5689 24.5671 27.6758 21.076 27.6758H10.6506V10.3199V10.3213ZM21.0513 15.5787C21.0513 14.7603 20.6752 14.24 19.5686 14.24H15.8756V17.3144H19.5686C20.6491 17.2901 21.0513 16.8185 21.0513 16.0746V15.5787ZM15.8756 23.76H19.8692C20.9497 23.76 21.3519 23.1652 21.3519 22.3468V21.8007C21.3519 21.0568 20.925 20.5609 19.8199 20.5609H15.8756V23.76Z" fill="#282828"/>

                        <path d="M27.884 23.0405V14.9581C27.884 12.4541 29.6426 10.2969 33.1338 10.2969H38.9876C42.4788 10.2969 44.2635 12.4541 44.2635 14.9581V23.0405C44.2635 25.5201 42.4802 27.7016 38.9876 27.7016H33.1338C29.6412 27.7016 27.884 25.5201 27.884 23.0405ZM33.1091 15.8008V22.1232C33.1091 22.966 33.4852 23.5364 34.5918 23.5364H37.5558C38.6362 23.5364 39.0385 22.966 39.0385 22.1232V15.8008C39.0385 14.9581 38.6362 14.4378 37.5558 14.4378H34.5918C33.4867 14.4378 33.1091 14.9581 33.1091 15.8008Z" fill="#282828"/>

                        <path d="M51.7236 27.6773H46.4985V10.3213H57.075C60.5923 10.3213 62.3509 12.4039 62.3509 14.9079V18.2805C62.3509 20.7601 60.5923 22.8671 57.075 22.8671H51.7236V27.6773ZM57.1491 17.3388V15.851C57.1491 15.0082 56.7468 14.4378 55.6664 14.4378H51.7221V18.752H55.6664C56.7468 18.752 57.1491 18.1816 57.1491 17.3388Z" fill="#282828"/>

                        <path d="M10.4327 32.853L10.4298 38H0V27.7031H5.21636L5.21491 32.8515H5.21636L10.4327 32.853Z" fill="#0091FF"/>

                        <path d="M10.5779 5.14703L10.575 0H0.145218V10.2969H5.36158L5.36013 5.14846H5.36158L10.5779 5.14703Z" fill="#0091FF"/>

                        <path d="M62.5673 32.853L62.5702 38H73V27.7031H67.7836L67.7851 32.8515H67.7836L62.5673 32.853Z" fill="#0091FF"/>

                        <path d="M62.4221 5.14703L62.425 0H72.8548V10.2969H67.6384L67.6399 5.14846H67.6384L62.4221 5.14703Z" fill="#0091FF"/>

                        </g>

                        <defs>

                        <clipPath id="clip0_96_108">

                        <rect width="73" height="38" fill="white"/>

                        </clipPath>

                        </defs>

                    </svg>

                </a>

            </div>



            <!-- Desktop Navigation -->

            <div class="hidden lg:flex lg:items-center lg:space-x-8">

                <?php bop_render_acf_nav_menu( 'primary', 'desktop' ); ?>

            </div>



            <!-- Mobile Menu Button -->

            <button 

                id="mobile-menu-toggle" 

                class="lg:hidden p-2 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-bop-blue"

                aria-label="Toggle menu"

                aria-expanded="false"

            >

                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path class="menu-icon-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>

                    <path class="menu-icon-close hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>

                </svg>

            </button>

        </div>



        <!-- Mobile Menu -->

        <div id="mobile-menu" class="hidden lg:hidden pb-4">

            <?php bop_render_acf_nav_menu( 'primary', 'mobile' ); ?>

        </div>

    </nav>

</header>



<!-- Mega Menu Dropdown Container -->

<div id="mega-menu-dropdown" class="hidden absolute top-full left-0 w-full bg-white border-b border-gray-200 shadow-lg z-40">

    <div class="container mx-auto px-4 lg:px-8 py-8">

        <div id="mega-menu-content" class="grid grid-cols-1 md:grid-cols-4 gap-8">

            <!-- Content injected dynamically -->

        </div>

    </div>

</div>



<script>

(function() {

    'use strict';



    // State management

    const state = {

        mobileMenuOpen: false,

        megaMenuOpen: false,

        currentMegaMenu: null,

        hideTimeout: null

    };



    // Mobile Menu Component

    const MobileMenu = {

        toggle() {

            state.mobileMenuOpen = !state.mobileMenuOpen;

            this.render();

        },



        render() {

            const menu = document.getElementById('mobile-menu');

            const button = document.getElementById('mobile-menu-toggle');

            const openIcon = button?.querySelector('.menu-icon-open');

            const closeIcon = button?.querySelector('.menu-icon-close');



            if (menu && button) {

                menu.classList.toggle('hidden', !state.mobileMenuOpen);

                openIcon?.classList.toggle('hidden', state.mobileMenuOpen);

                closeIcon?.classList.toggle('hidden', !state.mobileMenuOpen);

                button.setAttribute('aria-expanded', state.mobileMenuOpen.toString());

            }

        },



        init() {

            const button = document.getElementById('mobile-menu-toggle');

            button?.addEventListener('click', () => this.toggle());

        }

    };



    // Mega Menu Component

    const MegaMenu = {

        show(content) {

            clearTimeout(state.hideTimeout);

            state.megaMenuOpen = true;

            state.currentMegaMenu = content;

            this.render();

        },



        hide(immediate = false) {

            const hideMenu = () => {

                state.megaMenuOpen = false;

                state.currentMegaMenu = null;

                this.render();

            };



            if (immediate) {

                hideMenu();

            } else {

                state.hideTimeout = setTimeout(hideMenu, 300);

            }

        },



        render() {

            const dropdown = document.getElementById('mega-menu-dropdown');

            const contentContainer = document.getElementById('mega-menu-content');



            if (dropdown && contentContainer) {

                dropdown.classList.toggle('hidden', !state.megaMenuOpen);

                

                // If currentMegaMenu is a string (legacy), use it directly

                // If it's an array (mega menu data), use renderMegaMenu

                if (state.currentMegaMenu) {

                    if (typeof state.currentMegaMenu === 'string') {

                        contentContainer.innerHTML = state.currentMegaMenu;

                    } else if (Array.isArray(state.currentMegaMenu)) {

                        this.renderMegaMenu();

                    }

                }

            }

        },



        init() {

            const triggers = document.querySelectorAll('.has-mega-menu');

            const dropdown = document.getElementById('mega-menu-dropdown');



            triggers.forEach(trigger => {

                const link = trigger.querySelector('a');

                const menuContent = trigger.querySelector('.mega-menu-content');

                const menuType = trigger.getAttribute('data-menu-type');



                if (link && menuContent && menuType === 'mega') {

                    link.addEventListener('mouseenter', () => {

                        try {

                            const megaData = JSON.parse(menuContent.textContent);

                            this.showMegaMenu(megaData);

                        } catch (e) {

                            console.error('Error parsing mega menu data:', e);

                        }

                    });



                    link.addEventListener('mouseleave', () => {

                        this.hide();

                    });

                }

            });



            // Keep dropdown open when hovering

            dropdown?.addEventListener('mouseenter', () => {

                clearTimeout(state.hideTimeout);

            });



            dropdown?.addEventListener('mouseleave', () => {

                this.hide();

            });

        },



        showMegaMenu(columns) {

            clearTimeout(state.hideTimeout);

            state.megaMenuOpen = true;

            state.currentMegaMenu = columns;

            this.renderMegaMenu();

        },



        renderMegaMenu() {

            const dropdown = document.getElementById('mega-menu-dropdown');

            const contentContainer = document.getElementById('mega-menu-content');



            if (dropdown && contentContainer && state.currentMegaMenu) {

                dropdown.classList.remove('hidden');

                

                // Clear existing content

                contentContainer.innerHTML = '';



                // Calculate grid columns based on number of columns

                const columnCount = state.currentMegaMenu.length;

                const gridCols = columnCount === 1 ? 'grid-cols-1' : 

                                columnCount === 2 ? 'grid-cols-2' : 

                                columnCount === 3 ? 'grid-cols-3' : 'grid-cols-4';

                contentContainer.className = `grid ${gridCols} gap-8`;



                // Render each column

                state.currentMegaMenu.forEach(column => {

                    const columnDiv = document.createElement('div');

                    columnDiv.className = 'mega-menu-column';

                    

                    // Column header

                    if (column.title) {

                        const header = document.createElement('h3');

                        header.className = 'text-sm font-bold uppercase tracking-wider mb-6 text-bop-blue border-b border-bop-blue pb-2';

                        header.textContent = column.title;

                        columnDiv.appendChild(header);

                    }

                    

                    // Column items

                    if (column.items && column.items.length > 0) {

                        const itemsList = document.createElement('ul');

                        itemsList.className = 'space-y-3';

                        

                        column.items.forEach(item => {

                            const listItem = document.createElement('li');

                            const link = document.createElement('a');

                            link.href = item.url || '#';

                            link.className = 'flex items-center justify-between text-gray-700 hover:text-bop-blue transition-colors duration-200 group';

                            if (item.target) {

                                link.target = '_blank';

                                link.rel = 'noopener noreferrer';

                            }

                            

                            // Item text

                            const itemText = document.createElement('span');

                            itemText.textContent = item.title;

                            if (item.active) {

                                itemText.className = 'bg-gray-100 px-2 py-1 rounded';

                            }

                            link.appendChild(itemText);

                            

                            // Arrow icon

                            const arrow = document.createElement('svg');

                            arrow.className = 'h-4 w-4 text-gray-400 group-hover:text-bop-blue transition-colors';

                            arrow.setAttribute('fill', 'none');

                            arrow.setAttribute('stroke', 'currentColor');

                            arrow.setAttribute('viewBox', '0 0 24 24');

                            arrow.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>';

                            link.appendChild(arrow);

                            

                            listItem.appendChild(link);

                            itemsList.appendChild(listItem);

                        });

                        

                        columnDiv.appendChild(itemsList);

                    }

                    

                    // Column sections (sub-sections)

                    if (column.sections && column.sections.length > 0) {

                        column.sections.forEach(section => {

                            // Section header

                            if (section.title) {

                                const sectionHeader = document.createElement('h4');

                                sectionHeader.className = 'text-sm font-bold uppercase tracking-wider mt-6 mb-3 text-bop-blue border-b border-bop-blue pb-2';

                                sectionHeader.textContent = section.title;

                                columnDiv.appendChild(sectionHeader);

                            }

                            

                            // Section items

                            if (section.items && section.items.length > 0) {

                                const sectionList = document.createElement('ul');

                                sectionList.className = 'space-y-3';

                                

                                section.items.forEach(item => {

                                    const listItem = document.createElement('li');

                                    const link = document.createElement('a');

                                    link.href = item.url || '#';

                                    link.className = 'flex items-center justify-between text-gray-700 hover:text-bop-blue transition-colors duration-200 group';

                                    if (item.target) {

                                        link.target = '_blank';

                                        link.rel = 'noopener noreferrer';

                                    }

                                    

                                    const itemText = document.createElement('span');

                                    itemText.textContent = item.title;

                                    link.appendChild(itemText);

                                    

                                    const arrow = document.createElement('svg');

                                    arrow.className = 'h-4 w-4 text-gray-400 group-hover:text-bop-blue transition-colors';

                                    arrow.setAttribute('fill', 'none');

                                    arrow.setAttribute('stroke', 'currentColor');

                                    arrow.setAttribute('viewBox', '0 0 24 24');

                                    arrow.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>';

                                    link.appendChild(arrow);

                                    

                                    listItem.appendChild(link);

                                    sectionList.appendChild(listItem);

                                });

                                

                                columnDiv.appendChild(sectionList);

                            }

                        });

                    }

                    

                    contentContainer.appendChild(columnDiv);

                });

            }

        }

    };



    // Initialize on DOM ready

    if (document.readyState === 'loading') {

        document.addEventListener('DOMContentLoaded', () => {

            MobileMenu.init();

            MegaMenu.init();

        });

    } else {

        MobileMenu.init();

        MegaMenu.init();

    }



    // Cleanup on page unload

    window.addEventListener('beforeunload', () => {

        clearTimeout(state.hideTimeout);

    });

})();

</script>
