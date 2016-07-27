 
 // set base url here
 var base_url = 'http://practice.com/mano/';
 
 $(document).ready(function() {
     
        $('#update').click(function(){
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
                      processData: false,  // tell jQuery not to process the data
                      contentType: false   // tell jQuery not to set contentType
                    }).done(function( data ) {
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
        $('#changePasswordButton').click(function(){
            $('#UpdatePasswordModal').modal('show');
            
        });
                
    });
    
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
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
        }
        $('#headerText').text(header_text);
        $('#contentText').text('Are you sure to ' + header_text + ' the account ?');
        $('#changeOkayButton').click(function(){
            $.ajax({
                url : base_url + 'admin/' + sub_url,
                dataType : 'text',
                type : 'post',
                data : {
                    id : id,
                    status : status
                },
                success : function(data) {
                    location.reload();
                },
                error : function() {
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
        $('#deleteOkayButton').click(function() {
            var sub_url;
            if (url == 'accounting') {
                sub_url = 'accounting-user-delete';
            } else {
                sub_url = '';
            }
            
            $.ajax({
                url : base_url + 'admin/' + sub_url,
                dateType : 'text',
                type : 'post',
                data : {
                    id : id
                }, 
                success : function(data) {
                    location.reload();
                },
                error : function(error) {
                    
                }
            })
            
        })
    }