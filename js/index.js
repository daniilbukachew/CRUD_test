$(document).ready(function() {
	report.initialize();
});

var report = {
    initialize: function() {
		report.events();
	},
    create: function(title, url, text_field) {
	    $.ajax({
            url: '/CRUD_PHP/index',
            method: 'POST',
            data: {
                operation: 'create',
				    title: title,
                    url: url,
                    text_field: text_field
            },
            success: function(data) {
                $("body").empty();
                $("body").append(data);
            },
            error: function() {
                alert('Произошла ошибка, обновите страницу!');
            }
        });
    },
	read: function(id, url) {
		$.ajax({
			url: '/CRUD_PHP/text_template.php',
			method: 'POST',
			data: {
				operation: 'read',
                id: id,
                url: url
			},
			success: function(data) {
                var href = 'http://localhost/CRUD_php/' + url;
				parent.window.location.href = href;
                // $("body").empty();
				// $("body").append(data);
			},
			error: function() {
				alert('Произошла ошибка, обновите страницу!');
			}
		});
	},
	update: function(text_field, title, id) {
		$.ajax({
			url: '/CRUD_PHP/index',
			method: 'POST',
			data: {
                operation: 'update',
                id: id,
                text_field: text_field,
                title: title,
			},
            success: function(data) {
                var href = 'http://localhost/CRUD_php/index';
				parent.window.location.href = href;
			},
		    error: function() {
			    alert('Произошла ошибка, обновите страницу!');
			}
		});
	},
    delete: function(id) {
		$.ajax({
			url: '/CRUD_PHP/index',
			method: 'POST',
			data: {
				operation: 'delete',
				id: id
			},
            success: function(data) {
                $("body").empty();
                $("body").append(data);
			},
			error: function() {
					alert('Произошла ошибка, обновите страницу!');
			}
		});
	},
	events: function() {
		$(document).one('click', 'button[data-action="create"]', function() {
            var title = $('input[name="title"]').val();
            var url = $('input[name="url"]').val();
            var text_field = $('input[name="text_field"]').val();
            if (title == '' || url == '' || text_field == '') {
                alert ("Заполните все поля!");
                return
            }
            report.create(title, url, text_field);
        });
        $(document).one('click', 'button[data-action="read"]', function() {
            var url = $(this).attr('url');
            var id = $(this).attr('id');
            report.read(id, url);
        })
        $(document).one('click', 'button[data-action="delete"]', function() {
            var id = $(this).attr('id');
            report.delete(id);
        });
        $(document).one('click', 'button[data-action="update"]', function() {
            var text_field = $('div#template').html();
            var title = $('h1#template').html();
            var id = $(this).attr('id');
            report.update(text_field, title, id);
        });
        $(document).one('click', 'button[data-action="return"]', function() {
            var href = 'http://localhost/CRUD_php/index';
			parent.window.location.href = href;
        });
	},
};