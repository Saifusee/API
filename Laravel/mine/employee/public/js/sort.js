$.noConflict();
jQuery(document).ready(function($){

  //Constant for Homepage URL (any change before employees just do it here it apply everywhere)
const HOME_PAGE_URL = "http://localhost:8000/api/employees";


//UI 
//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
  //To display Add pop-up
$(".here").click(function(){
  $("#form1").css("display", "block");
});


////To Hide Add pop-up
$(".close").click(function(){
  $("#form1, #form3").css("display", "none");
});







//Show Data on UI
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function executeGet(urlToReach){

  //via jquery ajax get we getting data from the url http://localhost:8000/api/employees via post method
    jQuery.ajax({
      url: urlToReach,
      processData: false,
      contentType: false,
      type: "GET",
      dataType: "json",

          //in Controller of backend we send that we get successfull 200 so we show if success and it takes first parameter as a result we get from response json of backened
      success: function (json) {
          let edit = "";
          json.forEach(function(current, index){

          let html, newhtml;

          html = '<tr id="%bno%"><td>%sno%</td><td>%fname%</td><td>%lname%</td><td>%email%</td><td><label class="switch"><input class="chec" type="checkbox" %checked% value=%val%><span class="slider round"></span></label></td><td><button class="time_btn"><i class="fa fa-times" aria-hidden="true"></i></button><br><br><button class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></td></tr>';
          newhtml = html.replace('%bno%', current.id);
          newhtml = newhtml.replace("%sno%", index+1);
          newhtml = newhtml.replace("%fname%", current.fname);
          newhtml = newhtml.replace("%lname%", current.lname);
          newhtml = newhtml.replace("%email%",current.email);
          newhtml = newhtml.replace("%val%",current.status);
            if(current.status == 1){
            newhtml = newhtml.replace("%checked%", "checked");
            };
               edit += newhtml;
          });
           $(".tbody").html(edit);
      
   },

 });

}




function executePost(urlToReach, dataToPost){

  //via jquery ajax get we getting data from the url http://localhost:8000/api/employees via post method
    jQuery.ajax({
      url: urlToReach,
      data: dataToPost, 
      processData: false,
      contentType: false,
      type: "POST",
      dataType: "json",
  });
}





function executeDelete(urlToReach){

  //via jquery ajax get we getting data from the url http://localhost:8000/api/employees via post method
    jQuery.ajax({
      url: urlToReach,
      processData: false,
      contentType: false,
      type: "DELETE",
      dataType: "json",
  });
}






//Search Works
////////////////////////////
///////////////////////////

  $("#searchfield").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });



  //Paid button in work
  $(".paidcont").click(function(){

    executeGet(HOME_PAGE_URL + "/paid");

  });

  //Unpaid button in work
  $(".unpaidcont").click(function(){

    executeGet(HOME_PAGE_URL + "/unpaid");

  });


  //All button work
  $(".allcont").click(function(){
    executeGet(HOME_PAGE_URL);
  });






  //Toggling Of Switch
  $(document).on('click', ".chec", function(){
    let rowId = $(this).closest("tr").attr("id");
    let value = $(this).closest("input").attr("value");
    console.log(value);

    executePost(HOME_PAGE_URL + "/checked/" + rowId + "/" + value);

    executeGet(HOME_PAGE_URL);

  });



//App Control
//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////





//Submit and store data
let fname, lname, email, status;
$(".submit_btn").click(function(){

  var $form = $('#form13');
  var formData = new FormData($($form)[0]);
 
  executePost(HOME_PAGE_URL, formData);

if (fname !== "" && lname !== "" && email !== ""){

  executeGet(HOME_PAGE_URL);

    $("#email,#fname,#lname").val("");
    $("#status").prop("checked", false);
    $("#fname").focus();
  };
});





//Delete button in function
$(document).on('click',".time_btn", function(event){

 let id = $(this).closest("tr").attr("id");

 executeDelete(HOME_PAGE_URL + "/" + id);

 executeGet(HOME_PAGE_URL);

})





//Edit Button click Show
////////////////////////
////////////////////////

$(document).on('click', ".edit", function(){

  $("#form3").css("display", "block");
  var id = $(this).closest("tr").attr("id");
  $("#editid").val(id);

  jQuery.ajax({
    url: HOME_PAGE_URL + "/" + id + "/edit",
    processData: false,
    contentType: false,
    type: "GET",
    dataType: "json",

    //In Controller of backend we send that we get successfull 200 so we show if success and it takes first parameter as a result we get from response json of backened
    success: function (json) {
      if (json){
        $("#fnameupt").val(json["fname"]);
        $("#lnameupt").val(json["lname"]);
        $("#emailupt").val(json["email"]);
        var a = json["status"];
        if(a == 1){
          $("#statusupt").prop("checked", true);
        } else {
          $("#statusupt").prop("checked", false);
        };
      }
      
 },

})
})





//Collect Data from Edit box
$(document).on('click', "#update", function(){

  var $form = $('#form14');
  var formData = new FormData($($form)[0]);
//to ensure checkbox data
 let stat =  $("#statusupt").is(":checked");
  if(stat){
    formData.append("status", 1);
  } else {
    formData.append("status", 0);
  };

//bcz formData cannot send on PUT/Patch request, we put key and value in header of request to let server know its look like post but its a put request
  formData.append("_method", "PUT");

  let id = $("#editid").val();

  executePost(HOME_PAGE_URL + "/" + id,formData);

  executeGet(HOME_PAGE_URL);

  $("#form3").css("display", "none");
   
})  





function init (){
  executeGet(HOME_PAGE_URL);
}
init();


});


// success: function (json) {
//     console.log(json);
//     listshow(json);
 
// },
// error: function (request, status, error) {
// json = $.parseJSON(request.responseText);
// jQuery($form).find('.help-block').remove();
// jQuery($form).find('.has-error').removeClass('has-error');
// jQuery.each(json.form_errors, function (key, value) {
//     jQuery('#loading').hide();
//     input_name = 'input[name="' + key + '"]';          
//     jQuery($form).find(input_name).parent().append('<p class="help-block">' + value + '</p>').closest('.form-group').addClass('has-error');
// });
// }