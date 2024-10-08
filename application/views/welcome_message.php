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
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger" role="alert">
								<?= validation_errors() ?>
							</div>
						<?php endif ?>
						<?php if (set_value('nama')) : ?>
							<?php foreach (set_value('nama') as $key => $value) : ?>
								<tr>
									<td>
										<div class="form-group">
											<input type="text" name="nama[]" class="form-control" value="<?= set_value('nama[' . $key . ']') ?>">
										</div>
									</td>
									<td><button class="btn btn-danger remove-form-input">-</button></td>
								</tr>
							<?php endforeach ?>
						<?php else : ?>
							<tr>
								<td>
									<div class="form-group">
										<input type="text" name="nama[]" class="form-control">
									</div>
								</td>
							</tr>
						<?php endif ?>

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
</body>

</html>