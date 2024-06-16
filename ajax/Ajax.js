//��������������󲢻�ȡ���ص�����
function post_ajax(url, data, sucess_function){
    $.ajax({
        type: "post",
        url: url,
        data:data,
        /*dataType:"json",*/
        async:true, //�첽����
        success: function (ret) {
            if(sucess_function != false){
                sucess_function(ret);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
                    // ״̬��
                    console.log(XMLHttpRequest.status);
                    // ״̬
                    console.log(XMLHttpRequest.readyState);
                    // ������Ϣ   
                    console.log(textStatus);
                }
    });
}

function get_ajax(url, data, sucess_function){
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        data:data,
        async:false,
        success: function (ret) {
            if(sucess_function != false){
                sucess_function(ret);
            }
        }
    });
}
