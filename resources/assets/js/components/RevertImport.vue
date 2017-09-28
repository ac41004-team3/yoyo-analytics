<template>
    <button type="button" class="btn btn-default" @click="commit">Revert</button>
</template>

<script>
    import axios from 'axios';
    import swal from 'sweetalert2';

    export default {
        props: ['action', 'id'],
        data() {
            return {};
        },
        methods: {
            revert() {
                swal({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to undo this!',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, revert it!',
                }).then(function() {
                    this.commit();
                });
            },
            commit() {
                axios.post(this.action, {
                    id: this.id,
                }).then(response => {
                    swal(
                        'Reverted!',
                        'Your import has been reverted.',
                        'success',
                    );
                }).catch(error => {
                    swal(
                        'Uh oh!',
                        'We were unable to revert your import.',
                        'error',
                    );
                });
            },
        },
    };
</script>