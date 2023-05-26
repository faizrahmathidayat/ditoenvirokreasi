<script>
    var is_active_popup = '<?= !empty(get_main_popup()) && get_main_popup()->is_active ? get_main_popup()->is_active : false ?>';
    if (is_active_popup == 1) {
        $('#modal_home').modal('show');
    }
</script>