<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>{{ $title }}</title>
<link rel="shortcut icon" type="image/x-icon" href="/assets/admin/images/logo.png">
<!-- Favicon -->
<link rel="shortcut icon" href="/assets/admin/images/favicon.ico" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="/assets/admin/css/bootstrap.min.css">
<!-- Typography CSS -->
<link rel="stylesheet" href="/assets/admin/css/typography.css">
<!-- Style CSS -->
<link rel="stylesheet" href="/assets/admin/css/style.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="/assets/admin/css/responsive.css">
<!-- Vote CSS -->
<link rel="stylesheet" href="/assets/admin/css/vote.css">

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="bookshop"
  agent-id="1ec19a8a-19b1-4090-8e21-84c6ed3fe67e"
  language-code="en"
></df-messenger>