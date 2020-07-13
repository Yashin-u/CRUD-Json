$(document).ready(function () {


    tabel();

    function tabel() {
        $.getJSON("php/ajax.php")


            .done(function (data) {
                var output = "<table align='center'>";

                output += "<tr><th>ID</th>";
                output += "<th>First Name</th>";
                output += "<th>Last Name</th>";
                output += "<th>Birth Date</th>";
                output += "<th>Gender</th>";
                output += "<th>Member Since</th>";
                output += "<th>Image</th>";
                output += "<th>Image Toevoegen</th>";
                output += "<th>Wijzigen</th>";
                output += "<th>Verwijderen</th>";
                output += "</tr>";

                for (var i in data) {
                    output += "<tr><td>" + data[i].id + "</td>";
                    output += "<td>" + data[i].first_name + "</td>";
                    output += "<td>" + data[i].last_name + "</td>";
                    output += "<td>" + data[i].birth_date + "</td>";
                    output += "<td>" + data[i].gender + "</td>";
                    output += "<td>" + data[i].member_since + "</td>";
                    output += "<td><img class='image' src='php/upload/" + data[i].id + ".jpg' onerror='imgError(this)' width='100px'/></td>";
                    output += "<td><button class='afbtoevoeg' data-toggle='modal' data-target='#exampleModal2' data-iduser='" + data[i].id + "'>afbeelding toevoegen.</button></td>";
                    output += "<td><button class='wijzig' data-birthdate='" + data[i].birth_date + "' data-gender='" + data[i].gender + "' data-membersince='" + data[i].member_since + "' data-lastname='" + data[i].last_name + "' data-firstname='" + data[i].first_name + "' data-iduser='" + data[i].id + "' data-toggle='modal' data-target='#exampleModal1'>Wijzigen</button></td>";
                    output += "<td><button class='verwijder' data-toggle='modal' data-target='#exampleModal3' data-iduser='" + data[i].id + "'>Verwijderen</button></td>";
                    output += "</tr>";

                }
                output += "</table>";
                $("#hierinfo").html(output);
            });

    }


    $(document).on('click', '.afbtoevoeg', function () {
        var id = $(this).data('iduser');

        var output = "<input type='text' id='id' value='" + id + "' disabled>";


        output += "<input type='file' accept='image/*' id='file' name='file' class='foto' data-iduser='" + id + "'>";
        $("#afbtoevoeg").html(output);

    });


    $(document).on('change', '#file', function () {
        var id = $(this).data('iduser');
        var form_data = new FormData();
        if (id === 0) {
        } else {
            form_data.append("file", document.getElementById('file').files[0]);
            form_data.append("id", id);
            $.ajax({
                url: "./php/upload.php",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                },
                success: function (data) {
                    $('#uploaded_image').html(data);
                    tabel();
                }
            });
        }
    });

    function refresh() {
        $.ajax({
            url: 'refresh.php',
            success: function (data) {
                $('.result').html(data);
            }
        });
    }


    $("#knop").click(function () {
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var birth_date = $("#birth_date").val();
        var gender = $("#gender").val();
        var member_since = $("#member_since").val();
        $.ajax({
            url: "php/ajax1.php",
            method: "POST",
            data: {
                'first_name': first_name,
                'last_name': last_name,
                'birth_date': birth_date,
                'gender': gender,
                'member_since': member_since
            }
        })
            .done(function (data) {
                if (data == "OK") {
                    $("#resultaat").text("Gelukt!");
                    tabel();
                } else {
                    $("#resultaat").text("Er ging iets fout!");
                }
            });

    });


    $(document).on('click', '.wijzig', function () {
        var id = $(this).data('iduser');
        var firstname = $(this).data('firstname');
        var lastname = $(this).data('lastname');
        var birthdate = $(this).data('birthdate');
        var gender = $(this).data('gender');
        var membersince = $(this).data('membersince');
        var output = "<form>";


        output += "<input type='hidden' id='id' name='id' value='" + id + "' disabled>";
        output += "<li>Voornaam:</li>";
        output += "<input type='text' id='firstname' name='firstname' value='" + firstname + "'>";
        output += "<li>Achternaam:</li>";
        output += "<input type='text' id='lastname' name='lastname' value='" + lastname + "'>";
        output += "<li>Geboortedatum:</li>";
        output += "<input type='date' id='birthdate' name='birthdate' value='" + birthdate + "'>";
        output += "<li>Geslacht:</li>";
        output += "<input type='text' disabled value='" + gender + "'>";
        output += "<select name='gender' id='gender1'>";
        output += "<option value='M'>Man</option>";
        output += "<option value='F' >Vrouw</option>";
        output += "</select>";
        output += "<li>Lid sinds:</li>";
        output += "<input type='date' id='membersince' name='membersince' value='" + membersince + "'>";

        output += "</form>";
        $("#wijzigform").html(output);

        $("#klik").click(function () {
            var id = $("#id").val();
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var birthdate = $("#birthdate").val();
            var gender1 = $("#gender1").val();
            var membersince = $("#membersince").val();
            $.ajax({
                url: "php/ajax2.php",
                method: "POST",
                data: {
                    'id': id,
                    'firstname': firstname,
                    'lastname': lastname,
                    'birthdate': birthdate,
                    'gender1': gender1,
                    'membersince': membersince
                }
            })
                .done(function () {
                    tabel();

                });

        });
    });

    $(document).on('click', '.verwijder', function () {
        var id = $(this).data('iduser');

        var output = "<form>";
        output += "<li>ID:</li>";
        output += "<input type='text' id='id' name='id' value='" + id + "' disabled>";
        output += "</form>";

        output += "Weet u zeker dat u deze gebruiker wilt verwijderen?";

        $("#verwijderuser").html(output);


        var output1 = "<button type='button' class='verwijderen btn btn-secondary' data-iduser='" + id + "' data-dismiss='modal'>Verwijderen</button>";
            output1 += "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Annuleren</button>";

        $("#verwijdergebruiker").html(output1);


});

$(document).on('click', '.verwijderen', function () {
    var id = $(this).data('iduser');


    $.ajax({
        url: "php/ajax3.php",
        method: "POST",
        data: {
            'id': id
        }
    })
        .done(function (data) {
            if (data == "OK") {
                tabel();
            } else {
                alert("er ging iets fout!!!");
                console.log(data);
            }
        });

});

});

function imgError(image) {
    image.onerror = "";
    image.src = "php/upload/error.png";
    image.width = "50";
    return true;
}

