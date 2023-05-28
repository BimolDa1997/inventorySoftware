<!DOCTYPE html>
<!-- saved from url=(0052)https://dshop.drestora.com/Item/itemBarcodeGenerator -->
<html style="height: auto; min-height: 100%;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>RBD</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- jQuery 3 -->
        <script src="./DSHOP - Retail Shop Management Software_files/jquery.min.js.download"></script>
        <!-- Select2 -->
        <script src="./DSHOP - Retail Shop Management Software_files/select2.full.min.js.download"></script>
        <!-- Select2 -->
        <link rel="stylesheet" href="./DSHOP - Retail Shop Management Software_files/select2.min.css">
        <!-- InputMask -->
        <script src="./DSHOP - Retail Shop Management Software_files/jquery.inputmask.js.download"></script>
        <script src="./DSHOP - Retail Shop Management Software_files/jquery.inputmask.date.extensions.js.download"></script>
        <script src="./DSHOP - Retail Shop Management Software_files/jquery.inputmask.extensions.js.download"></script>
        <!-- iCheck -->
        <script src="./DSHOP - Retail Shop Management Software_files/icheck.min.js.download"></script>
        <link rel="stylesheet" href="./DSHOP - Retail Shop Management Software_files/all.css">
        <!-- Sweet alert -->
        <script src="./DSHOP - Retail Shop Management Software_files/sweetalert.min.js.download"></script>
        <link rel="stylesheet" href="./DSHOP - Retail Shop Management Software_files/sweetalert.min.css">
        <!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
        <script src="./DSHOP - Retail Shop Management Software_files/core.js.download"></script>

        <!-- Numpad -->
        <script src="./DSHOP - Retail Shop Management Software_files/jquery.numpad.js.download"></script>
        <link rel="stylesheet" href="./DSHOP - Retail Shop Management Software_files/jquery.numpad.css">
        <link rel="stylesheet" href="./DSHOP - Retail Shop Management Software_files/theme.css">
        <!--datepicker-->
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="./DSHOP - Retail Shop Management Software_files/datepicker.css">

        <!-- bootstrap datepicker -->
        <script src="./DSHOP - Retail Shop Management Software_files/bootstrap-datepicker.js.download"></script>

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="./DSHOP - Retail Shop Management Software_files/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="./DSHOP - Retail Shop Management Software_files/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="./DSHOP - Retail Shop Management Software_files/ionicons.min.css">

        <link rel="stylesheet" href="./DSHOP - Retail Shop Management Software_files/jquery.mCustomScrollbar.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="./DSHOP - Retail Shop Management Software_files/_all-skins.css">
        <!-- iCheck -->
        <link href="./DSHOP - Retail Shop Management Software_files/color-scheme.css" rel="stylesheet">
        <!-- Favicon -->
        
        <!-- Favicon -->
        <link rel="icon" href="https://dshop.drestora.com/assets/copyright/favicon.ico" type="image/x-icon">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://dshop.drestora.com/assets/plugins/local/html5shiv.min.js"></script>
        <script src="https://dshop.drestora.com/assets/plugins/local/respond.min.js"></script>
        <![endif]-->

        <!-- Theme style -->
        <link rel="stylesheet" href="./DSHOP - Retail Shop Management Software_files/AdminLTE.css">

        <!-- Google Font -->

        <link rel="stylesheet" href="./DSHOP - Retail Shop Management Software_files/google_font.css">
        <style type="text/css">
            .company_info{
                min-height: 41px;
                color: white !important;
                text-align: center;
                font-weight: bold;
            }

            .breadcrumb{
                padding: 0px 5px !important;
            }
            .btn-primary{
                background-color: #3c8dbc;
            }
            .form_question{
                font-size: 24px;
                color: #3c8dbc;
                padding-top: 7px;
            }
            .main-footer{
                padding: 10px !important;
            }
            .main-footer p{
                padding-top: 10px;
            }
            .left-sdide{
                float: left !important;
            }
            
            .navbar-nav > .user-menu > .dropdown-menu dropdown-menu-right{
                width: 50px;
            }
            .dropdown-menu{
                border: 1px solid #3c8dbc !important;
            }
            .loader{
                display: none;
            }
            @media only screen and (max-device-width: 767px){
                .width_notification{
                    width: 94% !important;
                }
            }

            #myModal .modal-title{text-align: left;}
            #register_details_body p{ text-align:left; margin:0px 0px 10px 0px;}
            input[type=number]::-webkit-outer-spin-button,
            input[type=number]::-webkit-inner-spin-button {
                -webkit-appearance: inner-spin-button !important;
            }
        </style>
        <script>
            jQuery(document).ready(function($) {
                $('[data-mask]').inputmask()
                $('.select2').select2()

                $('body').on('click', '.delete', function (e) {
                    e.preventDefault();
                    var linkURL = this.href;
                    warnBeforeRedirect(linkURL);
                });
                function warnBeforeRedirect(linkURL) {
                    swal({
                        title: "Alert!",
                        text: "Are you sure?",
                        cancelButtonText:'Cancel',
                        confirmButtonText:'OK',
                        confirmButtonColor: '#3c8dbc',
                        showCancelButton: true
                    }, function() {
                        window.location.href = linkURL;
                    });
                }
                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass   : 'iradio_minimal-blue'
                })


                $(document).on('keydown', '.integerchk', function(e){
                    return (
                    keys == 8 ||
                        keys == 9 ||
                        keys == 13 ||
                        keys == 46 ||
                        keys == 110 ||
                        keys == 86 ||
                        keys == 190 ||
                        (keys >= 35 && keys <= 40) ||
                        (keys >= 48 && keys <= 57) ||
                        (keys >= 96 && keys <= 105));
                });

                $(document).on('keyup', '.integerchk', function(e){
                    var input = $(this).val();
                    var ponto = input.split('.').length;
                    var slash = input.split('-').length;
                    if (ponto > 2)
                        $(this).val(input.substr(0,(input.length)-1));
                    $(this).val(input.replace(/[^0-9]/,''));
                    if(slash > 2)
                        $(this).val(input.substr(0,(input.length)-1));
                    if (ponto ==2)
                        $(this).val(input.substr(0,(input.indexOf('.')+3)));
                    if(input == '.')
                        $(this).val("");

                });



            });
        </script>
        <script>
            $(function () {

                //Date picker
                $('#date').datepicker({
                    format: 'dd-mm-yyyy',
                    /*format: 'yyyy-mm-dd',*/
                    autoclose: true
                });
                $('#dates2').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true
                });
                $('.customDatepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true
                });
                $('.customDatepicker1').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true
                });
                $(".datepicker_months").datepicker({
                    format: 'yyyy-M',
                    autoclose: true,
                    viewMode: "months",
                    minViewMode: "months"
                });
            })

            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();

            if(dd<10) {
                dd = '0'+dd
            }

            if(mm<10) {
                mm = '0'+mm
            }
            today = yyyy + '-' + mm + '-' + dd;
        </script>
    <link rel="shortcut icon" href="" type="image/x-icon"></head>

        <body class="skin-blue sidebar-mini sidebar-collapse" style="">

               

            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="min-height: 1219px;">
                <!-- Main content -->

                <script src="./DSHOP - Retail Shop Management Software_files/JsBarcode.all.js.download"></script>
