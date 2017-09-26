<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Select Outlets</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div>
                        <multiselect v-model="already" :options="outlets" :multiple="true" :close-on-select="false"
                                     :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder="Outlets"
                                     label="name" track-by="name">
                        </multiselect>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <button class="btn btn-primary " name="submit" @click="send">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import swal from 'sweetalert2'
    import Multiselect from 'vue-multiselect';

    export default {
        props: {
            action: {
                type: String,
                required: true,
            },
            already: {
                type: Array,
            },
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
                });
                return ids;
            },
        },
        methods: {
            send() {
                axios.post(this.action, {
                    outlets: this.already
                }).then(response => {
                    swal(
                        'Updated!',
                        'User outlets have been updated',
                        'success',
                    );
                }).catch(error => {
                    swal(
                        'Uh oh!',
                        'We were unable to update the user outlets',
                        'error',
                    );
                });
            },
        }
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>