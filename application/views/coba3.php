<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card w-50 mx-auto">
            <div class="card-header d-flex justify-content-between align-items-center">
                Form
                <button type="button" class="btn btn-primary add-form-input">tambah</button>
            </div>
            <div class="card-body">
                <?= form_open('welcome/insert') ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">nama</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="table-form-input">
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="nama[]" id="tags" class="form-control">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Submit</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // add form input button
            $(".add-form-input").click(function(e) {
                e.preventDefault();
                // add element input
                $(".table-form-input").append(`
				<tr>
					<td>
						<div class="form-group">
							<input type="text" name="nama[]" class="form-control">
						</div>
					</td>
					<td><button class="btn btn-danger remove-form-input">-</button></td>
				</tr>
											
				`)
            });
            // remove form input button
            $(document).on('click', '.remove-form-input', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
            });
        })
    </script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <script>
        $(function() {
            var availableTags = [
                "ActionScript",
                "AppleScript",
                "Asp",
                "BASIC",
                "C",
                "C++",
                "Clojure",
                "COBOL",
                "ColdFusion",
                "Erlang",
                "Fortran",
                "Groovy",
                "Haskell",
                "Java",
                "JavaScript",
                "Lisp",
                "Perl",
                "PHP",
                "Python",
                "Ruby",
                "Scala",
                "Scheme"
            ];
            $("#tags").autocomplete({
                source: availableTags
            });
        });
    </script>
</body>

</html>