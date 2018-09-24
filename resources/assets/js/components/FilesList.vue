<template>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="icon text-center" :class="icon"></span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <p class="mb-0">
                <a :href="filePath">
                    {{ cardName }}
                </a>
            </p>
        </div>
    </div>
</template>

<script>/**/
export default {
    props: {

    },
    data: function () {
        return {}
    },
    computed: {

    },
    mounted() {

    }
}
</script>
