$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Xoá danh mục
function delRow(id, url) {
    if (confirm('Xác nhận xoá ?')) 
    {
        $.ajax({
            type : "DELETE",
            dataType : 'JSON',
            data : { id },
            url : url,
            success : function (result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Lỗi. Vui lòng thử lại!");
                }
            }
        })
    }
}

// Upload ảnh
$('#upload').change(function(){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData : false,
        contentType : false,
        type : "POST",
        dataType : 'JSON',
        data : form,
        url : '/admin/upload/services',
        success : function (rs) {
            if (rs.error === false) {
                $('#showImg').html('<a href="' + rs.url + '" target="_blank">' + 
                                        '<img src="' + rs.url + '" width="200px"></a>');
                
                $('#file').val(rs.url);
            } else {
                alert("Không thể upload ảnh!");
            }
        }
    });
});
