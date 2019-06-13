<script>

    export default {
        template: '#vue-header',
        data() {
            return {
                accos: [],
            };
        },
        mounted() {

        },
        methods: {
            openMenu(e) {
                const hamburger = e.currentTarget;
                const closeMobileMenu = hamburger.nextElementSibling;
                const Menu = document.getElementById('nav_header');
                const navListHeader = document.getElementById('nav__list_header');

                Menu.classList.add('active');
                navListHeader.classList.add('active');
                hamburger.style.display = 'none';
                closeMobileMenu.style.display = 'block';
            },
            closeMenu(e) {
                const closeMobileMenu = e.currentTarget;
                const hamburger = closeMobileMenu.previousElementSibling;
                const Menu = document.getElementById('nav_header');
                const navListHeader = document.getElementById('nav__list_header');

                Menu.classList.remove('active');
                navListHeader.classList.remove('active');
                closeMobileMenu.style.display = 'none';
                hamburger.style.display = 'block';
            },
        },
    };
</script>
