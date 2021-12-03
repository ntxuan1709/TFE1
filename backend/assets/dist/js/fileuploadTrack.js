function uploadfileTrack(prefixUrlImage) 
{
    // Checking whether FormData is available in browser
    if (window.FormData !== undefined) 
    {
        var fileUploadComposer = $("#fileuploadTrack").get(0);
        var files = fileUploadComposer.files;
        // Create FormData object
        var fileData = new FormData();
        fileData.append("fileuploadTrack", files[0]);
       // $("#loading").show();
        $.ajax({
            url: 'libraries/uploadfileTrack.php',
            type: "POST",
            contentType: false, // Not to set any content header
            processData: false, // Not to process data
            data: fileData,
            success: function (result) {
                $("#picture").val(result);
                $("#pictureviewer").attr("src", prefixUrlImage+result);
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