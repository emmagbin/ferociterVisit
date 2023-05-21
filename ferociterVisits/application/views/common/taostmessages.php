<script>
    var type = "<?php echo $this->session->flashdata('alert-type'); ?>";
    switch (type) {
        case 'success':
            toastr.success('<?php echo $this->session->flashdata('message'); ?>', 'success', {
                timeOut: 3000
            });
            break
        case 'info':
            toastr.info('<?php echo $this->session->flashdata('message'); ?>', 'info', {
                timeOut: 5000
            });
            break;
        case 'error':
            toastr.error('<?php echo $this->session->flashdata('message'); ?>', 'error', {
                timeOut: 5000
            });
            break;
    }
</script>