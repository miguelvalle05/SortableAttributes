function guardandoPosiciones() {
    var positions = [];
    $('.updated').each(function() {
        positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
        $(this).removeClass('updated');
    });

    select_part = document.getElementById("part_type").value

    $.ajax({
        url: 'AttributesOrder.php',
        method: 'POST',
        dataType: 'text',
        data: {
            update: 1,
            positions: positions,
            select_part: select_part


        },
        success: function(response) {
            console.log(response);
        }
    });
}

$(document).ready(function() {


    $("#part_type").change(function() {
        $("#part_type option:selected").each(function() {
            select_part = $(this).val();
            $.post("OwnAttributes.php", { select_part: select_part }, function(data) {
                $("#attributes").html(data);

                $('.sortable').sortable({

                    // connectWith: ".nsortable",

                    remove: function(event, ui) {

                        console.log("SALI DEL AZUL");


                        var ndata = ui.item.attr('data-index');
                        console.log(ndata);



                        console.log("SALI DEL VERDE");

                        select_part = document.getElementById("part_type").value;


                        $.ajax({
                            url: 'DeleteAttributes.php',
                            method: 'POST',
                            dataType: 'text',
                            data: {
                                update: 1,
                                ndata: ndata,
                                select_part: select_part

                            },
                            success: function(response) {
                                console.log(response);
                            }
                        });
                    },
                    stop: function(event, ui) {
                        $(this).children().each(function(index) {
                            if ($(this).attr('data-position') != (index + 1)) {
                                $(this).attr('data-position', (index + 1)).addClass('updated');
                            }
                        });

                        guardandoPosiciones();
                    }

                });
            });

            $.post("NonOwnAttributes.php", { select_part: select_part }, function(data) {
                $("#notattributes").html(data);

                $('.nsortable').sortable({
                    connectWith: ".sortable",
                    dropOnEmpty: false,
                    remove: function(event, ui) {
                        var ndata = ui.item.attr('data-index');
                        console.log(ndata);



                        console.log("SALI DEL VERDE");

                        select_part = document.getElementById("part_type").value;


                        $.ajax({
                            url: 'AddAttributes.php',
                            method: 'POST',
                            dataType: 'text',
                            data: {
                                update: 1,
                                ndata: ndata,
                                select_part: select_part


                            },
                            success: function(response) {
                                console.log(response);
                            }
                        });



                    }

                });
            });
        });




    })


});