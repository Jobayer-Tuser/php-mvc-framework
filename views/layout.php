<!DOCTYPE html>
<html>
<head>
    <title>{% yield title %}</title>
    <meta charset="utf-8">
</head>
<body>
{% yield content %}
</body>
</html>

{% extends layout.html %}

{% block title %}{{ $title }}{% endblock %}

{% block content %}
<h1>Home</h1>
<p>Welcome to the home page, list of colors:</p>
<ul>
    {% foreach($colors as $color): %}
    <li>{{ $color }}</li>
    {% endforeach; %}
</ul>
{% endblock %}

{% extends layout.html %}

{% block title %}{{ $title }}{% endblock %}

{% block content %}
<h1>Home</h1>
<p>Welcome to the home page, list of colors:</p>
<ul>
    {% foreach($colors as $color): %}
    <li>{{ $color }}</li>
    {% endforeach; %}
</ul>
{% endblock %}