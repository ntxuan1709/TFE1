function uploadfileMp3() 
{
    // Checking whether FormData is available in browser
    if (window.FormData !== undefined) 
    {
        var fileUploadMp3 = $("#fileuploadMp3").get(0);
        var files = fileUploadMp3.files;
        // Create FormData object
        var fileData = new FormData();
        fileData.append("fileuploadMp3", files[0]);
       // $("#loading").show();
        $.ajax({
            url: 'libraries/uploadfileMp3.php',
            type: "POST",
            contentType: false, // Not to set any content header
            processData: false, // Not to process data
            data: fileData,
            success: function (result) {
                $("#url").val(result);
               // $("#loading").hide();
            },
            error: function (err) {
               // $("#loading").hide();
                alert(err.statusText );
            }
        });
    } else {
        alert("FormData không hỗ trợ" );
    }
}