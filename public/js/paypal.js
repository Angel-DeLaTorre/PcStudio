$(document).ready(function(){
    amount = $('#costo').val();
    console.log(amount);

    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: amount
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log('Token: ' + token);
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                if(details.status == 'COMPLETED'){
                    //se ha realizado con exito
                    //mover a pagina de realizado
                }else{
                    window.location.href = '/producto/detail/11?reason=failedToCapture';
                }
            });
        },
        onCancel: function (data) {
            window.location.href = '/producto/detail/11?reason=userCancelled';
        }
    }).render('#paypal-button-container');

    function status(res) {
        console.log(res);
        if (!res.ok) {
            throw new Error(res.statusText);
        }
        return res;
    } 
});