<template>
    <vue-clip :options="options"><template slot="clip-uploader-body" scope="props">
            <div v-for="file in props.files">
                <img v-bind:src="file.dataUrl"/>
                {{ file.name }} {{ file.status }}
            </div>
        </template>
        <template slot="clip-uploader-action">
            <div>
                <div class="dz-message"><h2> Click or Drag and Drop files here upload </h2></div>
            </div>
        </template>
    </vue-clip>
</template>

<script>
    //TODO: Add csrf token to http request
    import VueClip from 'vue-clip';

    export default {
        data() {
            return {
                options: {
                    url: '/import',
                    paramName: 'data',
                },
            };
        },
    };
</script>

<style>

</style>