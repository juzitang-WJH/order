function show(menu,change){
	//hasclass()��鱻ѡԪ���Ƿ����ָ����class
    if($("#"+change).hasClass('ico-open')){
        $("#"+change).removeClass('ico-open');
        $("#"+change).addClass('ico-close');
    }else{
        $("#"+change).removeClass('ico-close');
        $("#"+change).addClass('ico-open');
    }
    //���غ���ʾ
    $("#"+menu).toggle();
}