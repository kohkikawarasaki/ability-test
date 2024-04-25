<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
</head>

<body>
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-header__button" id="close-button">&times;</button>
            </div>
            <div class="modal-body">
                <table class="modal-table">
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お名前</th>
                        <td class="modal-table__item">
                            <p class="modal-table__item-p" id="modal-name"></p>
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">性別</th>
                        <td class="modal-table__item">
                            <p class="modal-table__item-p" id="modal-gender"></p>
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">メールアドレス</th>
                        <td class="modal-table__item">
                            <p class="modal-table__item-p" id="modal-email"></p>
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">電話番号</th>
                        <td class="modal-table__item">
                            <p class="modal-table__item-p" id="modal-tell"></p>
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">住所</th>
                        <td class="modal-table__item">
                            <p class="modal-table__item-p" id="modal-address"></p>
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">建物名</th>
                        <td class="modal-table__item">
                            <p class="modal-table__item-p" id="modal-building"></p>
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お問い合わせの種類</th>
                        <td class="modal-table__item">
                            <p class="modal-table__item-p" id="modal-category"></p>
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お問い合わせ内容</th>
                        <td class="modal-table__item">
                            <p class="modal-table__item-p" id="modal-detail"></p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button class="modal-footer__button" id="delete-button">削除</button>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    // モーダルを表示する関数
    function showModal() {
        document.getElementById('modal').style.display = 'block';
    }

    // モーダルを非表示にする関数
    function hideModal() {
        document.getElementById('modal').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.contact-table__button');
        var confirmDeleteBtn = document.getElementById('delete-button');
        var cancelBtn = document.getElementById('close-button');
        var deleteId;
        var name;
        var gender;
        var email;
        var tell;
        var address;
        var building;
        var category;
        var detail;

        // 削除ボタンがクリックされたときの処理
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                deleteId = button.getAttribute('data-id');
                name = $('#name').text();
                $('#modal-name').text(name);
                gender = $('#gender').text();
                $('#modal-gender').text(gender);
                email = $('#email').text();
                $('#modal-email').text(email);
                tell = button.getAttribute('data-tell');
                $('#modal-tell').text(tell);
                address = button.getAttribute('data-address');
                $('#modal-address').text(address);
                building = button.getAttribute('data-building');
                $('#modal-building').text(building);
                category = $('#category').text();
                $('#modal-category').text(category);
                detail = button.getAttribute('data-detail');
                $('#modal-detail').text(detail);
                showModal(); // モーダルを表示
            });
        });

        // キャンセルボタンがクリックされたときの処理
        cancelBtn.addEventListener('click', function() {
            hideModal(); // モーダルを非表示
        });

        confirmDeleteBtn.addEventListener('click', function() {
            $.ajax({
                url: '/admin/delete/',
                type: 'POST',
                data: {
                    id: deleteId,
                    '_method': 'DELETE',
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
            hideModal();
        });
    });
</script>
