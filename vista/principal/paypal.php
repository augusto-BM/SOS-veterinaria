<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paypal</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AbaicJZLFJBWTkfVM_qEuHXbNbP8q5JNuyxsN-OKTmEzHIfQJJFwq44Hhpy3H7iUvsLB4FLvb1A3Alnw&currency=MXN">
    </script>

</head>
<body>
    <div id="paypal-button-container"></div>

    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                chape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions){
                return   actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: 100
                        }
                    }]
                });
            },

            onApprove: function(data, actions){
                actions.order.capture().then(function(detalles){
                    window.location.href="completado.html";
                });
            },

            onCancel: function(data){
                alert("Pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>
</body> 
<script src="https://account.snatchbot.me/script.js"></script><script>window.sntchChat.Init(252214)</script> 

</html>