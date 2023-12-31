<!DOCTYPE html>
<html dir="ltr">

<head>
	<meta charset="utf-8">
	<meta name="description" content="<?= $desc ?>">

	<meta name="keywords" content="Jelang Stuff">

	<meta name="author" content="Dion Rizqi, Horizon Walker">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title ?></title>

</head>
<!-- Bootstrap -->
<link rel="stylesheet" href="<?= base_url(''); ?>plugins/bootstrap/bootstrap.min.css">
<!-- FontAwesome -->
<script src="https://use.fontawesome.com/d8ca357c8e.js"></script>
<link rel="stylesheet" href="<?= base_url(''); ?>plugins/fontawesome/css/all.min.css">
<!-- Animation -->
<link rel="stylesheet" href="<?= base_url(''); ?>plugins/animate-css/animate.css">
<!-- slick Carousel -->
<link rel="stylesheet" href="<?= base_url(''); ?>plugins/slick/slick.css">
<link rel="stylesheet" href="<?= base_url(''); ?>plugins/slick/slick-theme.css">
<!-- Colorbox -->
<link rel="stylesheet" href="<?= base_url(''); ?>plugins/colorbox/colorbox.css">
<!-- Template styles-->
<link rel="stylesheet" href="<?= base_url(''); ?>plugins/css/style.css">
<link rel="stylesheet" href="<?= base_url(''); ?>plugins/css/flaticon.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet" />

<style type="text/css">
	body {
		font-family: "Noto Sans", sans-serif !important;
		font-family: "Open Sans", sans-serif !important;
		font-size: 15px !important;
		line-height: 25px !important;
		font-weight: 400 !important;
		/* padding-top: 7.2%; */
	}

	#owl-demo .item img {
		display: block;
		width: 100%;
		min-height: 294px;
		max-height: 294px;
		position: relative;
		height: auto;
	}

	.wow:first-child {
		visibility: hidden;
	}

	th {
		text-align: center;
		width: 5%;
	}

	input[type="number"] {
  -webkit-appearance: textfield;
  -moz-appearance: textfield;
  appearance: textfield;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
}

.number-input {
  border: 2px solid #ddd;
  display: inline-flex;
}

.number-input,
.number-input * {
  box-sizing: border-box;
}

.number-input button {
  outline:none;
  -webkit-appearance: none;
  background-color: transparent;
  border: none;
  align-items: center;
  justify-content: center;
  width: 3rem;
  height: 3rem;
  cursor: pointer;
  margin: 0;
  position: relative;
}

.number-input button:before,
.number-input button:after {
  display: inline-block;
  position: absolute;
  content: '';
  width: 1rem;
  height: 2px;
  background-color: #212121;
  transform: translate(-50%, -50%);
}
.number-input button.plus:after {
  transform: translate(-50%, -50%) rotate(90deg);
}

.number-input input[type=number] {
  font-family: sans-serif;
  max-width: 5rem;
  padding: .5rem;
  border: solid #ddd;
  border-width: 0 2px;
  font-size: 2rem;
  height: 3rem;
  font-weight: bold;
  text-align: center;
}
</style>

<body class="loaded mainnya">
	<div class="body-inner">