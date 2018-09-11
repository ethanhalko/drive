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
        filePath: {
            type: String,
            required: true
        },
        item: {
            type: [Object, Array],
            required: true
        },
    },
    data: function () {
        return {}
    },
    computed: {
        cardName() {
            return this.item.basename || this.item.name;
        },
        icon() {
            return _.isNil(this.item.basename) ? this.item.icon : 'fas fa-folder folder';
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
