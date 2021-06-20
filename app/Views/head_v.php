<html lang="en">
    <head>
        <meta charset="us-ascii">
    <!-- Required meta tags -->
    
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" type="image/jpg" href="img/favicon-32x32.png"/>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
        <!-- Bootstrap-table CSS -->
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <!-- Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


        <title>X-MEN</title>
        <style>
            body {
                margin: 20px;
                padding: 20px;
            }
            .hr100 {
                margin-bottom: 100px;
            }
            .contaner-section{
                height:20%;
                clear: both;
            }
            .header-wrapper{
                min-height:110px;
                background-color:#fff;
                margin-left:auto;
            }
            #wrapper_form_add_skill{
                padding: 15px;
                display:none;
            }
            .select2-container{
                width:100% !important;
            }
            .select2-selection--single{
                height:30px !important;
            }
        </style>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Bootstrap-table JS -->
        <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
        <!-- Toastr -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <!-- Select2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            const configTable = {
                striped:true,
                sidePagination:'client',
                smartDisplay:false,
                cookie:true,
                cookieExpire:'1h',
                showExport:false,
                exportTypes:['json', 'xml', 'csv', 'txt', 'excel'],
                showFilter:true,
                flat:true,
                keyEvents:false,
                showMultiSort:false,
                reorderableColumns:false,
                resizable:false,
                pagination:true,
                cardView:false,
                detailView:false,
                search:true,
                showRefresh:true,
                showToggle:true,
                clickToSelect:true,
                showColumns:true,
                pageSize:5,
                pageList:[5, 10, 25, 50, 100, 200, "All"]
            }

            // config toastr
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            function ajaxBTbl(params,url){
                $.ajax({
                url,
                method:"get",
                success:function(res, textStatus, XHR){
                        params.success(res)
                    }
                });
                
            }
        </script>
    </head>
    <body>
        
        <div class="row sticky-top header-wrapper">
            <div class="row" style="width:100%">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1>X-MEN</h1>
                    <p>
                        Ini adalah X-MEN, ini adalah tentang para pahlawan pembela bumi.
                    </p>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row" style="width:100%">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url() ?>">Daftar Superhero</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("home/married_simulation") ?>">Simulasi Menikah</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("home/skills") ?>">Daftar Skills</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-2"></div>
            </div>
            <hr class="hr100">
        </div>