<style type="text/css">
    .top-left-header{
        margin-top: 0px !important;
    }
    .box-primary{
        border-top-color: white !important;
        margin-top: 5px;
    }
</style>

<section class="content-header">

</section>
<h1>
    </h1>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div id="printableArea">
                                            <table style="float: left;margin-left: 10px;margin-bottom: 30px" class="table-responsive">
                            <tbody><tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <b>Dream Tech</b></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <span>test</span></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 13px"> <span>7c0ff45pal43305t6785</span></td>
                            </tr>
                            <tr>
                                <td> <img style="min-width: 139px;" id="barcode19060" src="data:image/png;base64,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"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 18px;"><span>tk500.00</span></td>
                            </tr>
                        </tbody></table>
                                            <table style="float: left;margin-left: 10px;margin-bottom: 30px" class="table-responsive">
                            <tbody><tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <b>Dream Tech</b></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <span>test</span></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 13px"> <span>7c0ff45pal43305t6785</span></td>
                            </tr>
                            <tr>
                                <td> <img style="min-width: 139px;" id="barcode19061" src="data:image/png;base64,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"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 18px;"><span>tk500.00</span></td>
                            </tr>
                        </tbody></table>
                                            <table style="float: left;margin-left: 10px;margin-bottom: 30px" class="table-responsive">
                            <tbody><tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <b>Dream Tech</b></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <span>test</span></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 13px"> <span>7c0ff45pal43305t6785</span></td>
                            </tr>
                            <tr>
                                <td> <img style="min-width: 139px;" id="barcode19062" src="data:image/png;base64,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"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 18px;"><span>tk500.00</span></td>
                            </tr>
                        </tbody></table>
                                            <table style="float: left;margin-left: 10px;margin-bottom: 30px" class="table-responsive">
                            <tbody><tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <b>Dream Tech</b></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <span>test</span></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 13px"> <span>7c0ff45pal43305t6785</span></td>
                            </tr>
                            <tr>
                                <td> <img style="min-width: 139px;" id="barcode19063" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQgAAAAeCAYAAADQDoDNAAAAAXNSR0IArs4c6QAACgdJREFUeF7tXet66yAMW/v+z7yejwBFCNlAEtJ2p/u1dbkQY2RZNunt8Xg8fpqf8NGt+vR2i3+Hw2/328/jN54WPg+f4Rn52OfxeG76Hf/HQ8jXxHvivfLveYDbmOAePz/h73sca/V5eaR8D7zu6LF57DNj2q4dTPiINlTnKtviJHjn3cM8pPnBcywb4vPn42ftjfbluea5ycfiXCt787h4nvJ9wrNuzwxzzPdM5n4eg/Zju3r+MPJsbHPle+pZcMzKF9Fn1BhxLSjb8jqzfLzFgPjJrQBECwqWo1kDZUd7HUAU4Bpd9GVCg9P9VvaynHQaINJVXYBITr9d+37bAMVyIuVQCmzjPIRnuj0B/XyAiHbD4KCc8yyAkIsJ7KuC1BBAPKLdZ8FvGUDQM1m+k23trUEvYA4AhHVIQhJiAWqg7eBqp7GMrhlEcLb7dknPKAqE2HlCJPklovQSBjELEMC2PDv0mJI693yASOxSjBkZ4RGAYJbETBOBdDdAACtGgFZMJfhUZjGnAsRvZOn4wwzMC1qZQbM9rgMIkWKwgdRkDQNEuv4s5bUWAqMrAkgFJiliWylPPnYPaLHDmmNABvE2ABFTNs/hGKitY9G2Ki0aSzFaNqQWkxoDzqH3f5dBQKpoAe1pKQYElRenGBVgNX/gYn2fFCPOlDcZ8ylGYSyR3xda/v8CREzZzgaIIxoEs8Q4ttYfELiGUgxkEOKZvaie/8fMpseAvcDWAzHlk8/PBJC5GoRQGUCDWA0QbY6qhCs18T0D7wOIIGJGrcGaUJ7wZjIgX60iU5AOAk10xFm8L4/Bc2TvPHQ0HLvlgLZeoUXUvQARmEKg44od8Jg9BuGmGFmRzEK6KYbXbMgCkP0aREg77s/nVbavfCUZtfJxN8Wo2ZMLEHDtno9bq/9CgGhz1HGAsI2CE4yTgU65fR6qLpDWfTWIKMThz1hKV4B+dhFNAUSKZiMCsSWM9qsYNePgQKRYE9pr3H99wF3GIDoAsZk42dkqUXwIQAgDg8LfMohU5gQk7ukKPaGPo/osq/kMDSLoDDFlU0xlL4M4LFImcLcAzAIINV4reseyuGaUHISs6yJr+2oQwomY1qrorlB5o58AzYoOYd2bJ3lfilEiKN/PGo+icyrCjTx3kDdyOQ0Xo3U9j6r2wC0Yl/tWLHFthBJj5JyJsnzP/SJlDWDnAETyh9kyJwj21wDEN8V45qpWzrkaIHpsw15EMQLnBdnXIHTUukKDyCkYpxhYEu6B39IUIw3sSIoRaVDRg0y7JqZ5OMWgtMhL2bJvIxupA0XyJZEmWOxuGz+MwWN8uS8G51/9/nYphuqQG6W8auFaqu3T8UTE2A8QrdKv6Kn1PJzTqsiomFSXQYheEs0gVqcYBRAVG2PHdxeCUW2w7N1jZp4m1U8xYlS/hkHY6R8yX8XsPD+xgMIHCFAuOBoqJ0cDMXqNTNxeA5+dYvQBIqjyv5tL9KLs2QDRLBqjZ4TnQkXHfSJlEZtj5+Q9VRfnOylHUgxkOq4GMVzFqEu2OD+HGQSxnjHRN57k3dsbowe0PoMQOywQJTIT0XsxWjz56wCRu+Jwsp6LjBrD1ITiRDEoKCoejz+WYnhs6xqAKKXcfpQ9XuZcK1LamlROuyytwwoofxoguOxxLkCk8hLlfp/DIObbv5nyKfo8kmJ450lwo81qKMgeZxDvDBAlhx+x67EUoy0Xt6y2bCDkYLKMQWzLLLJd3tjGc78vxYCzsoNz/7mnho9EUuv8mTLRdIrhVBCsRcYC16wustlvZDfnCa3WamdtPd6YGgwBBJUYme4eqWIofYj94bBICY1Tnvg7BhC+cDgU4IQ9lwFEGhACpKXJaYB44G5OC0Pi5z6DaEUazn8UBWVkHzIwlFete2CU7YqURzopX6BBrBUpy5Z+xVTY3ip18mi4WvwMyGsAogbEXqqALEv5mLIDrh4+3w8mpVlL+a11r3iPUvJUdvTmaxmDUHTteTOnxPJJAHF+H0TZmRrskK9vRS0v0qmFe0oVI7EqFc1Gdgeq+VVsozhmaXlGZ+0CxFa2vGizltGMZwLERJlTgdQ8QJSKxmcARLJcefgj273bl70ousmOaanBvcpEb5GdkmIA5asWOpVaXwIQSTR9y05KYo2jir8XfTHiW0FvJn3azyDimb1n8lJ7xZKxz0KnGDXrx/FXz3J+FUNvDf4kBtEDEx1loXy2c7OWcgJ25GUMgtJIdR+Pso4xiHfrg1i/F2Ok8WwEIHCRW13Fip0pFsdswwKHzQc2gPBfJrWdb2oQRqspO9NlAAEi0AwrmDn2aWBrNyftKFS5urnQm5JqKfBzlDlS5rQ6KbvgR6LfTJQd1SC44afH3rSmcG0Vg4Vh5U+aAR/RIBamGN8+CLvu3TCIZX0QegyvSzGESPmtYjxTgJ64mYMiipQjDKI55vAbpfrv7xgTKc0qRksp/CpGWwe+hkHU/RRN9Lt8N2cbtSzm5KUKqwCCGUebSnVarZ0XkIylGPUW888rc/qvgVMAsdmFWC0yclwn6BM9MPLKv3x9rUGkNdvJHqpWa+/YFiDaXWXeRpHQBMAvNWVxaDOmeFuxRa0tEFKG9nWFmBuPlkRnaPgSgBCv/PPGbuW4yibus70bQFCbufIHzsGtxTnWB7ETINzt8yenGO5mrfY9r57+UDSI3lFPDaJ+WUhZiKIPgpzpPA2irv3ydbPT4wtjkMIxyrdgctFbrYV+sV+ktCeegQPpb7ZVDgzWscFGPVX8yyDKItpsLNirVYWzAByXpVVpQcDb5nN4N6ctPVZ6ymGR8i2/F6N+jdwcQOA7KeMUeXRutPTKYp66rnICdpL/plGKegqahbBgNyf3p/QE2GVvtXa+64PZtLLLSN/KmAZRfS+GTyPeU4OIY/YU49G0YVcV4wWdlB6wZFvoVuvV34sx9tp7tSUZnbXbKDXQM6CqRr3o7aUYzWYtkWrh6mled9h5Q9cRBpEDxvMaEwxiIHE4q9W6Fjws5MWJK0bH2nh8OqTB6PT4HQTePdq0QbGCE15a2wEI3M7MFH0vgxgBCJz4kRQjomz6op6J7yGxFqJFjUfLnBZgeM+i7pk/q5nZ6pfW2i9B7oGU8lv9DPkeK1qtayVy+QtjeBu1+jISS0D0cuK3BoidjVJNinHqN2uVmrkShz0Kj/9DxrYbICjK7WEQSszmxeQtLgvErEXKz8p2YFBuGenO3ZwGW2nBptbO1PoIY7K+orGMfxogSlRXRokD/eObtUQfhLWfQjmpWkjTDEK8V3KMKekNWBzN87Wsuv0lIiUJt8pGM3T8vQAiCr35G95wAVvPBO/Akd8vyuVwBlr1/FbKjQBXgV3Tam3UOr8ahO5au1qkXJZiTLRab6xQlBh7UfY9Uow1b5Ta30kZlyOLj8FW+wEipVFOWVqKlM3af/z8A2J7nAzrqrWXAAAAAElFTkSuQmCC"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 18px;"><span>tk500.00</span></td>
                            </tr>
                        </tbody></table>
                                            <table style="float: left;margin-left: 10px;margin-bottom: 30px" class="table-responsive">
                            <tbody><tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <b>Dream Tech</b></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <span>test</span></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 13px"> <span>7c0ff45pal43305t6785</span></td>
                            </tr>
                            <tr>
                                <td> <img style="min-width: 139px;" id="barcode19064" src="data:image/png;base64,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"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 18px;"><span>tk500.00</span></td>
                            </tr>
                        </tbody></table>
                                                                <script>JsBarcode("#barcode19060", "7c0ff45pal43305t6785", {  width: 1,
                                height: 30,
                                fontSize:12,
                                textMargin:-18,
                                margin:0,
                                marginTop:0,
                                marginLeft:10,
                                marginRight:10,
                                marginBottom:0,
                                displayValue: false
                            });
                        </script>
                                                <script>JsBarcode("#barcode19061", "7c0ff45pal43305t6785", {  width: 1,
                                height: 30,
                                fontSize:12,
                                textMargin:-18,
                                margin:0,
                                marginTop:0,
                                marginLeft:10,
                                marginRight:10,
                                marginBottom:0,
                                displayValue: false
                            });
                        </script>
                                                <script>JsBarcode("#barcode19062", "7c0ff45pal43305t6785", {  width: 1,
                                height: 30,
                                fontSize:12,
                                textMargin:-18,
                                margin:0,
                                marginTop:0,
                                marginLeft:10,
                                marginRight:10,
                                marginBottom:0,
                                displayValue: false
                            });
                        </script>
                                                <script>JsBarcode("#barcode19063", "7c0ff45pal43305t6785", {  width: 1,
                                height: 30,
                                fontSize:12,
                                textMargin:-18,
                                margin:0,
                                marginTop:0,
                                marginLeft:10,
                                marginRight:10,
                                marginBottom:0,
                                displayValue: false
                            });
                        </script>
                                                <script>JsBarcode("#barcode19064", "7c0ff45pal43305t6785", {  width: 1,
                                height: 30,
                                fontSize:12,
                                textMargin:-18,
                                margin:0,
                                marginTop:0,
                                marginLeft:10,
                                marginRight:10,
                                marginBottom:0,
                                displayValue: false
                            });
                        </script>
                                                <table style="float: left;margin-left: 10px;margin-bottom: 30px" class="table-responsive">
                            <tbody><tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <b>Dream Tech</b></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <span>Test</span></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 13px"> <span>001905</span></td>
                            </tr>
                            <tr>
                                <td> <img style="min-width: 139px;" id="barcode19050" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFgAAAAeCAYAAAColNlFAAAAAXNSR0IArs4c6QAABNpJREFUaEPVWtuWnDAMg/n/bx56nNhEviXOMNtt56VdCBAUW5YVzuu6rsP96NCpjp6v8ziu46Dh53m2f+lH/5efPSZj6bw996b7wPV4Hq+Ta+lpr/bc9z23aB7ZvHAsztvPsb+7fS+5Xo6HsHkgjzMG2I/EG38DYJlgA80sQASwgIIvNuZBi/5qk74B5oCQY3WA+7vPAKbAoACZ/SREvwMwPZGjO4oOnJCNgOjvfYAHILsRTEDRIuPirAC2Y0cKu8T/hQgGqukvQpF3KQpRABMzvQcdxRHcAY4WktKdaMVH8HiuXWShI6Q+mqfcJwW4x5ki10UEj+E1iuj8aMdGHKwiLQARUxT5egZw9JyPKOI6jlZzWgT0Bf4BDtZrgaBRSr0pqs7BfRmIFUqw12IE26j8BsAYoU8owkuBoHZlRc6FOvBUqcjByqcRDJGyUhGuyPG1MzWiU3won6hOfIWDg6oXUsQAd5citHRrkdg4V+RVUoyQIl7nnZIIkAOYK30kDWdFSu7paAzmsFPkIqwQ5++oCL5jWQcbzg0pwsisGcCY8rsqAulIssECLDQS6fogaNWhHwc40rl50eucXpJpTBFxBHNtaPIxUxFDmt3R3OoK1zbTQIVFrkDCWwBLwRHJEqXSit/syzzRwa3Ymo5SA94Fuu0+V3NMKYLUBKuL/6aTizi6FMEhB3uu9zJNt8KjTowucIeDf5AitOZtL8IpNtXBrtHgBgFkXx3gLv5tRNaKXN5o/BLAekJWHmW8+lQH033/eqPhvAjqBHVteEYRLYsWjcZDN40m6Ko/FK7MpfONxvsgX876CZlZ0wKBnTmkD2mprYyTBe5OXu/oMJg8RRjcPnLTWKs+KnJJcZLCVQfYa+9Zit8ul2mcLGjy/FbYubjVANaQs4rI9YabEDysBHDAublM641IyMFGlsmztxsNfqERiT39M4B/0IswKxG2ymT1vVrK3RM07W/IwZVGwxn5QyNjGlcBRklni6JPe++xyMJbXb+lIma6ueamQboyiOtGY2FXBmb8APh1vMmKTHZG+jjdaOxSBPL0yKwhB3OAWQ4qDp4gjL6tNns6QD7tx4utKMGetxTxREWM5mhh9gReBO8jqEbF+s4IMMJ3L+RWkTPeaImDVdUNtnbaed0glHVwUGyfeBFWoQh42Am2TDaLMaOJrVbZpksDmN0yuyuBY3FCEScPz3fDiwg6ub0djcCLgH02pWIWKmJKrfUI/vcajbUXMYov+ifrIje2smIO1m31IoLBQkpH6tRuHGzaYpvmKoLvQpXv/u4a7tIsVFUE1o0awPpzhPmWURDDIgdHBM+9t54y3vqT7yWyQoaUMPNtdwEWkBzAbuH9txwlgFm/2yK57uR0lH7MwVMvgicX7XdVdHG5yAUfwMiHKbNWuQSw6PDFpufKEv4YYE8R+usdbDHLMq3iRRhT3AK6VhGsT82XSjTHbEfDqQjQ5p5VtVgrABz7p/itAsqZVXTgJ1h2LCmR6Y4GyLKUIlgJSIMTKR+5FtMfgyCSn5aDx2KQaXVqbwzMshvgZajv7irzKs/tylgXP6MIbf7MAI4Lce+bKBBco1HZ0WAgk0Yj6kXaNJQhojs5qba0fePbVtv5rFvnxOwxulc0uM0kRxFBcxTblRlF6MJeKXKI4h/gN54PqHkhlgAAAABJRU5ErkJggg=="></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 18px;"><span>tk1000.00</span></td>
                            </tr>
                        </tbody></table>
                                            <table style="float: left;margin-left: 10px;margin-bottom: 30px" class="table-responsive">
                            <tbody><tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <b>Dream Tech</b></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <span>Test</span></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 13px"> <span>001905</span></td>
                            </tr>
                            <tr>
                                <td> <img style="min-width: 139px;" id="barcode19051" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFgAAAAeCAYAAAColNlFAAAAAXNSR0IArs4c6QAABNpJREFUaEPVWtuWnDAMg/n/bx56nNhEviXOMNtt56VdCBAUW5YVzuu6rsP96NCpjp6v8ziu46Dh53m2f+lH/5efPSZj6bw996b7wPV4Hq+Ta+lpr/bc9z23aB7ZvHAsztvPsb+7fS+5Xo6HsHkgjzMG2I/EG38DYJlgA80sQASwgIIvNuZBi/5qk74B5oCQY3WA+7vPAKbAoACZ/SREvwMwPZGjO4oOnJCNgOjvfYAHILsRTEDRIuPirAC2Y0cKu8T/hQgGqukvQpF3KQpRABMzvQcdxRHcAY4WktKdaMVH8HiuXWShI6Q+mqfcJwW4x5ki10UEj+E1iuj8aMdGHKwiLQARUxT5egZw9JyPKOI6jlZzWgT0Bf4BDtZrgaBRSr0pqs7BfRmIFUqw12IE26j8BsAYoU8owkuBoHZlRc6FOvBUqcjByqcRDJGyUhGuyPG1MzWiU3won6hOfIWDg6oXUsQAd5citHRrkdg4V+RVUoyQIl7nnZIIkAOYK30kDWdFSu7paAzmsFPkIqwQ5++oCL5jWQcbzg0pwsisGcCY8rsqAulIssECLDQS6fogaNWhHwc40rl50eucXpJpTBFxBHNtaPIxUxFDmt3R3OoK1zbTQIVFrkDCWwBLwRHJEqXSit/syzzRwa3Ymo5SA94Fuu0+V3NMKYLUBKuL/6aTizi6FMEhB3uu9zJNt8KjTowucIeDf5AitOZtL8IpNtXBrtHgBgFkXx3gLv5tRNaKXN5o/BLAekJWHmW8+lQH033/eqPhvAjqBHVteEYRLYsWjcZDN40m6Ko/FK7MpfONxvsgX876CZlZ0wKBnTmkD2mprYyTBe5OXu/oMJg8RRjcPnLTWKs+KnJJcZLCVQfYa+9Zit8ul2mcLGjy/FbYubjVANaQs4rI9YabEDysBHDAublM641IyMFGlsmztxsNfqERiT39M4B/0IswKxG2ymT1vVrK3RM07W/IwZVGwxn5QyNjGlcBRklni6JPe++xyMJbXb+lIma6ueamQboyiOtGY2FXBmb8APh1vMmKTHZG+jjdaOxSBPL0yKwhB3OAWQ4qDp4gjL6tNns6QD7tx4utKMGetxTxREWM5mhh9gReBO8jqEbF+s4IMMJ3L+RWkTPeaImDVdUNtnbaed0glHVwUGyfeBFWoQh42Am2TDaLMaOJrVbZpksDmN0yuyuBY3FCEScPz3fDiwg6ub0djcCLgH02pWIWKmJKrfUI/vcajbUXMYov+ifrIje2smIO1m31IoLBQkpH6tRuHGzaYpvmKoLvQpXv/u4a7tIsVFUE1o0awPpzhPmWURDDIgdHBM+9t54y3vqT7yWyQoaUMPNtdwEWkBzAbuH9txwlgFm/2yK57uR0lH7MwVMvgicX7XdVdHG5yAUfwMiHKbNWuQSw6PDFpufKEv4YYE8R+usdbDHLMq3iRRhT3AK6VhGsT82XSjTHbEfDqQjQ5p5VtVgrABz7p/itAsqZVXTgJ1h2LCmR6Y4GyLKUIlgJSIMTKR+5FtMfgyCSn5aDx2KQaXVqbwzMshvgZajv7irzKs/tylgXP6MIbf7MAI4Lce+bKBBco1HZ0WAgk0Yj6kXaNJQhojs5qba0fePbVtv5rFvnxOwxulc0uM0kRxFBcxTblRlF6MJeKXKI4h/gN54PqHkhlgAAAABJRU5ErkJggg=="></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 18px;"><span>tk1000.00</span></td>
                            </tr>
                        </tbody></table>
                                                                <script>JsBarcode("#barcode19050", "001905", {  width: 1,
                                height: 30,
                                fontSize:12,
                                textMargin:-18,
                                margin:0,
                                marginTop:0,
                                marginLeft:10,
                                marginRight:10,
                                marginBottom:0,
                                displayValue: false
                            });
                        </script>
                                                <script>JsBarcode("#barcode19051", "001905", {  width: 1,
                                height: 30,
                                fontSize:12,
                                textMargin:-18,
                                margin:0,
                                marginTop:0,
                                marginLeft:10,
                                marginRight:10,
                                marginBottom:0,
                                displayValue: false
                            });
                        </script>
                                                <table style="float: left;margin-left: 10px;margin-bottom: 30px" class="table-responsive">
                            <tbody><tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <b>Dream Tech</b></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font: ;-size: 13px"> <span>TANGAIL TATH</span></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 13px"> <span>001001</span></td>
                            </tr>
                            <tr>
                                <td> <img style="min-width: 139px;" id="barcode19040" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFgAAAAeCAYAAAColNlFAAAAAXNSR0IArs4c6QAABMxJREFUaEPVWluS4yAMBN//zGEKhIzQG8czW7s/O3GMA02r1RKurbVWxr9WWqml9k8VrpTxN1y/rjo+99vrVUv7wLD+d2l9QINrtZRa4QHjXvJ3H3GRz2N8vWDsnEa//57S+H59ps+Csfrv3N/BtMSzt+f0KV91LPmDUJBn43WcBx97YzUh4//VBbBxx7y8L+YqrX0A4LlIBDSzcLoYDbTXAJ5cQeBUkOam980nXLtBx+vWWIHaJCjyVAC8CEypLNlCGYc/wq9xBnc6AWNhMTqjLQa3ctVrjIHNrQGDITL4xss5rbX1jcDg5cRBgHsEIug7QhpBW3nIYBm2LoO7iqCkCIlYYY7sf5PBfF4dxE2mpkSs+wA2C2CQRMJ20FEz/G2AmRaPBxNdzTBYLIbpJmd0BmBLXpbU7OwWDP70HDJ1f+YMjZWYG2D8Z0Texv451hfWnsIoXTCvKaN4QuEJ7USDrXszAG9jaeI1IsOXCCk1uPSxXpIk0xq8YfcrErHrrJf5eULMAoxaGbqIudjBoSkFsUTAIFMi2EYmGRzLNbVTmnWSrOw63UOLaKzQuz156gBTxyItHQ1hjd26REjdp/cdA+zAtyRCuYleEhJBfCvuomDW0Dt/MU9tGnUgHiu/kggSAZtEkKSdY3BMYGGJMklut0RT71gW3gEGeYFnr2x+2zJnrFawzGAnnh2iIYqqYwY7KOdchFI1LYB1v4nMOdFgZOVjmybsYK/Q2l2hWYmKz/F7gBdj0z6YWpmcBstS2UpqWhjTbK4VMPxZciPPCw2+sTgHjEStSMlJBGqNY5kzGhxXcpjUIAE+dRHx7ywnc2/eTLBeJWcCPHPJ1wB7u3HuIg4YzEIbNRc3QLNl/TseVdLJwIp4IymSrUgieGPIxU1t9rCGxc60VdVoE4lDN3YVjzV4dsT6L3QQZ53gAqz1QyKA6aYdSQRst9QJPom/12C94uJR5TL4G4mYbddYInbwoNtL6QJXVCU+0uBECeslLuy09amM3vPtua1CY+87e5H1SINTABu4ef3guNBQkkmmEU51cW4G1dmMRGhR1ZsHUZ/69wBeYrHh9qzhLtuVcZcLerPY7luAvnWiobO7/ybfPN5y5MXOaleukxqMJM0zCx2mOazRLrNV0bEewnsaTBtDS2czDM4m07SLYOXvUbNH4Pag0DjS4O2sjDJr77QtkPbQ/icA0yMjPHn5q3al5SLodS2D33p3cKLRve1nNLNpL2LKi3MaYnnbNIM3gJ+3KzmZFRehOzvOYG7+XYCZ2dfvfUsighMNdtLNpQZXzyVibLwy9twHEy+8doMeOIIlirpp9LjbAl9bHH02fq9ZuhE9wg7+Ry5CUJ29g4BeFRf5PYOXDGgarFVc9onGbh+FiwgOXt1KThx6KrUZAe+WCMtA8JChnSVtIro/pf0AxU6JXgSA7TE4dBETiL/WYC4ZertSsR30fQbUIw1gbeHRiyYaCD7AynsRRjMen40bbxcaS15cBj87k4uk+q0XT1ahIXSVvHb1zKbZhcZ4XtCLsF6dwg1Sm/VR2ItehINzzgdnmGX3E7gk4GerXZk5VebRkyqVSWHlAox4eT2cV0pl5SW7t1zEkiP/tasTH0z7yMLJTFZalRwfa3JyPucHLzDGC0uLshQAAAAASUVORK5CYII="></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;width: 15px;font-size: 18px;"><span>tk1270.00</span></td>
                            </tr>
                        </tbody></table>
                                                                <script>JsBarcode("#barcode19040", "001001", {  width: 1,
                                height: 30,
                                fontSize:12,
                                textMargin:-18,
                                margin:0,
                                marginTop:0,
                                marginLeft:10,
                                marginRight:10,
                                marginBottom:0,
                                displayValue: false
                            });
                        </script>
                                        </div>
                <br><br><br><br><br><br><br><br><br>
                <div class="clearfix"></div>
                <div class="col-md-2">
                    <div class="form-group">
                        <a onclick="printDiv(&#39;printableArea&#39;)" class="btn btn-block btn-primary pull-left">Print</a>
                    </div>
                </div>
                

                <br><br>

            </div>
        </div>
    </div>
    </section></div>


<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer"><div class="row"><div class="col-md-12" style="text-align: center; font-weight: bold;">Dream Tech<div class="hidden-lg"></div></div></div>
            </footer>
        
    
        
  
      
    


</body></html>