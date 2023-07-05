import './bootstrap';

$('#monthSelector').change(function(event) {
    event.preventDefault();

    let val = event.target.value;
    $.ajax({
        type:'GET',
        url: 'http://localhost/api/v1/billings?month=' + val,
        data:'',
        success:function(response){
            var jsonData = response.data;

            var html = '<ul class="details">';

            $.each(jsonData, function (i, item) {
                console.log(item)
                html += ('<li class="name">' + 'Due invoice number:' +' '+ item.invoiceNumber + '</li>');
            });

            html += '</ul>';

            $('#listing').append(html);
        },
        error: function(result) {
            alert('error');
        }
    });
});
