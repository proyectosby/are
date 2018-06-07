// yii.allowAction = function ($e) {
        // var message = $e.data('confirm');
        // return message === undefined || yii.confirm(message, $e);
    // };
    // yii.confirm = function (message, $e) {
        // bootbox.confirm({
            // title: 'Confirm',
            // message: 'Are you sure?',            
            // callback: function (result) {
                // if (result) {
                    // yii.handleAction($e);
                // }
            // }
        // });
        // // confirm will always return false on the first call
        // // to cancel click handler
        // return false;
    // }
	
	// --- Delete action (bootbox) ---
yii.confirm = function (message, ok, cancel) {

    bootbox.confirm(
        {
            message: message,
            buttons: {
                confirm: {
                    label: "Confirmar"
                },
                cancel: {
                    label: "Cancelar"
                }
            },
            callback: function (confirmed) {
                if (confirmed) {
                    !ok || ok();
                } else {
                    !cancel || cancel();
                }
            }
        }
    );
    // confirm will always return false on the first call
    // to cancel click handler
    return false;
}