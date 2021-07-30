
$('#updateprofile').click(function(){
  
  var pic=$('#blah').val();
  var name = $('#names').val();
  var age = $('#ages').val();
  var gender = $('input[name="gender"]:checked').val();

  $.post("updateprofile.php",{name:name,pic:pic,age:age,gender:gender},function(data){
    $('#profilechange').slideUp(1000);
  });

});