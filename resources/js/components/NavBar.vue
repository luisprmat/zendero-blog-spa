<template>
    <nav class="custom-wrapper" id="menu">
        <div class="pure-menu">
            <a href="#" class="custom-toggle btn-bar" id="toggle"></a>
        </div>

        <ul class="container-flex list-unstyled">
            <li>
                <router-link :to="{name: 'home'}" class="c-gris-2 text-uppercase">
                    Inicio
                </router-link>
            </li>
            <li>
                <router-link :to="{name: 'about'}" class="c-gris-2 text-uppercase">
                    Nosotros
                </router-link>
            </li>
            <li>
                <router-link :to="{name: 'archive'}" class="c-gris-2 text-uppercase">
                    Archivo
                </router-link>
            </li>
            <li>
                <router-link :to="{name: 'contact'}" class="c-gris-2 text-uppercase">
                    Contacto
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {

    }
</script>
