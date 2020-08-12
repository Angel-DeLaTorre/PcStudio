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
            console.log('token' + token);
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                if(details.status == 'COMPLETED'){
                return fetch('/api/paypal-capture-payment', {
                            method: 'post',
                            headers: {
                                'content-type': 'application/json',
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            body: JSON.stringify({
                                orderId     : data.orderID,
                                id : details.id,
                                status: details.status,
                                payerEmail: details.payer.email_address,
                            })
                        })
                        .then(status)
                        .then(function(response){
                            // redirect to the completed page if paid
                            console.log('realizado');
                            window.location.href = '/pay-success';
                        })
                        .catch(function(error) {
                            // redirect to failed page if internal error occurs
                            window.location.href = '/producto/detail/11?reason=internalFailure';
                        });
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
        if (!res.ok) {
            throw new Error(res.statusText);
        }
        return res;
    } 
});