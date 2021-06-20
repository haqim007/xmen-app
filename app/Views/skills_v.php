<?php require_once("head_v.php") ?>
    <div class="wrapper wrapper-content">

        <!-- Daftar SuperHero Start -->


        <div class="row container-section">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            Di bawah ini adalah Daftar Skill yang ada.<br>
                            Kamu bisa mencari nama mereka melalui fasilitas pencarian di sebelah kanan.<br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <h3>Daftar Skill</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div id="toolbar">
                                <div class="form-inline" role="form">
                                    <div class="form-group">
                                        <button class="btn btn-primary show_skill_form" data-action-type="create" data-id="0">Tambah Superhero</button>
                                    </div>
                                </div>
                            </div>
                            <table class="table" id="skill_table"></table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- Daftar SuperHero End -->
    </div>

        
    <!-- Modal Form Edit Superhero -->
    <!-- tabindex="-1" --> 
    <div class="modal fade" id="modal_form_skill"  role="dialog" aria-labelledby="title_form_skill" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_form_skill">Detail Skill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_skill">
                    <div class="row" style="margin-bottom:10px">
                        <div class="col-md-8">
                            <h3 id="skill_name_title"></h3>
                        </div>
                        <div class="col-md-4  text-right">
                            <button class="btn btn-primary submit_form_skill" data-action-type="edit">Edit</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>
                                            <input type="hidden" name="skill_id"/>
                                            <span id="skill_id_text"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>
                                            <input type="text" name="skill_name" id="skill_name" class="form-control" value="Wolverine">
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
                            <h5>Tambah Superhero</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form id="form_add_skill">
                                <div class="form-row">
                                    <div class="col">
                                        <input type="hidden" name="superhero_id">
                                        <select class="form-control" id="superhero_skills_select" placeholder="Choose superhero"></select>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-primary btn-sm" id="btn_submit_superhero">Tambah Skill</button>
                                        <button class="btn btn-warning btn-sm" id="btn_cancel_superhero">Batalkan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" id="skillsuperheros-table"></table>
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




    <script>
        

        var $skills_table = $('#skill_table')
        var $skillsuperheros_table = $('#skillsuperheros-table')
        $(function() {
            
            const url = "<?php echo $url_api ?>"

            // load table skills
            $skills_table.bootstrapTable({
                ...configTable,
                toolbar:"#toolbar",
                ajax: (params) => ajaxBTbl(params, `${url}/show_all_skills`),

                columns: [
                    {
                        title: 'ID',
                        field: 'id'
                    }, {
                        title: 'Nama',
                        field: 'skill_name'
                    },
                    {
                        title: "Aksi",
                        field: 'id',
                        formatter: skilltableformatter
                    }
                ],
                onLoadSuccess: function(){
                    $(".fixed-table-body").css({"height":"fit-content","max-height":"100%"});

                    $(".show_skill_form").click(function(){
                    const action_type = $(this).data("action-type")

                    // $(".submit_form_skill").text("Edit")
                    // $("#title_form_skill").text("Detail Skill")
                    
                    $(".submit_form_skill").data("action-type", action_type)
                    const id = parseInt($(this).data("id"))
                    
                    if(id){
                        $.ajax({
                        url: `${url}/show_skill/${id}`,
                        method:"get",
                        success:function(res){
                                console.log(res)
                                $("#skill_name_title").text(res.name)

                                $("#form_skill #skill_id_text").text(res.id)
                                $("#form_skill [name='skill_id']").val(res.id)
                                $("#form_skill #skill_name").val(res.skill_name)

                                $("#form_add_skill [name='skill_id']").val(res.id)

                                $("#modal_form_skill").modal("show")
                                
                                $skillsuperheros_table.bootstrapTable("refreshOptions", {
                                    ajax: (params) => ajaxBTbl(params, `${url}/show_skills/${id}`),
                                })
                            },
                        error:function(xhr, status, error){
                                toastr["error"](xhr.responseJSON.messages.error, `${error} (${xhr.status})`)
                            }
                        });
                    }else{
                        $("#modal_form_skill").modal("show")
                        $skillsuperheros_table.bootstrapTable("refreshOptions", {
                                    ajax: (params) => ajaxBTbl(params, `${url}/show_skills/${id}`),
                                })
                    }

                    
                    
                })
                }

            })

            // // load table superhero
            // $skills_table.bootstrapTable({
            //     ...configTable,
            //     toolbar:"#toolbar",
            //     ajax: function(params){

            //         $.ajax({
            //         url: url + '?' + $.param(params.data),
            //         method:"get",
            //         success:function(res, textStatus, XHR){
            //                 params.success(res)
            //             }
            //         });
                    
            //     },
            //     columns: [
            //         {
            //             title: 'ID',
            //             field: 'id'
            //         }, {
            //             title: 'Nama',
            //             field: 'name'
            //         }, {
            //             title: 'Jenis Kelamin',
            //             field: 'gender_name'
            //         },
            //         {
            //             title: "Aksi",
            //             field: 'id',
            //             formatter: supeherotableformatter
            //         }
            //     ],
            //     onLoadSuccess: function() {
            //         $(".fixed-table-body").css({"height":"fit-content","max-height":"100%"})

            //         $(".show_skill_form").click(function(){
            //             const action_type = $(this).data("action-type")

            //             if(action_type === "edit"){
            //                 $(".submit_form_skill").text("Edit")
            //                 $("#title_form_skill").text("Detail Superhero")
            //             }else{
            //                 $(".submit_form_skill").text("Create")
            //                 $("#title_form_skill").text("Create Superhero")
            //             }
            //             $(".submit_form_skill").data("action-type", action_type)
            //             const id = parseInt($(this).data("id"))
                        
            //             if(id){
            //                 $.ajax({
            //                 url: `${url}/show/${id}`,
            //                 method:"get",
            //                 success:function(res){
            //                         console.log(res)
            //                         $("#skill_name_title").text(res.name)

            //                         $("#form_skill #skill_id_text").text(res.id)
            //                         $("#form_skill [name='skill_id']").val(res.id)
            //                         $("#form_skill #skill_name").val(res.name)
            //                         $("#form_skill #superhero_gender").val(res.gender_id).change()

            //                         $("#form_add_skill [name='skill_id']").val(res.id)

            //                         $("#modal_form_skill").modal("show")
                                    
            //                         $skillsuperheros_table.bootstrapTable("refreshOptions", {
            //                             ajax: (params) => ajaxBTbl(params, `${url}/show_skills/${id}`),
            //                         })
            //                     },
            //                 error:function(xhr, status, error){
            //                         toastr["error"](xhr.responseJSON.messages.error, `${error} (${xhr.status})`)
            //                     }
            //                 });
            //             }else{
            //                 $("#modal_form_skill").modal("show")
            //                 $skillsuperheros_table.bootstrapTable("refreshOptions", {
            //                             ajax: (params) => ajaxBTbl(params, `${url}/show_skills/${id}`),
            //                         })
            //             }

                        
                        
            //         })
                    
            //     },
            // })

            // formatter column action on superhero table
            function skilltableformatter(value, row, index) {

                return [
                `<button class="btn btn-primary show_skill_form" data-action-type="edit" data-id="${value}">`,
                    'View Detail',
                '</button>  ',
                `<button class="btn btn-danger action_superhero_Delete" onclick="return confirm(\'Anda yakin ingin menghapus data?\')" data-id="${value}">`,
                    "Hapus",
                '</button>  ',
                ].join('');
            }

            // submit form superhero
            $(".submit_form_skill").click(function(e){
                e.preventDefault()
                const action_type = $(this).data("action-type")
                const data = convertSerializeArray($("#form_skill"))
                if(action_type === "edit"){
                    $.ajax({
                        url: `${url}/update/${parseInt(data.skill_id)}`,
                        method:"PUT",
                        data,
                        success:function(res, textStatus, xhr){
                            toastr.success(res.messages, "Success!")
                            $skills_table.bootstrapTable("refresh")
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
                            $skills_table.bootstrapTable("refresh")
                            $("#form_add_skill [name='skill_id']").val(res.data.id)
                            $skillsuperheros_table.bootstrapTable("refreshOptions", {
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
            $("#modal_form_skill").on("hidden.bs.modal", function(e){
                $(".btn_add_skill").show()
                $("#wrapper_form_add_skill").hide()

                $("#skill_name_title").text("")

                $("#form_skill #skill_id_text").text("")
                $("#form_skill [name='skill_id']").val("")
                $("#form_skill #skill_name").val("")
                $("#form_skill #superhero_gender").val(1).change()

                $("#form_add_skill [name='skill_id']").val("")
            })
         

            function supeheroSkillstableformatter(value, row, index){
                return [
                    `<button class="btn btn-danger action_superheroskill_delete" onclick="return confirm(\'Anda yakin ingin menghapus data?\')" data-id="${value}">`,
                        "Hapus",
                    '</button>  ',
                ].join('');
            }

            // get others skill that superhero doesn't have
            function getOtherSkillsDontHave(id){
                $.ajax({
                        url: `${url}/show_skills_not/${id}`,
                        method:"get",
                        success:function(res){
                                let data = []
                                res.map((val) => {
                                    data.push({id: val.id, text:val.skill_name})
                                })

                                $("input[name='new_skill']").val(res[0].id);
                                $("#superhero_skills_select").select2({
                                    tags: true,
                                    data
                                    
                                }); 
                                $('#superhero_skills_select').on('select2:select', function(){
                                    const selected_data = $(this).select2('data')[0]
                                    $("[name='new_skill']").val(selected_data.id);
                                });
                            },
                        error:function(xhr, status, error){
                                toastr["error"](xhr.responseJSON.messages.error, `${error} (${xhr.status})`)
                            }
                    });
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
<?php require_once("foot_v.php") ?>