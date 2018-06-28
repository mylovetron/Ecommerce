// form show/search

alert(1111);

$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});

$("div.alert").delay(3000).slideUp();

function xacnhanxoa() {
   if(window.confirm('test'))
       return true;
   return false;
}

