  $(document).ready(function () {
    
    
    $(".candidato").click(function(){
      
        $(".candidato").removeClass("btn-outline-success");
        $(this).addClass("btn-outline-success");


        var id = $(this).attr("id");

       // var d = new Date.now();
        

        //alert(d.getMonth());

         $("#voto").removeClass("disabled");
         //$("#voto").attr("href","../../votos/add.php"+id+"&fecha="+d);
         $("#voto").attr("href","../../votos/add.php"+id);
         // var id = $(this).attr("id"); 

          //  alert(id);

    } );

 

   


  


  

});


