function showPanel(eve,id)
{
  $(".cnt").hide();
  $(".nav-link").removeClass("active");
  $("#"+eve).addClass("active");
  $("#"+id).show(); 
  $("#output").html("Please submit form above");
}

function sendRequest(id) {

  var  url,
      method,
      callback;
  let data = {};
  data.token = $("#clientToken").val();
  url     =  "server.php";
  method  =  "POST";
  switch (id) {
    case 'address':
                    data.address = $("#avAddress").val();
                    data.city = $("#avCity").val();
                    data.state = $("#avState").val();
                    data.zip = $("#avZip").val();
                    data.request = "address";
    break;
    case 'phone': 
                    data.phone = $("#pvPhone").val();
                    data.request = "phone";
    break;
    case 'property':
                    data.address = $("#plAddress").val();
                    data.city = $("#plCity").val();
                    data.state = $("#plState").val();
                    data.zip = $("#plZip").val();
                    data.request = "property";
      break;
    case 'geocode':
                    data.address = $("#agAddress").val();
                    data.request = "geocode";
    break;
    case 'skiptrace':
                    data.address = $("#sktAddress").val();
                    data.city = $("#sktCity").val();
                    data.state = $("#sktState").val();
                    data.zip = $("#sktZip").val();
                    data.request = "skiptrace";
    break;
    default:
      console.log('No field selected');
  }
   
  
  $.ajax({
    url: url,
    type: method,
    data: data,
    success: function(response) {
      $("#output").html(response);
    },
    error: function(xhr, status, error) {
      console.error("Error sending request:", error);
    }
  });
}
