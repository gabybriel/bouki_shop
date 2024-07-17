<style>
    #invoice-POS {
        padding: 2mm;
        margin: 0 auto;
        width: 80mm;
        background: #FFF;

        ::selection {
            background: #f31544;
            color: #FFF;
        }

        ::moz-selection {
            background: #f31544;
            color: #FFF;
        }

        h1 {
            font-size: 1.5em;
            color: #222;
        }

        h2 {
            font-size: .9em;
        }

        h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }

        p {
            font-size: .8em;
            color: #666;
            line-height: 1.5em;
        }

        #top,
        #mid,
        #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }

        #top {
            min-height: 100px;
        }

        #mid {
            min-height: 80px;
        }

        #bot {
            min-height: 50px;
        }

        #top .logo {
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
            background-size: 60px 60px;
        }

        .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }

        .info {
            display: block;
            margin-left: 0;
            font-size: 1.2em;
        }

        .title {
            float: right;
        }

        .title p {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 8px;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #invoice-POS,
            #invoice-POS * {
                visibility: visible;
            }

            #invoice-POS {
                position: absolute;
                left: 0;
                top: 0;
            }
        }

        .button-container {
            text-align: center;
        }

        .center-container {
            text-align: center;
        }
</style>

<body style="background-color: #222;">
    <div id="invoice-POS">
        <center id="top">
            <div class="logo">
                <img src="<?php echo e(asset('../assets/images/logos/logo.png')); ?>" width="180" alt="" />
            </div>
            <div class="info">
                <h2>Bouki Shopping</h2>
            </div><!--End Info-->
        </center><!--End InvoiceTop-->

        <div id="mid">
            <div class="info">
                <h2>Commande : <?php echo e($commande->num_commande); ?> </h2>
                <p>
                    <b>Client:</b> <?php echo e($commande->user->name); ?> <?php echo e($commande->user->prenoms); ?><br>
                    <b>Adresse:</b> <?php echo e($commande->adresse); ?><br>
                    <b>Ville:</b> <?php echo e($commande->ville); ?><br>
                    <b>Email:</b> <?php echo e($commande->user->email); ?><br>
                    <b>Phone:</b> <?php echo e($commande->user->phone); ?><br>
                    <b>Mode de paiement:</b> <?php echo e($commande->modepaiement); ?><br>
                </p>
            </div>
        </div><!--End Invoice Mid-->

        <div id="bot">

            <div id="table">
                <table>
                    <thead>
                        <tr class="tabletitle" style="font-size: 15px;">
                            <th class="item">
                                <h2>Taille</h2>
                            </th>
                            <th class="Hours">
                                <h2>Num</h2>
                            </th>
                            <th class="Rate">
                                <h2>Prix</h2>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $commande->cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="tableitem">
                                <p class="itemtext"><?php echo e($cartItem->article->taille); ?></p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext"><?php echo e($cartItem->article->numero); ?></p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext"><?php echo e($cartItem->price); ?></p>
                            </td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr class="tabletitle">
                            <hr>

                        </tr>
                        <tr class="tabletitle">
                            <td></td>
                            <td class="Rate">
                                <h2>Total : </h2>
                            </td>
                            <td class="payment">
                                <h2 style="font-size: 20px;"><?php echo e(number_format($commande->total, 0, ',', ' ')); ?> FCFA</h2>
                            </td>

                        </tr>
                    </tfoot>
                </table>
            </div><!--End Table-->

            <div id="legalcopy">
                <p class="legal"><strong>Merci pour votre confiance ! à bientôt</strong> <br>
                    Contact : +242 05 627 33 25
                    Web : www.boukishopping.com
                </p>
            </div>



        </div><!--End InvoiceBot-->
    </div><!--End Invoice-->


    <script>
        // Cette fonction sera exécutée automatiquement lorsque la page est ouverte
        function imprimerFacture() {
            window.print();
        }

        // Appeler la fonction dès que la page est prête
        window.onload = imprimerFacture;
    </script>


</body><?php /**PATH C:\xampp\htdocs\bouki\resources\views/tickets/show.blade.php ENDPATH**/ ?>