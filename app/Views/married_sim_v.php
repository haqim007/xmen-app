<?php require_once("head_v.php") ?>
<div class="wrapper wrapper-content">
<!-- Simulasi Start -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info">
                        <p>
                        Nah, ini adalah simulasi jika <stromg>Wolverine &amp; Storm</stromg> menikah.
                        Maka anak-anak mereka kemungkinan akan mewarisi Skill dari Ayah dan Ibunya.
                        Kamu bisa mengganti-ganti Suami / Istri untuk melihat Skill yang akan dimiliki oleh anak-anaknya.
                        </p>

                        <p>
                        <i>Tentunya Laki-laki hanya bisa menikah dengan Perempuan ya, awas jangan sampai jenis kelaminnya sama! Jeruk makan jeruk dong :D</i>
                        </p>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <h3>Simulasi Jika Superhero Menikah</h3>
                </div>
                <div class="col-md-4  text-right">
                    <!-- <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Hapus</button> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tbody><tr>
                            <td>Suami</td>
                            <td>
                                <select class="form-control select2" id="husband_select"></select>
                            </td>
                        </tr>
                        <tr>
                            <td>Istri</td>
                            <td>
                                <select class="form-control select2" id="wife_select"></select>
                            </td>
                        </tr>
                    </tbody></table>

                    <h3>Maka Anaknya Kemungkinan Akan Memiliki Skill Berikut:</h3>
                    <table class="table table-bordered" id="kid_skills">
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<script>
    $(document).ready(function(){
 
        const url = "<?php echo $url_api ?>"
        $.ajax({
            url: `${url}/get_superhero_groupby_gender`,
            method:"GET",
            success:function(res, textStatus, xhr){
                const husband_list = res[0].map(val => ({id:val.id, text:val.name}))
                const wife_list = res[1].map(val => ({id:val.id, text:val.name}))
                $("#husband_select").select2({tags:true, data:husband_list})
                $("#wife_select").select2({tags:true, data:wife_list})

                
                $("#husband_select, #wife_select").trigger("change")
            },
            error:function(xhr, status, error){
                toastr["error"](xhr.responseJSON.messages.error, `${error} (${xhr.status})`)
            }
        });

        const $kidskills_table = $("#kid_skills")

        $(document.body).on("change","#husband_select, #wife_select",function(){


            const father_id = $('#husband_select').select2("data")[0].id
            const mother_id = $('#wife_select').select2("data")[0].id

            load_kids_skill(father_id, mother_id)
        });
        
        // init table
        $kidskills_table.bootstrapTable({
            ...configTable,
            ajax: (params) => ajaxBTbl(params, `${url}/kid_skills_prob/0/0`),

            columns: [
                {
                    title: 'NO',
                    field: 'id',
                    formatter:generateNumber
                }, {
                    title: 'Nama',
                    field: 'skill_name'
                },
            ],
            onLoadSuccess: function(){
                    $(".fixed-table-body").css({"height":"fit-content","max-height":"100%"});
            }

        })
        

        function load_kids_skill(father_id, mother_id){
            $kidskills_table.bootstrapTable("refreshOptions", {ajax: (params) => ajaxBTbl(params, `${url}/kid_skills_prob/${father_id}/${mother_id}`),})
            
        }

        function generateNumber(value, row, index){
            return index+1;
        }
        
    })
</script>

<?php require_once("foot_v.php") ?>