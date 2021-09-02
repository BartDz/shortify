<template>
    <div>
        <div class="columns is-mobile is-centered mt-6">
            <section class="section is-centered">
                <img id="shortify-logo" src="/img/logo_transparent.png" alt="Shortify logo">
            </section>
        </div>
        <add-link-form />
    </div>
</template>

<script>
import AddLinkForm from './components/add-link-form.vue'

export default {
    components: {
        AddLinkForm
    }
}
</script>
