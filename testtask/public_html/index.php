<?
	session_start();
	require __DIR__ .'/env.php';
	require __DIR__ .'/check_auth.php';
?>
<!DOCTYPE html>

<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>TestTask</title>
		<!-- font Rubik -->
	  <link rel="preconnect" href="https://fonts.googleapis.com">
	  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	  <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
		<!-- font Roboto -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link  href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik+Mono+One&display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="/assets/css/main.css">
	</head>
	<body>
	  <div class="wraper" >
	    <header>
	      <div class="header_container">
	        <div class="logo">
				<a href="/">
	          		TestTask
			  	</a>
	        </div>
			<script
			  class="amocrm_oauth"
			  charset="utf-8"
			  data-client-id="c3eccd0a-e675-42bc-a696-6bfdff5f73a1"
			  data-redirect_uri="https://cm46383.tw1.ru/"
			  data-title="Авторизация"
			  data-compact="false"
			  data-class-name="auth_btn"
			  data-color="default"
			  data-state="auth_ok"
			  data-error-callback="functionName"
			  data-mode="popup"
			  src="https://www.amocrm.ru/auth/button.min.js"
			></script>
	      </div>
	    </header>
	    <main>
	      <div class="form_container">
			<div class="notice_block_container" id="notice_block">
			  <h1>ОТПРАВКА ЗАЯВКИ</h1>
			  <div class="notice_block">
			  	<p>Для оформления заявки, пройдите авторизацию в amoCRM.</p><br>
			  	<p>Пройти авторизацию можно по нажатию кнопки "Авторизация" в верхнем правом углу.</p>
			  </div>
			</div>
			<div class="form_input" id="form_block">
	        	<form class="form" action="/leads_make.php" method="POST">
	        	  <h1>ОТПРАВКА ЗАЯВКИ</h1>
	        	  <label for="name">Имя</label><br>
	        	  <input type="text" id="name" name="name" required><br>
	        	  <label for="email">Email</label><br>
	        	  <input type="email" id="email" name="email" required><br>
	        	  <label for="phone">Телефон</label><br>
	        	  <input type="tel" id="phone" name="phone" required><br>
	        	  <label for="number">Цена</label><br>
	        	  <input type="text" id="price" name="price" required><br>
				  <input type="checkbox" id="time_check" name="time_check" class="invisible" />
				  <input type="text" id="token" name="token" class="invisible"  value="">
							<button class="from_btn" type="submit">Отправить</button>
	        	</form> 
			</div>
			<div class="form_description" id="description_block">
				<p>Создать страницу и добавить на неё форму из 4-х полей: имя, email, телефон, цена.<br>
					Заявку из формы сайта создавать в AmoCRM, как сделку с прикрепленным к ней контактом. В контакт передавать имя, email и телефон. В сделку передавать цену.<br>
					Если пользователь провел на сайте больше 30 секунд - при создании сделки нужно передать эту информацию в AmoCRM в дополнительное поле в виде boolean значения (1 и 0 тоже подойдет), предварительно доп поле нужно создать в AmoCRM, название поля можно выбрать любое.<br>
					Пользователю который заполняет форму, не нужно проходить регистрацию ни в AmoCRM, ни где-либо еще.
				</p>
			</div>
	      </div>
	    </main>
	  </div>
	</body>
	<script src="https://unpkg.com/imask"></script>
	<script src="/assets/js/main.js"></script>
</html>
