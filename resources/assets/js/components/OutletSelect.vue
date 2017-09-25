<template>
    <div>
        <label class="typo__label">Outlet</label>
        <multiselect v-model="value" :options="outlets" :multiple="true" :close-on-select="false"
                     :clear-on-select="false"
                     :hide-selected="true" :preserve-search="true" placeholder="Outlets" label="name" track-by="name">
        </multiselect>
        <input type="text" disabled class="hidden" name="outlets" :value="ids">
    </div>
</template>
<script>
    import Multiselect from 'vue-multiselect';

    export default {
        props: {
            outlets: {
                type: Array,
            },
        },
        components: {
            Multiselect,
        },
        data() {
            return {
                value: [],
            };
        },
        computed: {
            ids() {
                var ids = [];
                this.value.forEach(outlet => {
                    ids.push(outlet.id);
                })
                return ids;
            }
        }
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>