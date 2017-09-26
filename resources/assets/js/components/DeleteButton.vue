<script>
    import axios from 'axios';
    import swal from 'sweetalert2';

    export default {
        props: ['action'],
        methods: {
            prompt() {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(response => {
                    console.log('Yes, delete it!');
                    this.commit();
                })
            },
            commit() {
                console.log('Sending..');
                axios.delete(this.action).then(response => {
                    console.log('Deleted!');
                    swal(
                        'Deleted!',
                        'User has been deleted.',
                        'success'
                    );
                    window.location.href = response.data.action;
                }).catch(error => {
                    console.log('error..');
                    swal(
                        'Uh oh!',
                        'We were unable to delete the user',
                        'error',
                    );
                });
            }
        }
    };
</script>

<style>

</style>