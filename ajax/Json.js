
function getJsonLength(jsonData){
	//��ȡjson���ݳ��ȵķ���
	var jsonLength = 0;
	for(var item in jsonData){
    	jsonLength++;
    }
    return jsonLength;
}