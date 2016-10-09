var checkChief = function(){

    /*var publish = function(){
        //console.log($hyall);
        $hyall.actionsHandlers.actionPublish = function(rows){
            $.post($.U('ajax?q=publish'), {pk:rows.join(',')},function(r){
               // console.log(r);
                $hyall.dtActionAlert(r);
            });
        }
    }*/

    var checkBoss = function(){
        // var bossUrl = $.U('findBoss');
       
        // $.getJSON(bossUrl,function(data){
        //     if(data){
        //         $('.hy-form-modal select#boss_id').attr('disabled');
        //      }
        // })
        

    }
	 return {
	        init: function () {
               
                checkBoss();
	        }
     };
}();