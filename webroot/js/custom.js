$(document).ready(function () {
    $(function () {
        $abc = $('input[name="isAdmin"][value=1]');
        $abc.bootstrapSwitch('state', true, true);
        $abc.bootstrapSwitch('onText', 'Yes');
        $abc.bootstrapSwitch('offText', 'No');
    });

    $('.input-group.date').datepicker({
        format: "dd/mm/yy",
        autoclose: true,
        todayHighlight: true,
        toggleActive: true,
        orientation: "top left"
    });
});