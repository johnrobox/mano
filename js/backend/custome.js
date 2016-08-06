
// set base url here
// At my office
var base_url = 'http://practice.com/mano/';
// At home
var base_url = 'http://localhost/mano/';

$(document).ready(function () {

    $('#update').click(function () {
        var res_field = document.getElementById("profile_image").value;
        var extension = res_field.substr(res_field.lastIndexOf('.') + 1).toLowerCase();
        var allowedExtensions = ['jpg', 'jpeg', 'png'];

        if (isEmpty(res_field)) {
            $('.errorMessage').text('Please browse your profile image!');
        } else if (res_field.length > 0) {
            if (allowedExtensions.indexOf(extension) === -1) {
                $('.errorMessage').text('Invalid file Format. Only ' + allowedExtensions.join(', ') + ' are allowed!');
            } else {
                $('.errorMessage').text('');
                var fd = new FormData(document.getElementById("fileinfo"));
                $.ajax({
                    url: base_url + "admin/user-change-profile",
                    type: "POST",
                    data: fd,
                    processData: false, // tell jQuery not to process the data
                    contentType: false   // tell jQuery not to set contentType
                }).done(function (data) {
                    $('#imageLoading').toggle();
                    if (typeof data.error == 'undefined') {
                        location.reload();
                    } else {
                        $('#errorMessage').text(data.error);
                    }
                });
                return false;
            }
        }

    })


    // change / update password starts here
    $('#changePasswordButton').click(function () {
        $('#UpdatePasswordModal').modal('show');

    });


});

var loadFile = function (event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};

function isEmpty(str) {
    return (!str || 0 === str.length);
}


/*
 * Change status
 */
function changeStatus(id, status, url) {

    $('#ChangeStatus').modal('show');
    var header_text = (status == 0) ? 'Enable' : 'Disable';
    var sub_url;
    if (url == 'accounting') {
        sub_url = 'accounting-user-change-status';
    } else if (url == 'admin') {
        sub_url = 'admin/';
    } else if (url == 'employee') {
        sub_url = 'employee-change-status';
    }
    $('#headerText').text(header_text);
    $('#contentText').text('Are you sure to ' + header_text + ' the account ?');
    $('#changeOkayButton').unbind().click(function () {
        $.ajax({
            url: base_url + 'admin/' + sub_url,
            dataType: 'text',
            type: 'post',
            data: {
                id: id,
                status: status
            },
            success: function (data) {
                location.reload();
            },
            error: function () {
                console.log('error');
            }
        })
    })
}


/*
 * Delete everything
 */
function deleteSomething(id, url) {
    $('#deleteModal').modal('show');
    $('#deleteOkayButton').unbind().click(function () {
        var sub_url;
        if (url == 'accounting') {
            sub_url = 'accounting-user-delete';
        } else if (url == 'employee') {
            sub_url = 'employee-delete';
        } else {
            sub_url = '';
        }

        $.ajax({
            url: base_url + 'admin/' + sub_url,
            dataType: 'text',
            type: 'post',
            data: {
                id: id
            },
            success: function (data) {
                location.reload();
            },
            error: function (error) {

            }
        })

    })
}

// update employee
function updateEmployee(id) {
    $('#updateEmployeeModal').modal('show');
    $.ajax({
        url: base_url + 'admin/single-employee',
        dataType: 'json',
        type: 'post',
        data: {
            id: id
        },
        success: function (data) {
            $('#firstname').val(data[0].employee_firstname);
            $('#lastname').val(data[0].employee_lastname);
            $('#address').val(data[0].employee_address);
            $('#gender').val(data[0].employee_gender);
            $('#birthdate').val(data[0].employee_birthdate);
            $('#date_employed').val(data[0].employee_date_employed);

            $('#UpdateButton').unbind().click(function () {
                var msg = ' is required.';
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var address = $('#address').val();
                var gender = $('#gender').val();
                var birthdate = $('#birthdate').val();
                var date_employed = $('#date_employed').val();

                var firstname_err_val = (firstname == '') ? 'The Firstname' + msg : '';
                var lastname_err_val = (lastname == '') ? 'The Lastname' + msg : '';
                var address_err_val = (address == '') ? 'The Address' + msg : '';
                var gender_err_val = (gender == '') ? 'The Gender' + msg : '';
                var birth_err_val = (birthdate == '') ? 'The Birthdate' + msg : '';
                var employed_err_val = (date_employed == '') ? 'The date employed' + msg : '';

                $('#firstname_err').text(firstname_err_val);
                $('#lastname_err').text(lastname_err_val);
                $('#address_err').text(address_err_val);
                $('#gender_err').text(gender_err_val);
                $('#birth_err').text(birth_err_val);
                $('#employed_err').text(employed_err_val);
                if (firstname_err_val.length == 0 && lastname_err_val.length == 0 && address_err_val.length == 0 && gender_err_val.length == 0 && birth_err_val.length == 0 && employed_err_val.length == 0) {
                    $.ajax({
                        url: base_url + 'admin/update-employee',
                        dataType: 'text',
                        type: 'post',
                        data: {
                            id: id,
                            firstname: firstname,
                            lastname: lastname,
                            address: address,
                            gender: gender,
                            birthdate: birthdate,
                            date_employed: date_employed
                        },
                        success: function (data) {
                            location.reload();
                        },
                        error: function (error) {
                            console.log('error');
                        }
                    })
                } else {
                    console.log('error');
                }

            })
        },
        error: function (error) {

        }
    })
}