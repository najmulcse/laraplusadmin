/* Add here all your JS customizations */


$(document).ready(function () {

    //popover
    $("[data-toggle=popover]")
        .popover({
            trigger: 'hover'
        });

    // calendar settings
    $.extend(theme.PluginDatePicker.defaults, {
        format: "dd/mm/yyyy",
    });


    // modal dropdown fix
    $('.sl-selectpicker-modal').select2({
        dropdownParent: $(".modal-body")
    });

    //profile pic

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.sl-profile-image-avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $("input[type='image']").click(function(e) {
        e.preventDefault();
        $("input[id='staffImage'], input[id='supplierImage']").click();

    });


    // disable vacancy

    $("#vacanciesNotAplicable").on("click", function(){
        if($("#vacanciesNotAplicable").is(':checked')){
            $("#noVacancies").prop('disabled', true);
        }else{
            $("#noVacancies").prop('disabled', false);
        }
    });

    //salary negotiable check
    $("#salaryNotApplicable").on("click", function(){
        if($("#salaryNotApplicable").is(':checked')){
            $("#salaryMin, #salaryMax, #salaryType").prop('disabled', true);
        }else{
            $("#salaryMin, #salaryMax, #salaryType").prop('disabled', false);
        }
    });

    //vat include check
    $("#vatIncludedCheck").on("click", function(){
        if($("#vatIncludedCheck").is(':checked')){
            $("#vatPercent").prop('disabled', true);
        }else{
            $("#vatPercent").prop('disabled', false);
        }
    });

});

$(document).ready(function(){

    $('.default-delete-option').on('click', function(){
        var id = $(this).data('id');
        var requestedUrl = $(this).data('url');

        $('.modal-confirm').on('click', function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url: requestedUrl,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id : id
                },
                success:function(data){
                  //  console.log(data);
                    location.reload();
                }
            });
        });
    });


    // location

    $("#locationDistrict").on("change", function(){
        var id = $(this).val();
        var requestedUrl = $(this).data('thana-url');
        console.log($(this).val());
        $.ajax({
            type:'POST',
            url: requestedUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id : id
            },
            success:function(response){

                if(response.status === 'success'){
                    $('#locationThana').children('option:not(:first)').remove();
                    var thana = response.data;
                    var selectOptions = "";
                    if(thana.length){
                        $.each(thana, function(key, value){
                            console.log(value);
                            selectOptions +="<option  value=" + value.id + ">"+value.thana_name+"</option>"

                        });
                        $("#locationThana").append(selectOptions);
                    }
                }

            }
        });
    });
});
