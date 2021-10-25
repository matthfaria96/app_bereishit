<script>
$(document).ready(function() {
    const inputNamePt    = $('#inputNamePt');
    const inputNameHe    = $('#inputNameHe');
    const tableBodyBooks = $('table tbody');

    function getInputModalValues() {
        return {
            name_pt: inputNamePt.val(),
            name_he: inputNameHe.val(),
        }
    }

    function save() {
        appAjax('post', '/web/torah', getInputModalValues(), function () {
            inputNamePt.val('');
            inputNameHe.val('');
            populateTable();
        })        
    }
    
    function populateTable() {
        appAjax('get', '/api/torah', {}, function (data) {
            let books = data.data.map(function (item) {
                return `
                    <tr>
                        <th scope="row">${item.id}</th>
                        <td  colspan="0">
                            <a href="/web/manager/torah/books/${item.id}/chapters" class="mr-5">${item.name_pt} | ${item.name_he}</a>
                        </td>
                        <td  colspan="1">
                            <i class="fas fa-cog pointer"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${item.id}"></i>
                        </td>
                    </tr>
                `
            })

            $('table tbody tr').remove();
            tableBodyBooks.append(books)

        })

    }

    $('.btn-save').click(function (e) {
        e.preventDefault();

        save();
    })

    populateTable();
})
</script>