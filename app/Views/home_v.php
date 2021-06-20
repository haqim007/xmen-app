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
            }
            #wrapper_form_add_skill{
                padding: 15px;
                display:none;
            }
        </style>
    </head>
    <body>

    <div class="wrapper wrapper-content">
        <div class="row sticky-top header-wrapper">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1>X-MEN</h1>
                <p>
                    Ini adalah X-MEN, ini adalah tentang para pahlawan pembela bumi.
                </p>
            </div>
            <div class="col-md-2"></div>
            <hr class="hr100">
        </div>
        


        <!-- Daftar SuperHero Start -->


        <div class="row container-section">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            Di bawah ini adalah Daftar orang-orang yang super hebat itu.<br>
                            Kamu bisa mencari nama mereka melalui fasilitas pencarian di sebelah kanan.<br>
                            Kita beruntung memiliki data-data mereka. Jangan sampai jatuh ke tangan musuh, ini akan mengubah dunia..
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <h3>Daftar Superhero</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div id="toolbar">
                                <div class="form-inline" role="form">
                                    <div class="form-group">
                                        <button class="btn btn-primary show_superhero_form" data-action-type="create" data-id="0">Tambah Superhero</button>
                                    </div>
                                </div>
                            </div>
                            <table class="table" id="superhero-table"></table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- Daftar SuperHero End -->
    </div>

        
    <!-- Modal Form Edit Superhero -->
    <div class="modal fade" id="modal_form_superhero" tabindex="-1" role="dialog" aria-labelledby="title_form_superhero" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_form_superhero">Detail Superhero</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_superhero">
                    <div class="row" style="margin-bottom:10px">
                        <div class="col-md-8">
                            <h3 id="superhero_name_title"></h3>
                        </div>
                        <div class="col-md-4  text-right">
                            <button class="btn btn-primary submit_form_superhero" data-action-type="edit">Edit</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>
                                            <input type="hidden" name="superhero_id"/>
                                            <span id="superhero_id_text"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>
                                            <input type="text" name="superhero_name" id="superhero_name" class="form-control" value="Wolverine">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            <select class="form-control" id="superhero_gender" name="superhero_gender">
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                <div class="row" id="wrapper_form_add_skill">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Tambah Skill</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form id="form_add_skill">
                                <div class="form-row">
                                    <div class="col">
                                        <input type="hidden" name="superhero_id">
                                        <input type="text" name="new_skill" class="form-control" placeholder="New Skill">
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-primary btn-small" id="btn_submit_skill">Tambah Skill</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" id="superheroskills-table"></table>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div> -->
            </div>
        </div>
    </div>
    <!-- End of Modal Form Edit Superhero -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap-table JS -->
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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

        var $superhero_table = $('#superhero-table')
        var $superheroskills_table = $('#superheroskills-table')
        $(function() {
            
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

            // ajax calling data master superhero
            const url = "<?php echo $url_api ?>"

            // load table skills on detail superhero
            $superheroskills_table.bootstrapTable({
                ...configTable,
                ajax: (params) => ajaxBTbl(params, `${url}/show_skills/0`),

                columns: [
                    {
                        title: 'ID',
                        field: 'id'
                    }, {
                        title: 'Nama',
                        field: 'skill_name'
                    },
                    {
                        title: `<span><button class="btn btn-primary btn-small btn_add_skill">Tambah Skill</button></span>`,
                        field: 'id',
                        formatter: supeheroSkillstableformatter
                    }
                ],
                onLoadSuccess: function(){
                    $(".fixed-table-body").css({"height":"fit-content","max-height":"100%"});

                    $(".btn_add_skill").click(function(e){
                        e.preventDefault()
                        $(this).hide()
                        $("#wrapper_form_add_skill").show()
                    })

                    $("#btn_submit_skill").unbind().click(function(e){
                        e.preventDefault()
                        const action_type = $(this).data("action-type")
                        const data = convertSerializeArray($("#form_add_skill"))
                        $.ajax({
                            url: `${url}/create_or_update_superhero_skill/${parseInt(data.superhero_id)}`,
                            method:"POST",
                            data,
                            success:function(res, textStatus, xhr){
                                toastr["success"](res.messages, "Success!")
                                $(".btn_add_skill").show()
                                $("#wrapper_form_add_skill").hide()
                                $superheroskills_table.bootstrapTable("refresh")
                            },
                            error:function(xhr, status, error){
                                toastr["error"](xhr.responseJSON.messages.error, `${error} (${xhr.status})`)
                            }
                        });
                    })

                    $(".action_superheroskill_delete").click(function(e){
                        e.preventDefault()
                        const id = $(this).data("id")
                        $.ajax({
                            url: `${url}/delete_superheroskills/${parseInt(id)}`,
                            method:"DELETE",
                            success:function(res, textStatus, xhr){
                                toastr["success"](res.messages, "Success!")
                                $superheroskills_table.bootstrapTable("refresh")
                            },
                            error:function(xhr, status, error){
                                toastr["error"](xhr.responseJSON.messages.error, `${error} (${xhr.status})`)
                            }
                        });
                    })
                }

            })

            // load table superhero
            $superhero_table.bootstrapTable({
                ...configTable,
                toolbar:"#toolbar",
                ajax: function(params){

                    $.ajax({
                    url: url + '?' + $.param(params.data),
                    method:"get",
                    success:function(res, textStatus, XHR){
                            params.success(res)
                        }
                    });
                    
                },
                columns: [
                    {
                        title: 'ID',
                        field: 'id'
                    }, {
                        title: 'Nama',
                        field: 'name'
                    }, {
                        title: 'Jenis Kelamin',
                        field: 'gender_name'
                    },
                    {
                        title: "Aksi",
                        field: 'id',
                        formatter: supeherotableformatter
                    }
                ],
                onLoadSuccess: function() {
                    $(".fixed-table-body").css({"height":"fit-content","max-height":"100%"})

                    $(".show_superhero_form").click(function(){
                        const action_type = $(this).data("action-type")

                        if(action_type === "edit"){
                            $(".submit_form_superhero").text("Edit")
                            $("#title_form_superhero").text("Detail Superhero")
                        }else{
                            $(".submit_form_superhero").text("Create")
                            $("#title_form_superhero").text("Create Superhero")
                        }
                        $(".submit_form_superhero").data("action-type", action_type)
                        const id = parseInt($(this).data("id"))
                        
                        if(id){
                            $.ajax({
                            url: `${url}/show/${id}`,
                            method:"get",
                            success:function(res){
                                    console.log(res)
                                    $("#superhero_name_title").text(res.name)

                                    $("#form_superhero #superhero_id_text").text(res.id)
                                    $("#form_superhero [name='superhero_id']").val(res.id)
                                    $("#form_superhero #superhero_name").val(res.name)
                                    $("#form_superhero #superhero_gender").val(res.gender_id).change()

                                    $("#form_add_skill [name='superhero_id']").val(res.id)

                                    $("#modal_form_superhero").modal("show")
                                    alert(id)
                                    $superheroskills_table.bootstrapTable("refreshOptions", {
                                        ajax: (params) => ajaxBTbl(params, `${url}/show_skills/${id}`),
                                    })
                                },
                            error:function(xhr, status, error){
                                    toastr["error"](xhr.responseJSON.messages.error, `${error} (${xhr.status})`)
                                }
                            });
                        }else{
                            $("#modal_form_superhero").modal("show")
                            $superheroskills_table.bootstrapTable("refreshOptions", {
                                        ajax: (params) => ajaxBTbl(params, `${url}/show_skills/${id}`),
                                    })
                        }
                        
                    })
                    
                },
            })

            function ajaxBTbl(params,url){
                $.ajax({
                url,
                method:"get",
                success:function(res, textStatus, XHR){
                        params.success(res)
                    }
                });
                
            }

            // formatter column action on superhero table
            function supeherotableformatter(value, row, index) {

                return [
                `<button class="btn btn-primary show_superhero_form" data-action-type="edit" data-id="${value}">`,
                    'View Detail',
                '</button>  ',
                `<button class="btn btn-danger action_superhero_Delete" onclick="return confirm(\'Anda yakin ingin menghapus data?\')" data-id="${value}">`,
                    "Hapus",
                '</button>  ',
                ].join('');
            }

            // submit form superhero
            $(".submit_form_superhero").click(function(e){
                e.preventDefault()
                const action_type = $(this).data("action-type")
                const data = convertSerializeArray($("#form_superhero"))
                if(action_type === "edit"){
                    $.ajax({
                        url: `${url}/update/${parseInt(data.superhero_id)}`,
                        method:"PUT",
                        data,
                        success:function(res, textStatus, xhr){
                            toastr.success(res.messages, "Success!")
                            $superhero_table.bootstrapTable("refresh")
                        },
                        error:function(xhr, status, error){
                            toastr.error(xhr.responseJSON.messages.error, `${error} (${xhr.status})`)
                        }
                    });
                }else{
                    $.ajax({
                        url: `${url}/create`,
                        method:"POST",
                        data,
                        success:function(res, textStatus, xhr){
                            toastr.success(res.messages, "Success!")
                            $superhero_table.bootstrapTable("refresh")
                            $("#form_add_skill [name='superhero_id']").val(res.data.id)
                            $superheroskills_table.bootstrapTable("refreshOptions", {
                                        ajax: (params) => ajaxBTbl(params, `${url}/show_skills/${res.data.id}`),
                                    })
                        },
                        error:function(xhr, status, error){
                            toastr.error(xhr.responseJSON.messages.error, `${error} (${xhr.status})`)
                        }
                    });
                }
            })

            // reset everything inside modal form superhero
            $("#modal_form_superhero").on("hidden.bs.modal", function(e){
                $(".btn_add_skill").show()
                $("#wrapper_form_add_skill").hide()

                $("#superhero_name_title").text("")

                $("#form_superhero #superhero_id_text").text("")
                $("#form_superhero [name='superhero_id']").val("")
                $("#form_superhero #superhero_name").val("")
                $("#form_superhero #superhero_gender").val(1).change()

                $("#form_add_skill [name='superhero_id']").val("")
            })
         

            function supeheroSkillstableformatter(value, row, index){
                return [
                    `<button class="btn btn-danger action_superheroskill_delete" onclick="return confirm(\'Anda yakin ingin menghapus data?\')" data-id="${value}">`,
                        "Hapus",
                    '</button>  ',
                ].join('');
            }
            

            function convertSerializeArray(form){
                const data = form.serializeArray()
                var newformat = {};
                $.each(data,
                    function(i, v) {
                        newformat[v.name] = v.value;
                    }
                )

                return newformat
            }

            
        })
    </script>
    </body>
</html>